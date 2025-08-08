<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'uid' => 1,
                'username' => 'PM1',
                'password' => Hash::make('pm1pass'),
                'email' => 'PM1@aston.com',
            ],
            [
                'uid' => 2,
                'username' => 'PM2',
                'password' => Hash::make('pm2pass'),
                'email' => 'PM2@aston.com',
            ],
            [
                'uid' => 3,
                'username' => 'PM3',
                'password' => Hash::make('pm3pass'),
                'email' => 'PM3@aston.com',
            ],
        ]);
    }
}