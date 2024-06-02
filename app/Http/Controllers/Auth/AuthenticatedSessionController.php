<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Kendaraan;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {

            $request->authenticate();
            if (auth()->user()->hasRole('client-users')) {
                $kendaraanuser = Kendaraan::where('kendaraan_user_id', auth()->id())->with('user', 'pool')->first();
                // dd($kendaraanuser);
                if ($kendaraanuser == null) {
                    Auth::logout();
                    Toastr::error('Tolong Tunggu Konfirmasi Akun Anda Dari Admin', 'Error');
                    return redirect()->back()->withInput();
                }
            }
            $request->session()->regenerate();
            Toastr::success('Login successful', 'Success'); // Menampilkan pesan success menggunakan Toastr
            return redirect()->intended(route('dashboard', absolute: false));
        } catch (\Exception $e) {
            Toastr::error('Login failed: ' . $e->getMessage(), 'Error'); // Menampilkan pesan error menggunakan Toastr

            return redirect()->back()->withInput();
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
