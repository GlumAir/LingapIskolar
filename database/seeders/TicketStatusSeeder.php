<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['name' => 'Open'],
            ['name' => 'Assigned'],
            ['name' => 'In Progress'],
            ['name' => 'Pending User Response'],
            ['name' => 'Escalated'],
            ['name' => 'Resolved'],
            ['name' => 'Closed'],
        ];

        DB::table('ticket_statuses')->insert($statuses);
    }
}