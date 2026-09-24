<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('sort_order', 'asc')->orderBy('id', 'desc')->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:200',
            'role' => 'required|string|max:150',
            'period' => 'required|string|max:100',
            'type' => 'nullable|string|max:100',
            'description' => 'required|string|max:2000',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? (Experience::max('sort_order') + 1);

        Experience::create($validated);

        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman berhasil ditambahkan!');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:200',
            'role' => 'required|string|max:150',
            'period' => 'required|string|max:100',
            'type' => 'nullable|string|max:100',
            'description' => 'required|string|max:2000',
            'sort_order' => 'nullable|integer',
        ]);

        $experience->update($validated);

        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman berhasil diperbarui!');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman berhasil dihapus!');
    }
}
