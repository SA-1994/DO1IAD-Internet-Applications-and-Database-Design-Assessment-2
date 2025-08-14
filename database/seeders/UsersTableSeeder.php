<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        //Adding 3 project managers + 1 test user
        DB::table('users')->insert([
            [
                'uid' => 1,
                'username' => 'PM1',
                'password' => Hash::make('pm1pass'), //Hashed password
                'email' => 'pm1@aston.com',
            ],
            [
                'uid' => 2,
                'username' => 'PM2',
                'password' => Hash::make('pm2pass'),
                'email' => 'pm2@aston.com',
            ],
            [
                'uid' => 3,
                'username' => 'PM3',
                'password' => Hash::make('pm3pass'),
                'email' => 'pm3@aston.com',
            ],
            [
                'uid' => 4,
                'username' => 'testuser',
                'password' => Hash::make('testpass'), //User for demo login
                'email' => 'testuser@aston.com',
            ],
        ]);
    }
}