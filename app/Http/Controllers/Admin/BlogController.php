<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Services\AiService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->get();
        $categories = Category::where('status', 1)->orderBy('order_id')->get();
        return view('admin.blogs.index', compact('blogs', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'excerpt'     => 'nullable|string',
            'content'     => 'required|string',
            'category'    => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'is_featured' => 'nullable|boolean',
            'status'      => 'nullable|boolean',
        ]);

        $data = [
            'title'       => $request->title,
            'slug'        => Str::slug($request->title) . '-' . uniqid(),
            'excerpt'     => $request->excerpt,
            'content'     => $request->content,
            'category'    => $request->category,
            'is_featured' => $request->is_featured ?? false,
            'status'      => $request->status ?? 1,
            'published_at' => $request->status ? now() : null,
        ];

        if ($request->hasFile('cover_image')) {
            $imageName = time() . '_blog.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('assets/images'), $imageName);
            $data['cover_image'] = 'assets/images/' . $imageName;
        }

        $blog = Blog::create($data);

        if ($request->has('generate_topics') && $request->generate_topics) {
            $aiService = new AiService();
            $topics = $aiService->generateRelatedTopics(
                $blog->title,
                $blog->content,
                $blog->category
            );
            if (!empty($topics)) {
                $blog->update(['related_topics' => $topics]);
            }
        }

        return redirect()->back()->with('success', 'Blog post created successfully.');
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'excerpt'     => 'nullable|string',
            'content'     => 'required|string',
            'category'    => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'is_featured' => 'nullable|boolean',
            'status'      => 'nullable|boolean',
        ]);

        $data = [
            'title'       => $request->title,
            'excerpt'     => $request->excerpt,
            'content'     => $request->content,
            'category'    => $request->category,
            'is_featured' => $request->is_featured ?? $blog->is_featured,
            'status'      => $request->status ?? $blog->status,
        ];

        if ($request->slug && $request->slug !== $blog->slug) {
            $data['slug'] = Str::slug($request->slug);
        }

        if ($request->hasFile('cover_image')) {
            if ($blog->cover_image && file_exists(public_path($blog->cover_image))) {
                @unlink(public_path($blog->cover_image));
            }
            $imageName = time() . '_blog.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('assets/images'), $imageName);
            $data['cover_image'] = 'assets/images/' . $imageName;
        }

        if ($request->status && !$blog->published_at) {
            $data['published_at'] = now();
        }

        $blog->update($data);

        if ($request->has('generate_topics') && $request->generate_topics) {
            $aiService = new AiService();
            $topics = $aiService->generateRelatedTopics(
                $blog->title,
                $blog->content,
                $blog->category
            );
            if (!empty($topics)) {
                $blog->update(['related_topics' => $topics]);
            }
        }

        return redirect()->back()->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->cover_image && file_exists(public_path($blog->cover_image))) {
            @unlink(public_path($blog->cover_image));
        }
        $blog->delete();

        return redirect()->back()->with('success', 'Blog post deleted.');
    }

    public function generateTopics(Request $request, Blog $blog)
    {
        $aiService = new AiService();
        $topics = $aiService->generateRelatedTopics(
            $blog->title,
            $blog->content,
            $blog->category
        );

        if (!empty($topics)) {
            $blog->update(['related_topics' => $topics]);
            return response()->json(['success' => true, 'topics' => $topics]);
        }

        return response()->json(['success' => false, 'message' => 'Failed to generate topics.'], 422);
    }

    public function createWithAi(Request $request)
    {
        $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'topic'       => 'required|string|max:255',
        ]);

        $category = $request->category_id ? Category::find($request->category_id) : null;
        $categoryName = $category->name ?? $request->input('category_name', 'General');

        $aiService = new AiService();

        $prompt = "Write a complete blog post in JSON format with the following fields: "
            . "title (string), excerpt (string, 2-3 sentences), content (string, full HTML article with multiple paragraphs and sections). "
            . "Category: {$categoryName}. Topic: {$request->topic}. "
            . "Also suggest 3 related topic tags as a JSON array in a 'tags' field. "
            . "Return ONLY valid JSON, no markdown, no explanation.";

        $response = $aiService->call($prompt);

        if (!$response) {
            return response()->json(['success' => false, 'message' => 'AI generation failed.'], 422);
        }

        $response = preg_replace('/^```(?:json)?\s*|\s*```$/', '', trim($response));
        $generated = json_decode($response, true);

        if (!$generated || !isset($generated['title'], $generated['content'])) {
            return response()->json(['success' => false, 'message' => 'Invalid AI response format.'], 422);
        }

        $blog = Blog::create([
            'title'       => $generated['title'],
            'slug'        => Str::slug($generated['title']) . '-' . uniqid(),
            'excerpt'     => $generated['excerpt'] ?? '',
            'content'     => $generated['content'],
            'category'    => $categoryName,
            'status'      => 0,
            'is_featured' => false,
            'published_at' => null,
            'related_topics' => $generated['tags'] ?? [],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Blog post created with AI. Review and publish it.',
            'blog' => $blog,
        ]);
    }
}
