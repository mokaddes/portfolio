<?php

namespace Database\Seeders;

use App\Models\AiProvider;
use Illuminate\Database\Seeder;

class AiProviderSeeder extends Seeder
{
    public function run(): void
    {
        AiProvider::insert([
            [
                'name'      => 'OpenAI',
                'provider'  => 'openai',
                'api_key'   => env('OPENAI_API_KEY'),
                'api_url'   => 'https://api.openai.com/v1/chat/completions',
                'model'     => 'gpt-3.5-turbo',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'Gemini',
                'provider'  => 'gemini',
                'api_key'   => env('GEMINI_API_KEY'),
                'api_url'   => null,
                'model'     => 'gemini-2.0-flash',
                'is_active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'      => 'Ollama (Local)',
                'provider'  => 'ollama',
                'api_key'   => null,
                'api_url'   => 'http://localhost:11434/v1/chat/completions',
                'model'     => 'llama3',
                'is_active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
