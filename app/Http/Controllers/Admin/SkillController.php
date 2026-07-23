<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('id', 'desc')->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'icon'        => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'nullable|string',
            'status'      => 'nullable|boolean',
        ]);

        $iconName = time() . '_skill.' . $request->icon->extension();
        $request->icon->move(public_path('assets/icons'), $iconName);

        Skill::create([
            'name'        => $request->name,
            'icon'        => 'assets/icons/' . $iconName,
            'description' => $request->description,
            'status'      => $request->status ?? 1,
        ]);

        return redirect()->back()->with('success', 'Skill added successfully.');
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'icon'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'nullable|string',
            'status'      => 'nullable|boolean',
        ]);

        $data = [
            'name'        => $request->name,
            'description' => $request->description,
            'status'      => $request->status ?? $skill->status,
        ];

        if ($request->hasFile('icon')) {
            // Remove old icon if it exists
            if ($skill->icon && file_exists(public_path($skill->icon))) {
                @unlink(public_path($skill->icon));
            }
            $iconName = time() . '_skill.' . $request->icon->extension();
            $request->icon->move(public_path('assets/icons'), $iconName);
            $data['icon'] = 'assets/icons/' . $iconName;
        }

        $skill->update($data);

        return redirect()->back()->with('success', 'Skill updated successfully.');
    }

    public function destroy(Skill $skill)
    {
        if ($skill->icon && file_exists(public_path($skill->icon))) {
            @unlink(public_path($skill->icon));
        }
        $skill->delete();
        return redirect()->back()->with('success', 'Skill deleted.');
    }

    public function toggleStatus(Skill $skill)
    {
        $skill->update(['status' => !$skill->status]);
        return response()->json(['success' => true, 'status' => $skill->status]);
    }
}
