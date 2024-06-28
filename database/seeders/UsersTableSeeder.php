<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            // bunları kendimiz ekledik.
            // Admin Demo Account
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'admin',
                'status' => 'active',
            ],
            // Agent Demo Account
            [
                'name' => 'Agent',
                'username' => 'agent',
                'email' => 'agent@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'agent',
                'status' => 'active',
            ],
            // User Demo Account
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'user',
                'status' => 'active',
            ],

        ]);
    }
}
