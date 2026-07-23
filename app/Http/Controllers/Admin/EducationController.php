<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderBy('id', 'desc')->get();
        return view('admin.educations.index', compact('educations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'degree'       => 'required|string|max:255',
            'institution'  => 'required|string|max:255',
            'year'         => 'nullable|string|max:50',
            'cgpa'         => 'nullable|numeric|between:0,9.99',
            'out_of_cgpa'  => 'nullable|numeric|between:0,9.99',
            'status'       => 'nullable|boolean',
        ]);

        Education::create([
            'degree'      => $request->degree,
            'institution' => $request->institution,
            'year'        => $request->year,
            'cgpa'        => $request->cgpa,
            'out_of_cgpa' => $request->out_of_cgpa,
            'status'      => $request->status ?? 1,
        ]);

        return redirect()->back()->with('success', 'Education record added successfully.');
    }

    public function update(Request $request, Education $education)
    {
        $request->validate([
            'degree'       => 'required|string|max:255',
            'institution'  => 'required|string|max:255',
            'year'         => 'nullable|string|max:50',
            'cgpa'         => 'nullable|numeric|between:0,9.99',
            'out_of_cgpa'  => 'nullable|numeric|between:0,9.99',
            'status'       => 'nullable|boolean',
        ]);

        $education->update([
            'degree'      => $request->degree,
            'institution' => $request->institution,
            'year'        => $request->year,
            'cgpa'        => $request->cgpa,
            'out_of_cgpa' => $request->out_of_cgpa,
            'status'      => $request->status ?? $education->status,
        ]);

        return redirect()->back()->with('success', 'Education record updated successfully.');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->back()->with('success', 'Education record deleted.');
    }

    public function toggleStatus(Education $education)
    {
        $education->update(['status' => !$education->status]);
        return response()->json(['success' => true, 'status' => $education->status]);
    }
}
