<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index()
    {
        $tools = Tool::orderBy('order')->orderBy('id', 'desc')->get();
        return view('admin.tools.index', compact('tools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'icon'        => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'nullable|string',
            'order'       => 'nullable|integer',
            'status'      => 'nullable|boolean',
        ]);

        $iconName = time() . '_tool.' . $request->icon->extension();
        $request->icon->move(public_path('assets/icons'), $iconName);

        Tool::create([
            'name'        => $request->name,
            'icon'        => 'assets/icons/' . $iconName,
            'description' => $request->description,
            'order'       => $request->order ?? 0,
            'status'      => $request->status ?? 1,
        ]);

        return redirect()->back()->with('success', 'Tool added successfully.');
    }

    public function update(Request $request, Tool $tool)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'icon'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'nullable|string',
            'order'       => 'nullable|integer',
            'status'      => 'nullable|boolean',
        ]);

        $data = [
            'name'        => $request->name,
            'description' => $request->description,
            'order'       => $request->order ?? $tool->order,
            'status'      => $request->status ?? $tool->status,
        ];

        if ($request->hasFile('icon')) {
            if ($tool->icon && file_exists(public_path($tool->icon))) {
                @unlink(public_path($tool->icon));
            }
            $iconName = time() . '_tool.' . $request->icon->extension();
            $request->icon->move(public_path('assets/icons'), $iconName);
            $data['icon'] = 'assets/icons/' . $iconName;
        }

        $tool->update($data);

        return redirect()->back()->with('success', 'Tool updated successfully.');
    }

    public function destroy(Tool $tool)
    {
        if ($tool->icon && file_exists(public_path($tool->icon))) {
            @unlink(public_path($tool->icon));
        }
        $tool->delete();
        return redirect()->back()->with('success', 'Tool deleted.');
    }

    public function toggleStatus(Tool $tool)
    {
        $tool->update(['status' => !$tool->status]);
        return response()->json(['success' => true, 'status' => $tool->status]);
    }
}
