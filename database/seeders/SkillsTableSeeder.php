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
            [
                'name' => 'PHP',
                'icon' => 'assets/icons/php.svg',
                'description' => 'I use PHP 7 language to develop web applications',
            ],
            [
                'name' => 'Laravel',
                'icon' => 'assets/icons/laravel.svg',
                'description' => 'I use Laravel framework to develop robust web applications',
            ],
            [
                'name' => 'HTML5',
                'icon' => 'assets/icons/html.svg',
                'description' => 'I have expertise in creating semantic and accessible HTML5 markup',
            ],
            [
                'name' => 'CSS3',
                'icon' => 'assets/icons/css.svg',
                'description' => 'I apply modern CSS3 techniques for styling and layout design',
            ],
            [
                'name' => 'JavaScript',
                'icon' => 'assets/icons/javascript.svg',
                'description' => 'I leverage JavaScript to create interactive and dynamic web experiences',
            ],
            [
                'name' => 'Bootstrap',
                'icon' => 'assets/icons/bootstrap.svg',
                'description' => 'I utilize Bootstrap framework for responsive and mobile-first web development',
            ],
            [
                'name' => 'jQuery',
                'icon' => 'assets/icons/jquery.svg',
                'description' => 'I use jQuery library for simplifying DOM manipulation and AJAX interactions',
            ],
            [
                'name' => 'REST API',
                'icon' => 'assets/icons/rest.svg',
                'description' => 'I design and develop RESTful APIs for seamless integration of web services',
            ],
            [
                'name' => 'Swagger/OpenAPI',
                'icon' => 'assets/icons/swagger.svg',
                'description' => 'I use Swagger/OpenAPI to streamline RESTful API design for seamless web services integration',
            ],
            [
                'name' => 'Database',
                'icon' => 'assets/icons/database.svg',
                'description' => 'I use relational databases MySQL and MariaDB to store data',
            ],
            [
                'name' => 'Apache Server',
                'icon' => 'assets/icons/apache.svg',
                'description' => 'I use Apache server to serve sites',
            ],
            [
                'name' => 'Vue.js',
                'icon' => 'assets/icons/vuejs.svg',
                'description' => 'I use Vue.js to create interactive user interfaces',
            ],
            [
                'name' => 'SonarQube',
                'icon' => 'assets/icons/sonarqube-1.svg',
                'description' => 'I use SonarQube to analyze the quality of code',
            ],
            [
                'name' => 'OpenAI API',
                'icon' => 'assets/icons/chatgpt.svg',
                'description' => 'I integrate OpenAI-powered features for assistants, content generation, and automation',
            ],
            [
                'name' => 'Prompt Engineering',
                'icon' => 'assets/icons/terminal.svg',
                'description' => 'I design prompts and workflows that produce reliable AI-assisted outputs',
            ],
            [
                'name' => 'AI Automation',
                'icon' => 'assets/icons/crud.svg',
                'description' => 'I build AI-supported workflows that reduce manual work and accelerate delivery',
            ],
            [
                'name' => 'n8n Automation',
                'icon' => 'assets/icons/n8n.svg',
                'description' => 'I build n8n workflows to automate post scheduling, comment replies, and cross-platform integrations',
            ],
            [
                'name' => 'Webhook Integration',
                'icon' => 'assets/icons/webhook.svg',
                'description' => 'I design and secure webhook handlers for real-time event-driven automation',
            ],
            [
                'name' => 'Multi-Provider LLM Integration',
                'icon' => 'assets/icons/chatgpt.svg',
                'description' => 'I build unified AI client abstractions across OpenAI, Anthropic, Gemini, Groq, DeepSeek, and Ollama',
            ],
            [
                'name' => 'Meta Graph API',
                'icon' => 'assets/icons/facebook.svg',
                'description' => 'I integrate Facebook Page automation, Messenger bots, and WhatsApp Business messaging via the Meta Graph API',
            ],
            [
                'name' => 'WordPress Plugin Development',
                'icon' => 'assets/icons/wordpress.svg',
                'description' => 'I build custom WordPress plugins with admin dashboards, shortcodes, and voting/nomination systems',
            ],
            [
                'name' => 'Local LLM Deployment (Ollama)',
                'icon' => 'assets/icons/ollama.svg',
                'description' => 'I run self-hosted open-source LLMs for cost-free, private AI agent automation',
            ],
            [
                'name' => 'Google Workspace API Integration',
                'icon' => 'assets/icons/google.svg',
                'description' => 'I integrate Google Sheets and Google Docs via OAuth2 for automated data and document workflows',
            ],
        ]);
    }
}
