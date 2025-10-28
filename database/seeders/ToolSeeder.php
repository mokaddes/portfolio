<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tools')->insert([
            [
                'name' => 'PhpStorm',
                'icon' => 'assets/icons/phpstorm.svg',
                'description' => 'Primary IDE for PHP and Laravel development',
                'order' => 1,
            ],
            [
                'name' => 'Git',
                'icon' => 'assets/icons/git.svg',
                'description' => 'Version control system for tracking code changes',
                'order' => 2,
            ],
            [
                'name' => 'Composer',
                'icon' => 'assets/icons/composer.svg',
                'description' => 'Dependency manager for PHP projects',
                'order' => 3,
            ],
            [
                'name' => 'Apache',
                'icon' => 'assets/icons/apache.svg',
                'description' => 'Web server for hosting applications locally',
                'order' => 4,
            ],
            [
                'name' => 'GitHub',
                'icon' => 'assets/icons/github.svg',
                'description' => 'Code hosting and collaboration platform',
                'order' => 5,
            ],
            [
                'name' => 'GitLab',
                'icon' => 'assets/icons/gitlab.svg',
                'description' => 'DevOps and CI/CD pipeline automation platform',
                'order' => 6,
            ],
            [
                'name' => 'Linux',
                'icon' => 'assets/icons/linux.svg',
                'description' => 'Operating system used for local and server environments',
                'order' => 7,
            ],
            [
                'name' => 'Firebase',
                'icon' => 'assets/icons/firebase.svg',
                'description' => 'Google’s backend services for real-time apps',
                'order' => 8,
            ],
        ]);
    }
}
