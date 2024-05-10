<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create admin', ['only' => ['create', 'store']]);
        $this->middleware('can:read admin', ['only' => ['show', 'index']]);
        $this->middleware('can:update admin', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete admin', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }
    public function getUsersData(Request $request)
    {
        //
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowPerPage = $request->get("length"); // total number of rows per page
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        $users = DB::table('users');
        // $users =  User::all();
        $totalRecords = $users->count();

        $user_name = $request->user_name;
        $type_role = $request->type_role;
        $type_status = $request->type_status;

        /** search for name */
        if (!empty($user_name)) {
            $users->when($user_name, function ($query) use ($user_name) {
                $query->where('name', 'LIKE', '%' . $user_name . '%');
            });
        }


        $totalRecordsWithFilter = $users->where(function ($query) use ($searchValue) {
            $query->where('name', 'like', '%' . $searchValue . '%');
            $query->orWhere('user_id', 'like', '%' . $searchValue . '%');
            $query->orWhere('email', 'like', '%' . $searchValue . '%');
            $query->orWhere('phone_number', 'like', '%' . $searchValue . '%');
        })->count();

        if ($columnName == 'user_id') {
            $columnName = 'user_id';
        }
        $records = $users->orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%');
                $query->orWhere('user_id', 'like', '%' . $searchValue . '%');
                $query->orWhere('email', 'like', '%' . $searchValue . '%');
                $query->orWhere('phone_number', 'like', '%' . $searchValue . '%');
            })
            ->skip($start)
            ->take($rowPerPage)
            ->get();
        $data_arr = [];
        foreach ($records as $key => $record) {
            $record->name = '<h2 class="table-avatar"><a href="' . url('employee/profile/' . $record->user_id) . '" class="name">' . '<img class="avatar" data-avatar=' . $record->avatar . ' src="' . url('storage/' . $record->avatar) . '">' . $record->name . '</a></h2>';
            /** status */
            $full_status = '
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item"><i class="fa fa-dot-circle-o text-success"></i> Active </a>
                    <a class="dropdown-item"><i class="fa fa-dot-circle-o text-warning"></i> Inactive </a>
                    <a class="dropdown-item"><i class="fa fa-dot-circle-o text-danger"></i> Disable </a>
                </div>
            ';

            if ($record->status == 'Active') {
                $status = '
                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-dot-circle-o text-success"></i>
                        <span class="status_s">' . $record->status . '</span>
                    </a>
                    ' . $full_status . '
                ';
            } elseif ($record->status == 'Inactive') {
                $status = '
                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-dot-circle-o text-info"></i>
                        <span class="status_s">' . $record->status . '</span>
                    </a>
                    ' . $full_status . '
                ';
            } elseif ($record->status == 'Disable') {
                $status = '
                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-dot-circle-o text-danger"></i>
                        <span class="status_s">' . $record->status . '</span>
                    </a>
                    ' . $full_status . '
                ';
            } else {
                $status = '
                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-dot-circle-o text-dark"></i>
                        <span class="statuss">' . $record->status . '</span>
                    </a>
                    ' . $full_status . '
                ';
            }

            $last_login = Carbon::parse($record->last_login)->diffForHumans();

            $data_arr[] = [
                "no" => '<span class="id" data-id = ' . $record->id . '>' . $start + ($key + 1) . '</span>',
                "name" => $record->name,
                "user_id" => '<span class="user_id">' . $record->user_id . '</span>',
                "email" => '<span class="email">' . $record->email . '</span>',
                "phone_number" => '<span class="phone_number">' . $record->phone_number . '</span>',
                "join_date" => $record->join_date,
                "last_login" => $last_login,
                "status" => $status,
                "action" =>
                    '
                <td>
                    <div class="dropdown dropdown-action">
                        <a class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item userUpdate" data-toggle="modal" data-id="' . $record->id . '" data-target="#edit_user">
                                <i class="fa fa-pencil m-r-5"></i> Edit
                            </a>
                            <a class="dropdown-item userDelete" data-toggle="modal" data-id="' . $record->id . '" data-target="#delete_user">
                                <i class="fa fa-trash-o m-r-5"></i> Delete
                            </a>
                        </div>
                    </div>
                </td>
                ',
            ];
        }
        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordsWithFilter,
            "aaData" => $data_arr
        ];
        return response()->json($response);
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $user = User::where('name', 'like', "%$search%")->get();
        $user = User::paginate(10);
        return view('users.index', ['user' => $user]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //  dd($request->all());
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
                'gender' => ['required', 'string'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // max 2MB
            ], [
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

            return redirect()->back()->with('success', 'User successfully created');
        } catch (ValidationException $e) {
            // Mengambil pesan kesalahan dari validasi
            $errors = $e->validator->getMessageBag()->all();
            Toastr::error(implode('<br>', $errors), 'Error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        // dd($request->all());
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $user->id],
                'gender' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
                'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // max 2MB
            ], [
                'avatar.image' => 'The uploaded file must be an image.',
                'avatar.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
                'avatar.max' => 'The image may not be greater than :max kilobytes.',
            ]);

            // Update data pengguna
            $userData = [
                'name' => $request->name,
                'username' => $request->username,
                'gender' => $request->gender,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
            ];

            if ($request->has('password')) {
                $userData['password'] = Hash::make($request->password);
            }

            if ($request->hasFile('avatar')) {
                $imagePath = $request->file('avatar')->store('avatar', 'public');
                $imageUrl = Storage::url($imagePath);
                $userData['avatar'] = $imageUrl;
            }

            $user->update($userData);

            return redirect()->route('users.index')->with('success', 'User successfully updated.');
        } catch (ValidationException $e) {
            // Mengambil pesan kesalahan dari validasi
            $errors = $e->validator->getMessageBag()->all();
            Toastr::error(implode('<br>', $errors), 'Error');
            return redirect()->back()->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
    public function export()
    {
        return Excel::download(new UsersExport(), 'users.xlsx');
    }
}
