<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            [
                'field_name' => 'program_name',
                'custom_name' => 'Major',
                'status' => true,
            ],
            [
                'field_name' => 'program_type',
                'custom_name' => 'Award',
                'status' => false,
            ],
            [
                'field_name' => 'program',
                'custom_name' => 'Program',
                'status' => false,
            ],
            [
                'field_name' => 'student_id',
                'custom_name' => 'Student ID',
                'status' => false,
            ],
            [
                'field_name' => 'enrolment_id',
                'custom_name' => 'Enrolment ID',
                'status' => false,
            ],
            [
                'field_name' => 'completion_date',
                'custom_name' => 'Completion Date',
                'status' => false,
            ],
            [
                'field_name' => 'effective_date',
                'custom_name' => 'Effective Date',
                'status' => false,
            ],
            [
                'field_name' => 'issue_date',
                'custom_name' => 'Issue Date',
                'status' => false,
            ],
            [
                'field_name' => 'search_term',
                'custom_name' => 'Student ID / Enrolment ID',
                'status' => false,
            ],

        ];

        // Insert data into the 'values' table
        foreach ($values as $value) {
            DB::table('values')->insert($value);
        }
    }
}
