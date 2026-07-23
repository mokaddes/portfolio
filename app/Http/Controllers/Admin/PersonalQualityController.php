<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PersonalQuality;
use Illuminate\Http\Request;

class PersonalQualityController extends Controller
{
    public function index()
    {
        $qualities = PersonalQuality::orderBy('id', 'desc')->get();
        return view('admin.personal-qualities.index', compact('qualities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'icon'        => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'nullable|string',
            'status'      => 'nullable|boolean',
        ]);

        $iconName = time() . '_quality.' . $request->icon->extension();
        $request->icon->move(public_path('assets/icons'), $iconName);

        PersonalQuality::create([
            'title'       => $request->title,
            'icon'        => 'assets/icons/' . $iconName,
            'description' => $request->description,
            'status'      => $request->status ?? 1,
        ]);

        return redirect()->back()->with('success', 'Personal quality added successfully.');
    }

    public function update(Request $request, PersonalQuality $personalQuality)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'icon'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'nullable|string',
            'status'      => 'nullable|boolean',
        ]);

        $data = [
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status ?? $personalQuality->status,
        ];

        if ($request->hasFile('icon')) {
            if ($personalQuality->icon && file_exists(public_path($personalQuality->icon))) {
                @unlink(public_path($personalQuality->icon));
            }
            $iconName = time() . '_quality.' . $request->icon->extension();
            $request->icon->move(public_path('assets/icons'), $iconName);
            $data['icon'] = 'assets/icons/' . $iconName;
        }

        $personalQuality->update($data);

        return redirect()->back()->with('success', 'Personal quality updated successfully.');
    }

    public function destroy(PersonalQuality $personalQuality)
    {
        if ($personalQuality->icon && file_exists(public_path($personalQuality->icon))) {
            @unlink(public_path($personalQuality->icon));
        }
        $personalQuality->delete();
        return redirect()->back()->with('success', 'Personal quality deleted.');
    }

    public function toggleStatus(PersonalQuality $personalQuality)
    {
        $personalQuality->update(['status' => !$personalQuality->status]);
        return response()->json(['success' => true, 'status' => $personalQuality->status]);
    }
}
