<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalQualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('personal_qualities')->insert([
            [
                'title' => 'English',
                'icon' => 'assets/icons/globe-americas.svg',
                'description' => 'Fluent in reading and writing English for effective communication',
            ],
            [
                'title' => 'Team Player',
                'icon' => 'assets/icons/team.svg',
                'description' => 'Collaborative mindset with excellent communication skills',
            ],
            [
                'title' => 'Passionate',
                'icon' => 'assets/icons/heart.svg',
                'description' => 'Deep love for software development and problem-solving',
            ],
            [
                'title' => 'Fast Learner',
                'icon' => 'assets/icons/stopwatch.svg',
                'description' => 'Quick to adapt to new technologies and methodologies',
            ],
            [
                'title' => 'Dedicated',
                'icon' => 'assets/icons/tachometer.svg',
                'description' => 'Committed to delivering high-quality work on time',
            ],
            [
                'title' => 'Analytical',
                'icon' => 'assets/icons/analytical-skills.svg',
                'description' => 'Strong problem-solving and analytical thinking abilities',
            ],
        ]);
    }
}
