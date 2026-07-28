<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Repositories\CategoryRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public $projectRepo;
    public $categoryRepo;
    public function __construct()
    {
        $this->projectRepo = new ProjectRepository();
        $this->categoryRepo = new CategoryRepository();
    }

    public function index()
    {
        $projects = $this->projectRepo->all();
        $categories = $this->categoryRepo->all();
        return view('admin.projects.index', compact('projects', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'category_id' => 'required',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $data = $request->except('_token');

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = 'images/' . $imageName;
        }

        $this->projectRepo->create($data);

        return redirect()->back()->with('success', 'Project created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'category_id' => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $data = $request->except(['_token', '_method', 'image']);

        if ($request->hasFile('image')) {
            $project = Project::find($id);
            if ($project && $project->image && file_exists(public_path($project->image))) {
                @unlink(public_path($project->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = 'images/' . $imageName;
        }

        $this->projectRepo->update($data, $id);

        return redirect()->back()->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        if ($project) {
            if ($project->image && file_exists(public_path($project->image))) {
                @unlink(public_path($project->image));
            }
            $project->delete();
        }
        return redirect()->back()->with('success', 'Project deleted successfully.');
    }
}
