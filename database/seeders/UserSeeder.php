<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Dummy User',
            'email' => 'dummy@example.com',
            'password' => Hash::make('password123'),
            'phone_number' => '082233445566',
            'status' => 'unverified',
        ]);
    }
}
