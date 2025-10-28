<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('educations')->insert([
            [
                'degree' => 'M. Engineering in EEE',
                'institution' => 'University of Rajshahi',
                'year' => '2018',
                'cgpa' => 3.25,
                'out_of_cgpa' => 4.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'degree' => 'B.Sc. Engg in Applied Physics',
                'institution' => 'University of Rajshahi',
                'year' => '2017',
                'cgpa' => 3.06,
                'out_of_cgpa' => 4.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
