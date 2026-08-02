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
            ['name' => 'PhpStorm', 'icon' => 'assets/icons/phpstorm.svg', 'description' => 'Professional IDE for PHP and Laravel.', 'order' => 1],

            ['name' => 'Git', 'icon' => 'assets/icons/git.svg', 'description' => 'Distributed version control.', 'order' => 2],

            ['name' => 'GitHub', 'icon' => 'assets/icons/github.svg', 'description' => 'Code hosting and collaboration.', 'order' => 3],

            ['name' => 'Composer', 'icon' => 'assets/icons/composer.svg', 'description' => 'PHP dependency management.', 'order' => 4],

            ['name' => 'Postman', 'icon' => 'assets/icons/postman.svg', 'description' => 'API testing and documentation.', 'order' => 5],

            ['name' => 'n8n', 'icon' => 'assets/icons/n8n.svg', 'description' => 'Workflow automation, AI agents, and integrations.', 'order' => 6],

            ['name' => 'Linux', 'icon' => 'assets/icons/linux.svg', 'description' => 'Development and production server environment.', 'order' => 7],

            ['name' => 'Ollama', 'icon' => 'assets/icons/ollama.svg', 'description' => 'Local LLM runtime for AI development.', 'order' => 8],

            ['name' => 'GitLab', 'icon' => 'assets/icons/gitlab.svg', 'description' => 'CI/CD pipelines and DevOps.', 'order' => 9],

            ['name' => 'Firebase', 'icon' => 'assets/icons/firebase.svg', 'description' => 'Authentication, notifications, and cloud services.', 'order' => 10],

            ['name' => 'WordPress', 'icon' => 'assets/icons/wordpress.svg', 'description' => 'Custom plugin and theme development.', 'order' => 11],

            ['name' => 'Elementor', 'icon' => 'assets/icons/elementor.svg', 'description' => 'WordPress page builder.', 'order' => 12],

            ['name' => 'Apache', 'icon' => 'assets/icons/apache.svg', 'description' => 'Web server deployment.', 'order' => 13],
        ]);
    }
}
