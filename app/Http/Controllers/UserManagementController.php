<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    /** Users List */
    public function userList()
    {
        return view('user.userlist');
    }

    /** get list data and search */
    public function getUsersData(Request $request)
    {

        $draw            = $request->get('draw');
        $start           = $request->get("start");
        $rowPerPage      = $request->get("length"); // total number of rows per page
        $columnIndex_arr = $request->get('order');
        $columnName_arr  = $request->get('columns');
        $order_arr       = $request->get('order');
        $search_arr      = $request->get('search');

        $columnIndex     = $columnIndex_arr[0]['column']; // Column index
        $columnName      = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue     = $search_arr['value']; // Search value

        $users =  DB::table('users');
        // $users =  User::all();
        $totalRecords = $users->count();

        $user_name   = $request->user_name;
        $type_role   = $request->type_role;
        $type_status = $request->type_status;

        /** search for name */
        if(!empty($user_name)) {
            $users->when($user_name,function($query) use ($user_name){
                $query->where('name','LIKE','%'.$user_name.'%');
            });
        }

        /** search for type_role */
        if(!empty($type_role)) {
            $users->when($type_role,function($query) use ($type_role){
                $query->where('role_name',$type_role);
            });
        }

        /** search for status */
        if(!empty($type_status)) {
            $users->when($type_status,function($query) use ($type_status){
                $query->where('status',$type_status);
            });
        }


        $totalRecordsWithFilter = $users->where(function ($query) use ($searchValue) {
            $query->where('name', 'like', '%' . $searchValue . '%');
            $query->orWhere('user_id', 'like', '%' . $searchValue . '%');
            $query->orWhere('email', 'like', '%' . $searchValue . '%');
            $query->orWhere('position', 'like', '%' . $searchValue . '%');
            $query->orWhere('phone_number', 'like', '%' . $searchValue . '%');
            $query->orWhere('join_date', 'like', '%' . $searchValue . '%');
            $query->orWhere('role_name', 'like', '%' . $searchValue . '%');
            $query->orWhere('status', 'like', '%' . $searchValue . '%');
            $query->orWhere('department', 'like', '%' . $searchValue . '%');
        })->count();

        if ($columnName == 'user_id') {
            $columnName = 'user_id';
        }
        $records = $users->orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%');
                $query->orWhere('user_id', 'like', '%' . $searchValue . '%');
                $query->orWhere('email', 'like', '%' . $searchValue . '%');
                $query->orWhere('position', 'like', '%' . $searchValue . '%');
                $query->orWhere('phone_number', 'like', '%' . $searchValue . '%');
                $query->orWhere('join_date', 'like', '%' . $searchValue . '%');
                $query->orWhere('role_name', 'like', '%' . $searchValue . '%');
                $query->orWhere('status', 'like', '%' . $searchValue . '%');
                $query->orWhere('department', 'like', '%' . $searchValue . '%');
            })
            ->skip($start)
            ->take($rowPerPage)
            ->get();
        $data_arr = [];
        foreach ($records as $key => $record) {
            $record->name = '<h2 class="table-avatar"><a href="'.url('employee/profile/' . $record->user_id).'" class="name">'.'<img class="avatar" data-avatar='.$record->avatar.' src="'.url('/assets/images/'.$record->avatar).'">' .$record->name.'</a></h2>';
            if ($record->role_name == 'Admin') { /** color role name */
                $role_name = '<span class="badge bg-inverse-danger role_name">'.$record->role_name.'</span>';
            } elseif ($record->role_name == 'Super Admin') {
                $role_name = '<span class="badge bg-inverse-warning role_name">'.$record->role_name.'</span>';
            } elseif ($record->role_name == 'Normal User') {
                $role_name = '<span class="badge bg-inverse-info role_name">'.$record->role_name.'</span>';
            } elseif ($record->role_name == 'Client') {
                $role_name = '<span class="badge bg-inverse-success role_name">'.$record->role_name.'</span>'; 
            } elseif ($record->role_name == 'Employee') {
                $role_name = '<span class="badge bg-inverse-dark role_name">'.$record->role_name.'</span>'; 
            } else {
                $role_name = 'NULL'; /** null role name */
            }

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
                        <span class="status_s">'.$record->status.'</span>
                    </a>
                    '.$full_status.'
                ';
            } elseif ($record->status == 'Inactive') {
                $status = '
                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-dot-circle-o text-info"></i>
                        <span class="status_s">'.$record->status.'</span>
                    </a>
                    '.$full_status.'
                ';
            } elseif ($record->status == 'Disable') {
                $status = '
                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-dot-circle-o text-danger"></i>
                        <span class="status_s">'.$record->status.'</span>
                    </a>
                    '.$full_status.'
                ';
            } else {
                $status = '
                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-dot-circle-o text-dark"></i>
                        <span class="statuss">'.$record->status.'</span>
                    </a>
                    '.$full_status.'
                ';
            }

            $last_login = Carbon::parse($record->last_login)->diffForHumans();

            $data_arr [] = [
                "no"           => '<span class="id" data-id = '.$record->id.'>'.$start + ($key + 1).'</span>',
                "name"         => $record->name,
                "user_id"      => '<span class="user_id">'.$record->user_id.'</span>',
                "email"        => '<span class="email">'.$record->email.'</span>',
                "position"     => '<span class="position">'.$record->position.'</span>',
                "phone_number" => '<span class="phone_number">'.$record->phone_number.'</span>',
                "join_date"    => $record->join_date,
                "last_login"   => $last_login,
                "role_name"    => $role_name,
                "status"       => $status,
                "department"   => '<span class="department">'.$record->department.'</span>',
                "action"       => 
                '
                <td>
                    <div class="dropdown dropdown-action">
                        <a class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item userUpdate" data-toggle="modal" data-id="'.$record->id.'" data-target="#edit_user">
                                <i class="fa fa-pencil m-r-5"></i> Edit
                            </a>
                            <a class="dropdown-item userDelete" data-toggle="modal" data-id="'.$record->id.'" data-target="#delete_user">
                                <i class="fa fa-trash-o m-r-5"></i> Delete
                            </a>
                        </div>
                    </div>
                </td>
                ',
            ];
        }
        $response = [
            "draw"                 => intval($draw),
            "iTotalRecords"        => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordsWithFilter,
            "aaData"               => $data_arr
        ];
        return response()->json($response);
    }
}
