<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order', 'asc')->orderBy('id', 'desc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'slug' => 'nullable|string|max:200|unique:projects,slug',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'technologies' => 'required|string',
            'features' => 'nullable|string',
            'demo_url' => 'nullable|string|max:255',
            'github_url' => 'nullable|string|max:255',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:3072',
            'image_url' => 'nullable|string|max:255',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
            if (Project::where('slug', $validated['slug'])->exists()) {
                $validated['slug'] .= '-' . time();
            }
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['sort_order'] = $validated['sort_order'] ?? (Project::max('sort_order') + 1);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'proj_' . time() . '_' . Str::slug($validated['title']) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/projects', $filename, 'public');
            $validated['image'] = '/storage/' . $path;
        } elseif (!empty($request->image_url)) {
            $validated['image'] = $request->image_url;
        }

        unset($validated['image_file'], $validated['image_url']);

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil ditambahkan!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'slug' => 'required|string|max:200|unique:projects,slug,' . $project->id,
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'technologies' => 'required|string',
            'features' => 'nullable|string',
            'demo_url' => 'nullable|string|max:255',
            'github_url' => 'nullable|string|max:255',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:3072',
            'image_url' => 'nullable|string|max:255',
        ]);

        $validated['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'proj_' . time() . '_' . Str::slug($validated['title']) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/projects', $filename, 'public');
            $validated['image'] = '/storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $validated['image'] = $request->image_url;
        }

        unset($validated['image_file'], $validated['image_url']);

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dihapus!');
    }
}
