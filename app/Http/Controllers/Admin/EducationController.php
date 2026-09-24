<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderBy('sort_order', 'asc')->get();
        return view('admin.education.index', compact('educations'));
    }

    public function create()
    {
        return view('admin.education.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:200',
            'degree' => 'required|string|max:150',
            'field_of_study' => 'nullable|string|max:150',
            'period' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:1500',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? (Education::max('sort_order') + 1);

        Education::create($validated);

        return redirect()->route('admin.education.index')->with('success', 'Riwayat pendidikan berhasil ditambahkan!');
    }

    public function edit(Education $education)
    {
        return view('admin.education.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:200',
            'degree' => 'required|string|max:150',
            'field_of_study' => 'nullable|string|max:150',
            'period' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:1500',
            'sort_order' => 'nullable|integer',
        ]);

        $education->update($validated);

        return redirect()->route('admin.education.index')->with('success', 'Riwayat pendidikan berhasil diperbarui!');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('admin.education.index')->with('success', 'Riwayat pendidikan berhasil dihapus!');
    }
}
