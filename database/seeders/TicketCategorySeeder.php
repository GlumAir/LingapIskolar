<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Scholarship Inquiry',
                'description' => 'Questions about scholarship opportunities, eligibility, and application process'
            ],
            [
                'name' => 'Financial Assistance',
                'description' => 'Requests for financial aid, payment plans, and tuition concerns'
            ],
            [
                'name' => 'Document Submission',
                'description' => 'Issues related to uploading or submitting required documents'
            ],
            [
                'name' => 'Application Status',
                'description' => 'Inquiries about the status of scholarship or financial aid applications'
            ],
            [
                'name' => 'Technical Support',
                'description' => 'Technical issues with the system, login problems, or system errors'
            ],
            [
                'name' => 'General Inquiry',
                'description' => 'General questions that don\'t fit other categories'
            ],
        ];

        DB::table('ticket_categories')->insert($categories);
    }
}