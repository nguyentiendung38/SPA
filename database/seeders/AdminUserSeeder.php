<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'), // Using bcrypt for proper password hashing
            'phone' => '0123456789',
            'role' => 1, // 1 is admin role
            'image' => 'default.jpg'
        ]);
    }
}