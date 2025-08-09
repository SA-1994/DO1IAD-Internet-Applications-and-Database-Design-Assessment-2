<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        //Running user and project seeders
        $this->call([
            UsersTableSeeder::class,
            ProjectsTableSeeder::class,
        ]);
    }
}