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
            // Core Backend & Architecture
            [
                'name' => 'Laravel',
                'icon' => 'assets/icons/laravel.svg',
                'description' => 'Expert-level (⭐⭐⭐⭐⭐) development of scalable SaaS platforms, enterprise web apps, and custom solutions.'
            ],
            [
                'name' => 'PHP',
                'icon' => 'assets/icons/php.svg',
                'description' => 'Advanced modern PHP development following clean architecture, OOP principles, and best practices.'
            ],
            [
                'name' => 'MySQL & Database Design',
                'icon' => 'assets/icons/database.svg',
                'description' => 'Architecting optimized relational schemas, efficient data modeling, and complex query performance tuning.'
            ],

            // APIs & Integrations
            [
                'name' => 'RESTful API & Integration',
                'icon' => 'assets/icons/rest.svg',
                'description' => 'Designing secure, rate-limited APIs and seamlessly connecting third-party services and platforms.'
            ],
            [
                'name' => 'Swagger / OpenAPI',
                'icon' => 'assets/icons/swagger.svg',
                'description' => 'Contract-first API development, clear endpoint documentation, and interactive testing environments.'
            ],

            // Specialized Development
            [
                'name' => 'SaaS Development',
                'icon' => 'assets/icons/cloud.svg',
                'description' => 'Building multi-tenant Software-as-a-Service platforms with subscription billing and role management.'
            ],
            [
                'name' => 'CRM Development',
                'icon' => 'assets/icons/crm.svg',
                'description' => 'Creating custom Customer Relationship Management systems tailored to specific business workflows.'
            ],
            [
                'name' => 'Web Application',
                'icon' => 'assets/icons/web.svg',
                'description' => 'Developing comprehensive, full-stack web applications from initial concept to deployment.'
            ],
            [
                'name' => 'AI Chatbot & OpenAI API',
                'icon' => 'assets/icons/chatgpt.svg',
                'description' => 'Integrating OpenAI models to build intelligent chatbots, virtual assistants, and automated workflows.'
            ],
            [
                'name' => 'Multi-Provider LLM Integration',
                'icon' => 'assets/icons/chatgpt.svg',
                'description' => 'Unified AI integration supporting OpenAI, Gemini, Claude, Groq, DeepSeek, and custom LLM providers.'
            ],
            [
                'name' => 'Payment Gateway Integration',
                'icon' => 'assets/icons/payment.svg',
                'description' => 'Secure implementation of local and international payment systems, subscription billing, and checkout flows.'
            ],
            [
                'name' => 'n8n Workflow Automation',
                'icon' => 'assets/icons/n8n.svg',
                'description' => 'Designing custom workflow automations using n8n, AI agents, third-party APIs, and webhooks.'
            ],
            [
                'name' => 'Webhook Systems',
                'icon' => 'assets/icons/webhook.svg',
                'description' => 'Building robust, event-driven webhook architecture for real-time cross-platform synchronizations.'
            ],
            [
                'name' => 'Meta Graph & Social APIs',
                'icon' => 'assets/icons/facebook.svg',
                'description' => 'Integration with WhatsApp Business API, Facebook, Messenger, and Instagram Graph services.'
            ],
            [
                'name' => 'Local LLM Deployment (Ollama)',
                'icon' => 'assets/icons/ollama.svg',
                'description' => 'Self-hosting local AI models for private, privacy-focused, and cost-effective enterprise processing.'
            ],

            // Frontend & JavaScript Ecosystem
            [
                'name' => 'Vue.js',
                'icon' => 'assets/icons/vuejs.svg',
                'description' => 'Building reactive, component-based Single Page Applications (SPAs) and dynamic UI elements.'
            ],
            [
                'name' => 'JavaScript',
                'icon' => 'assets/icons/javascript.svg',
                'description' => 'Writing clean, modern ES6+ JavaScript for interactive and asynchronous application logic.'
            ],
            [
                'name' => 'AJAX',
                'icon' => 'assets/icons/ajax.svg',
                'description' => 'Implementing seamless, asynchronous data loading without full page reloads for better UX.'
            ],
            [
                'name' => 'jQuery',
                'icon' => 'assets/icons/jquery.svg',
                'description' => 'DOM manipulation, event handling, and legacy project maintenance using jQuery.'
            ],

            // Markup, Styling & Design
            [
                'name' => 'HTML5',
                'icon' => 'assets/icons/html.svg',
                'description' => 'Structuring web content using semantic, accessible, and SEO-friendly HTML5 markup.'
            ],
            [
                'name' => 'CSS3',
                'icon' => 'assets/icons/css.svg',
                'description' => 'Styling custom user interfaces with modern CSS3 features, animations, and variables.'
            ],
            [
                'name' => 'Tailwind CSS',
                'icon' => 'assets/icons/tailwind.svg',
                'description' => 'Rapid UI development using utility-first CSS for highly customizable and modern designs.'
            ],
            [
                'name' => 'Bootstrap',
                'icon' => 'assets/icons/bootstrap.svg',
                'description' => 'Utilizing the Bootstrap framework for quick, reliable, and component-rich frontend layouts.'
            ],
            [
                'name' => 'Responsive Design',
                'icon' => 'assets/icons/responsive.svg',
                'description' => 'Ensuring web applications look and function flawlessly across all devices and screen sizes.'
            ],
        ]);
    }
}
