<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UsersExport implements FromCollection, WithTitle, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function title(): string
    {
        return 'Users'; // Judul sheet Excel
    }

    public function headings(): array
    {
        return [
            'Name', // Label untuk kolom pertama
            'Email', // Label untuk kolom kedua
            'UserID',
            'Username',
            'Gender',
            'PhoneNumber',
        ];
    }

    public function collection()
    {
        $users = User::all(); // Ambil data pengguna dari model atau sumber data apa pun

        $data = []; // Inisialisasi array kosong
        foreach ($users as $user) {
            $data[] = [
                'Name' => $user->name,
                'Email' => $user->email,
                'UserID' => $user->user_id,
                'Username' => $user->username,
                'Gender' => $user->gender,
                'PhoneNumber' => $user->phone_number,
            ];
        }

        return collect($data);
    }
}
