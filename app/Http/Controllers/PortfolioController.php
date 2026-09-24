<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\ContactMessage;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display the comprehensive public portfolio page.
     */
    public function index()
    {
        $profile = Profile::first() ?? new Profile();
        $experiences = Experience::orderBy('sort_order', 'asc')->orderBy('id', 'desc')->get();
        $projects = Project::orderBy('sort_order', 'asc')->orderBy('id', 'desc')->get();
        $featuredProjects = Project::where('is_featured', true)->orderBy('sort_order', 'asc')->get();
        
        $technicalSkills = Skill::where('category', 'Technical Skills')->orderBy('sort_order', 'asc')->get();
        $softSkills = Skill::where('category', 'Soft Skills')->orderBy('sort_order', 'asc')->get();
        
        $educations = Education::orderBy('sort_order', 'asc')->get();
        $certifications = Certification::orderBy('sort_order', 'asc')->get();
        $socialLinks = SocialLink::where('is_active', true)->orderBy('sort_order', 'asc')->get();

        return view('portfolio.index', compact(
            'profile',
            'experiences',
            'projects',
            'featuredProjects',
            'technicalSkills',
            'softSkills',
            'educations',
            'certifications',
            'socialLinks'
        ));
    }

    /**
     * Display single project detail.
     */
    public function showProject($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $profile = Profile::first();
        $socialLinks = SocialLink::where('is_active', true)->get();
        
        return view('portfolio.project-detail', compact('project', 'profile', 'socialLinks'));
    }

    /**
     * Handle incoming contact messages.
     */
    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|min:5|max:3000',
        ]);

        ContactMessage::create($validated);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Terima kasih! Pesan Anda berhasil dikirim dan akan segera saya respon.',
            ]);
        }

        return redirect()->to(url('/#contact'))->with('success', 'Terima kasih! Pesan Anda telah berhasil terkirim.');
    }
}
