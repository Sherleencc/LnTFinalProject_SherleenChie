<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     User::create([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'phone' => '081234567890',
        'role' => 'admin',
        'password' => Hash::make('admin123'),
    ]);
    }
}
