<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\User;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    public function test_portfolio_homepage_is_accessible_and_displays_name(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Fauzi Agus Budiman');
        $response->assertSee('Fresh Graduate S1 Teknik Informatika');
    }

    public function test_project_detail_page_is_accessible(): void
    {
        $project = Project::first();

        $response = $this->get('/projects/' . $project->slug);

        $response->assertStatus(200);
        $response->assertSee($project->title);
    }

    public function test_contact_form_submission_stores_message(): void
    {
        $payload = [
            'name' => 'HR Recruiter Test',
            'email' => 'hr@company.com',
            'subject' => 'Job Interview Opportunity',
            'message' => 'Halo Fauzi, kami tertarik dengan portofolio Anda untuk posisi Web Developer.',
        ];

        $response = $this->post('/contact/send', $payload);

        $response->assertRedirect('/#contact');
        $this->assertDatabaseHas('contact_messages', [
            'email' => 'hr@company.com',
            'name' => 'HR Recruiter Test',
        ]);
    }

    public function test_guest_is_redirected_to_admin_login(): void
    {
        $response = $this->get('/admin/dashboard');

        $response->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_login_and_access_dashboard(): void
    {
        $admin = User::where('email', 'admin@fauzi.dev')->first();

        $response = $this->post('/admin/login', [
            'email' => 'admin@fauzi.dev',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($admin);

        $dashboardResponse = $this->actingAs($admin)->get('/admin/dashboard');
        $dashboardResponse->assertStatus(200);
        $dashboardResponse->assertSee('Ringkasan Dashboard');
    }
}
