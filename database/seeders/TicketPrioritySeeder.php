<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketPrioritySeeder extends Seeder
{
    public function run(): void
    {
        $priorities = [
            [
                'name' => 'Low',
                'description' => 'Non-urgent issues that can be addressed in normal workflow',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Medium',
                'description' => 'Standard priority for most tickets',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'High',
                'description' => 'Important issues that need prompt attention',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Urgent',
                'description' => 'Critical issues requiring immediate attention',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('ticket_priorities')->insert($priorities);
    }
}