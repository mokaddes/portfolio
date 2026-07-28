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
            [
                'name' => 'n8n',
                'icon' => 'assets/icons/n8n.svg',
                'description' => 'Workflow automation tool for scheduling, webhooks, and AI-driven integrations',
                'order' => 9,
            ],
            [
                'name' => 'Postman',
                'icon' => 'assets/icons/postman.svg',
                'description' => 'API client for testing and documenting REST endpoints',
                'order' => 10,
            ],
            [
                'name' => 'WordPress',
                'icon' => 'assets/icons/wordpress.svg',
                'description' => 'CMS platform used for custom plugin and theme development',
                'order' => 11,
            ],
            [
                'name' => 'Elementor',
                'icon' => 'assets/icons/elementor.svg',
                'description' => 'Page builder used to integrate custom shortcodes into WordPress sites',
                'order' => 12,
            ],
            [
                'name' => 'Ollama',
                'icon' => 'assets/icons/ollama.svg',
                'description' => 'Self-hosted local LLM runtime for cost-free AI agent automation',
                'order' => 13,
            ],
        ]);
    }
}
