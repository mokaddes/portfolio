<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Project;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Project $project)
    {
        $galleries = $project->galleries()->orderByDesc('id')->get();
        return view('admin.projects.gallery', compact('project', 'galleries'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'caption' => 'nullable|string|max:255',
        ]);

        $imageName = time() . '_gallery.' . $request->image->extension();
        $request->image->move(public_path('images/galleries'), $imageName);

        $project->galleries()->create([
            'image'   => 'images/galleries/' . $imageName,
            'caption' => $request->caption,
        ]);

        return redirect()->back()->with('success', 'Gallery image added successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && file_exists(public_path($gallery->image))) {
            @unlink(public_path($gallery->image));
        }
        $gallery->delete();

        return redirect()->back()->with('success', 'Gallery image deleted.');
    }
}
