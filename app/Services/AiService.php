<?php

namespace App\Services;

use App\Models\AiProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AiService
{
    protected ?AiProvider $provider;

    public function __construct(?AiProvider $provider = null)
    {
        $this->provider = $provider ?? AiProvider::getActive();
    }

    public function generateRelatedTopics(string $title, string $content, string $category = null, int $count = 3): array
    {
        if (!$this->provider) {
            return [];
        }

        $prompt = "Based on the following blog post, suggest {$count} related topic ideas for future blog posts. "
            . "Return ONLY a JSON array of strings, no markdown, no explanation.\n\n"
            . "Title: {$title}\n"
            . "Category: " . ($category ?: 'General') . "\n"
            . "Content excerpt: " . substr($content, 0, 1000) . "\n";

        $response = $this->call($prompt);

        if (!$response) {
            return [];
        }

        $topics = json_decode($response, true);

        return is_array($topics) ? $topics : [];
    }

    public function call(string $prompt): ?string
    {
        if (!$this->provider) {
            return null;
        }

        try {
            $response = match ($this->provider->provider) {
                'gemini' => $this->callGemini($prompt),
                default => $this->callOpenAiCompatible($prompt),
            };

            return $response;
        } catch (\Exception $e) {
            Log::error('AI Service error: ' . $e->getMessage());
            return null;
        }
    }

    protected function callOpenAiCompatible(string $prompt): ?string
    {
        $url = $this->provider->api_url ?: 'https://api.openai.com/v1/chat/completions';

        $payload = [
            'model' => $this->provider->model ?: 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
            'temperature' => 0.7,
        ];

        $headers = [
            'Content-Type' => 'application/json',
        ];

        if ($this->provider->api_key) {
            $headers['Authorization'] = 'Bearer ' . $this->provider->api_key;
        }

        $response = Http::withHeaders($headers)
            ->timeout(60)
            ->post($url, $payload);

        if (!$response->successful()) {
            Log::error('AI API error: ' . $response->body());
            return null;
        }

        $data = $response->json();

        return $data['choices'][0]['message']['content'] ?? null;
    }

    protected function callGemini(string $prompt): ?string
    {
        $apiKey = $this->provider->api_key;
        $model = $this->provider->model ?: 'gemini-2.0-flash';
        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}";

        $payload = [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $prompt],
                    ],
                ],
            ],
        ];

        $response = Http::timeout(60)->post($url, $payload);

        if (!$response->successful()) {
            Log::error('Gemini API error: ' . $response->body());
            return null;
        }

        $data = $response->json();

        return $data['candidates'][0]['content']['parts'][0]['text'] ?? null;
    }
}
