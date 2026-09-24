<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\ContactMessage;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;

class DashboardController extends Controller
{
    /**
     * Show dashboard statistics and recent activities.
     */
    public function index()
    {
        $stats = [
            'total_projects' => Project::count(),
            'total_experiences' => Experience::count(),
            'total_skills' => Skill::count(),
            'total_certifications' => Certification::count(),
            'total_educations' => Education::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
        ];

        $recentMessages = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();
        $recentProjects = Project::orderBy('sort_order', 'asc')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentProjects'));
    }
}
