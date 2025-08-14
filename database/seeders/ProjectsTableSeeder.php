<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    public function run(): void
    {
        //Adding 3 sample projects linked to PMs + 1 unassigned project
        DB::table('projects')->insert([
            [
                'title' => 'Aston Accommodation Planner',
                'start_date' => '2025-09-01',
                'end_date' => '2025-12-01',
                'short_description' => 'A tool to help students find and manage university accommodation.',
                'phase' => 'design',
                'uid' => 1, //Belongs to PM1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Aston Events Portal',
                'start_date' => '2025-10-01',
                'end_date' => '2026-01-15',
                'short_description' => 'Centralised platform for managing campus events and bookings.',
                'phase' => 'development',
                'uid' => 2, //Belongs to PM2
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Aston Study Group Matcher',
                'start_date' => '2025-11-01',
                'end_date' => null, //Still ongoing
                'short_description' => 'Matches students based on modules and availability.',
                'phase' => 'testing',
                'uid' => 3, //Belongs to PM3
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Innovation Hub',
                'start_date' => '2025-12-01',
                'end_date' => null, //Still ongoing
                'short_description' => 'A hub for all students to meet and collaborate on different projects.',
                'phase' => 'design',
                'uid' => null, //Unassigned project to test nullable foreign key
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}