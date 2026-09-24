<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $technicalSkills = Skill::where('category', 'Technical Skills')->orderBy('sort_order', 'asc')->get();
        $softSkills = Skill::where('category', 'Soft Skills')->orderBy('sort_order', 'asc')->get();
        return view('admin.skills.index', compact('technicalSkills', 'softSkills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'category' => 'required|in:Technical Skills,Soft Skills',
            'familiarity_level' => 'nullable|string|max:100',
            'icon' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? (Skill::where('category', $validated['category'])->max('sort_order') + 1);

        Skill::create($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil ditambahkan!');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'category' => 'required|in:Technical Skills,Soft Skills',
            'familiarity_level' => 'nullable|string|max:100',
            'icon' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
        ]);

        $skill->update($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil diperbarui!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil dihapus!');
    }
}
