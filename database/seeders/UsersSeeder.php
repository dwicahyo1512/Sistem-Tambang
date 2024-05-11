<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed admin
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin_user',
            'gender' => 'male',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password')
        ]);
        $admin->syncRoles('super-admin');

        // Seed pool1
        $pool1 = User::create([
            'name' => 'pool1',
            'username' => 'pool1_user',
            'gender' => 'male',
            'email' => 'pool1@pool1.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password')
        ]);
        
        $pool1->syncRoles('pool');

        $pool2 = User::create([
            'name' => 'pool2',
            'username' => 'pool2_user',
            'gender' => 'male',
            'email' => 'pool2@pool2.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password')
        ]);
        $pool2->syncRoles('pool');

        $pool3 = User::create([
            'name' => 'pool3',
            'username' => 'pool3_user',
            'gender' => 'male',
            'email' => 'pool3@pool3.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password')
        ]);
        $pool3->syncRoles('pool');
    }
}
