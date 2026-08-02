<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skills')->insert([
            ['name' => 'Laravel', 'icon' => 'assets/icons/laravel.svg', 'description' => 'I build scalable SaaS platforms, REST APIs, and enterprise web applications using Laravel.'],

            ['name' => 'PHP', 'icon' => 'assets/icons/php.svg', 'description' => 'Experienced in modern PHP development following clean architecture and best practices.'],

            ['name' => 'AI Automation', 'icon' => 'assets/icons/crud.svg', 'description' => 'I build AI-powered workflows that automate business processes and improve productivity.'],

            ['name' => 'OpenAI API', 'icon' => 'assets/icons/chatgpt.svg', 'description' => 'I integrate OpenAI for chatbots, assistants, content generation, and AI automation.'],

            ['name' => 'n8n Automation', 'icon' => 'assets/icons/n8n.svg', 'description' => 'I develop workflow automations using n8n, AI agents, APIs, and webhooks.'],

            ['name' => 'REST API', 'icon' => 'assets/icons/rest.svg', 'description' => 'I design secure RESTful APIs for SaaS platforms and third-party integrations.'],

            ['name' => 'Webhook Integration', 'icon' => 'assets/icons/webhook.svg', 'description' => 'I build secure webhook systems for real-time integrations and automation.'],

            ['name' => 'Vue.js', 'icon' => 'assets/icons/vuejs.svg', 'description' => 'I create modern interactive interfaces using Vue.js.'],

            ['name' => 'Database', 'icon' => 'assets/icons/database.svg', 'description' => 'Experienced with MySQL and MariaDB database design and optimization.'],

            ['name' => 'Multi-Provider LLM Integration', 'icon' => 'assets/icons/chatgpt.svg', 'description' => 'Unified AI integration across OpenAI, Gemini, Claude, Groq, DeepSeek, and Ollama.'],

            ['name' => 'Google Workspace API Integration', 'icon' => 'assets/icons/google.svg', 'description' => 'Automation using Google Sheets, Docs, Drive, and OAuth2 APIs.'],

            ['name' => 'Meta Graph API', 'icon' => 'assets/icons/facebook.svg', 'description' => 'Facebook, Messenger, Instagram, and WhatsApp Business API integrations.'],

            ['name' => 'WordPress Plugin Development', 'icon' => 'assets/icons/wordpress.svg', 'description' => 'Custom WordPress plugins, admin panels, and business solutions.'],

            ['name' => 'Local LLM Deployment (Ollama)', 'icon' => 'assets/icons/ollama.svg', 'description' => 'Deploy self-hosted AI models for private and cost-efficient automation.'],

            ['name' => 'Swagger/OpenAPI', 'icon' => 'assets/icons/swagger.svg', 'description' => 'API documentation and contract-first development.'],

            ['name' => 'Prompt Engineering', 'icon' => 'assets/icons/terminal.svg', 'description' => 'Design reliable prompts for AI applications and business workflows.'],

            ['name' => 'JavaScript', 'icon' => 'assets/icons/javascript.svg', 'description' => 'Interactive frontend development using modern JavaScript.'],

            ['name' => 'HTML5', 'icon' => 'assets/icons/html.svg', 'description' => 'Semantic and accessible web markup.'],

            ['name' => 'CSS3', 'icon' => 'assets/icons/css.svg', 'description' => 'Responsive layouts with modern CSS.'],

            ['name' => 'Bootstrap', 'icon' => 'assets/icons/bootstrap.svg', 'description' => 'Responsive UI development with Bootstrap.'],

            ['name' => 'Apache Server', 'icon' => 'assets/icons/apache.svg', 'description' => 'Apache web server configuration and deployment.'],

            ['name' => 'SonarQube', 'icon' => 'assets/icons/sonarqube-1.svg', 'description' => 'Static code analysis and code quality improvement.'],

            ['name' => 'jQuery', 'icon' => 'assets/icons/jquery.svg', 'description' => 'Legacy project maintenance and AJAX interactions.'],
        ]);
    }
}
