<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AiProvider;
use Illuminate\Http\Request;

class AiProviderController extends Controller
{
    public function index()
    {
        $providers = AiProvider::orderBy('id')->get();
        return view('admin.ai-providers.index', compact('providers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'provider' => 'required|in:openai,gemini,vllm,ollama,openai_compatible',
            'api_key'  => 'nullable|string',
            'api_url'  => 'nullable|string|max:255',
            'model'    => 'nullable|string|max:255',
            'options'  => 'nullable|json',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->is_active) {
            AiProvider::where('is_active', true)->update(['is_active' => false]);
        }

        AiProvider::create([
            'name'      => $request->name,
            'provider'  => $request->provider,
            'api_key'   => $request->api_key,
            'api_url'   => $request->api_url,
            'model'     => $request->model,
            'options'   => $request->options ? json_decode($request->options, true) : null,
            'is_active' => $request->is_active ?? false,
        ]);

        return redirect()->back()->with('success', 'AI provider added.');
    }

    public function update(Request $request, AiProvider $aiProvider)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'provider'  => 'required|in:openai,gemini,vllm,ollama,openai_compatible',
            'api_key'   => 'nullable|string',
            'api_url'   => 'nullable|string|max:255',
            'model'     => 'nullable|string|max:255',
            'options'   => 'nullable|json',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->is_active && !$aiProvider->is_active) {
            AiProvider::where('is_active', true)->update(['is_active' => false]);
        }

        $aiProvider->update([
            'name'      => $request->name,
            'provider'  => $request->provider,
            'api_key'   => $request->api_key ?? $aiProvider->api_key,
            'api_url'   => $request->api_url,
            'model'     => $request->model,
            'options'   => $request->options ? json_decode($request->options, true) : null,
            'is_active' => $request->is_active ?? false,
        ]);

        return redirect()->back()->with('success', 'AI provider updated.');
    }

    public function destroy(AiProvider $aiProvider)
    {
        $aiProvider->delete();
        return redirect()->back()->with('success', 'AI provider deleted.');
    }

    public function toggleActive(AiProvider $aiProvider)
    {
        AiProvider::where('is_active', true)->update(['is_active' => false]);
        $aiProvider->update(['is_active' => true]);

        return redirect()->back()->with('success', "{$aiProvider->name} is now active.");
    }
}
