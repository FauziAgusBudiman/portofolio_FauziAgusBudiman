<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Certification::orderBy('sort_order', 'asc')->get();
        return view('admin.certifications.index', compact('certifications'));
    }

    public function create()
    {
        return view('admin.certifications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'issuer' => 'nullable|string|max:150',
            'issue_date' => 'nullable|string|max:100',
            'score_or_credential' => 'nullable|string|max:150',
            'credential_url' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? (Certification::max('sort_order') + 1);

        Certification::create($validated);

        return redirect()->route('admin.certifications.index')->with('success', 'Sertifikasi berhasil ditambahkan!');
    }

    public function edit(Certification $certification)
    {
        return view('admin.certifications.edit', compact('certification'));
    }

    public function update(Request $request, Certification $certification)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'issuer' => 'nullable|string|max:150',
            'issue_date' => 'nullable|string|max:100',
            'score_or_credential' => 'nullable|string|max:150',
            'credential_url' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $certification->update($validated);

        return redirect()->route('admin.certifications.index')->with('success', 'Sertifikasi berhasil diperbarui!');
    }

    public function destroy(Certification $certification)
    {
        $certification->delete();
        return redirect()->route('admin.certifications.index')->with('success', 'Sertifikasi berhasil dihapus!');
    }
}
