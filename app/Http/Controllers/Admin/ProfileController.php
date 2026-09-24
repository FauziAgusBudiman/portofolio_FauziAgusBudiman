<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show profile edit view.
     */
    public function index()
    {
        $profile = Profile::firstOrCreate(
            ['id' => 1],
            [
                'full_name' => 'Fauzi Agus Budiman',
                'headline' => 'Fresh Graduate S1 Teknik Informatika',
                'sub_headline' => 'Universitas Suryakancana, Cianjur',
                'location' => 'Cianjur, Jawa Barat',
            ]
        );

        return view('admin.profile.index', compact('profile'));
    }

    /**
     * Update profile data.
     */
    public function update(Request $request)
    {
        $profile = Profile::firstOrCreate(['id' => 1]);

        $validated = $request->validate([
            'full_name' => 'required|string|max:150',
            'headline' => 'required|string|max:200',
            'sub_headline' => 'nullable|string|max:200',
            'bio' => 'nullable|string|max:1000',
            'about_text' => 'nullable|string|max:5000',
            'email' => 'nullable|email|max:150',
            'phone' => 'nullable|string|max:50',
            'whatsapp' => 'nullable|string|max:50',
            'location' => 'nullable|string|max:150',
            'is_available' => 'nullable|boolean',
            'avatar_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'cv_file_upload' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'cv_file_link' => 'nullable|string|max:255',
        ]);

        $validated['is_available'] = $request->has('is_available');

        // Handle Avatar Upload
        if ($request->hasFile('avatar_file')) {
            $avatar = $request->file('avatar_file');
            $filename = 'avatar_' . time() . '.' . $avatar->getClientOriginalExtension();
            $path = $avatar->storeAs('uploads/profile', $filename, 'public');
            $validated['avatar'] = '/storage/' . $path;
        }

        // Handle CV Upload
        if ($request->hasFile('cv_file_upload')) {
            $cv = $request->file('cv_file_upload');
            $filename = 'CV_Fauzi_Agus_Budiman_' . time() . '.' . $cv->getClientOriginalExtension();
            $path = $cv->storeAs('uploads/cv', $filename, 'public');
            $validated['cv_file'] = '/storage/' . $path;
        } elseif (!empty($request->cv_file_link)) {
            $validated['cv_file'] = $request->cv_file_link;
        }

        unset($validated['avatar_file'], $validated['cv_file_upload'], $validated['cv_file_link']);

        $profile->update($validated);

        return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
