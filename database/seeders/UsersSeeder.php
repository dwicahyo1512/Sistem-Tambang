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

        // Seed pool
        $pool = User::create([
            'name' => 'pool',
            'username' => 'pool_user',
            'gender' => 'male',
            'email' => 'pool@pool.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password')
        ]);
        $pool->syncRoles('pool');
    }
}
