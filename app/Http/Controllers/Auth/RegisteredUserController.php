<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
                'gender' => ['required', 'string'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // max 2MB
            ],[
                'avatar.required' => 'Please upload your Profile image.',
                'avatar.image' => 'The uploaded file must be an image.',
                'avatar.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
                'avatar.max' => 'The image may not be greater than :max kilobytes.',
            ]);

            $defaultRole = getSetting('new_user_default_role');

            $dt = Carbon::now();
            $todayDate = $dt->toDayDateTimeString();
            $imagePath = $request->file('avatar')->store('avatar', 'public');

            $imageUrl = Storage::url($imagePath);
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'gender' => $request->gender,
                'email' => $request->email,
                'join_date' => $todayDate,
                'phone_number' => $request->phone_number,
                'avatar' => $imageUrl,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole($defaultRole);
            event(new Registered($user));

            Auth::login($user);

            return redirect(route('dashboard', absolute: false));
        } catch (ValidationException $e) {
            // Mengambil pesan kesalahan dari validasi
            $errors = $e->validator->getMessageBag()->all();
            Toastr::error(implode('<br>', $errors), 'Error');
            return redirect()->back()->withInput();
        }
    }
}
