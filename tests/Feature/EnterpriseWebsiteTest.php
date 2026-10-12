<?php

namespace Tests\Feature;

use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EnterpriseWebsiteTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_loads_with_enterprise_branding(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Webyotic');
        $response->assertSee('Vinay');
        $response->assertSee('Shivam');
    }

    public function test_about_page_loads_with_founder_information(): void
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('Vinay');
        $response->assertSee('Shivam');
    }

    public function test_services_page_loads_successfully(): void
    {
        $response = $this->get('/services');
        $response->assertStatus(200);
        $response->assertSee('Enterprise Solutions');
    }

    public function test_gallery_and_case_studies_load_successfully(): void
    {
        $response = $this->get('/gallery');
        $response->assertStatus(200);
        $response->assertSee('Case Studies');
    }

    public function test_testimonials_page_loads_successfully(): void
    {
        $response = $this->get('/testimonials');
        $response->assertStatus(200);
        $response->assertSee('Authentic Social Proof');
    }

    public function test_contact_submission_creates_inquiry(): void
    {
        $data = [
            'name' => 'John Enterprise',
            'email' => 'john@enterprise.com',
            'phone' => '+1 555 123 4567',
            'service' => 'Enterprise Web Applications',
            'budget' => '$15k - $30k',
            'subject' => 'Scale Infrastructure',
            'message' => 'We need an enterprise Laravel platform built with high security.',
        ];

        $response = $this->post('/contact', $data);
        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('inquiries', [
            'email' => 'john@enterprise.com',
            'service' => 'Enterprise Web Applications',
        ]);
    }

    public function test_interactive_quote_submission_creates_inquiry(): void
    {
        $data = [
            'name' => 'Sarah Connor',
            'email' => 'sarah@cyberdyne.io',
            'phone' => '+1 555 987 6543',
            'project_type' => 'AI Engineering & Automation',
            'timeline' => '4 - 8 Weeks',
            'estimated_budget' => '$15k - $50k+',
            'details' => 'Autonomous data processing pipelines.',
        ];

        $response = $this->post('/quote', $data);
        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('inquiries', [
            'email' => 'sarah@cyberdyne.io',
            'service' => 'AI Engineering & Automation',
        ]);
    }

    public function test_admin_dashboard_accessible_by_authenticated_user(): void
    {
        $user = User::first() ?: User::factory()->create([
            'email' => 'admin@webyotic.com',
            'role' => 'admin',
        ]);

        $response = $this->actingAs($user)->get('/admin/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Executive Telemetry Dashboard');
    }

    public function test_admin_inquiries_management_accessible(): void
    {
        $user = User::first() ?: User::factory()->create([
            'email' => 'admin@webyotic.com',
            'role' => 'admin',
        ]);

        $response = $this->actingAs($user)->get('/admin/inquiries');
        $response->assertStatus(200);
        $response->assertSee('Client Inquiries');
    }

    public function test_homepage_renders_full_width_seo_slider(): void
    {
        \App\Models\Slider::create([
            'badge' => '⚡ TEST BADGE',
            'title' => 'Test SEO Title Domination',
            'highlight' => 'Domination',
            'subtitle' => 'Test Subtitle for organic rank',
            'seo_stat_label_1' => 'Organic Surge',
            'seo_stat_val_1' => '+999%',
            'is_active' => true,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Test SEO Title Domination');
        $response->assertSee('+999%');
    }

    public function test_admin_can_manage_sliders(): void
    {
        $user = User::first() ?: User::factory()->create([
            'email' => 'admin@webyotic.com',
            'role' => 'admin',
        ]);

        $response = $this->actingAs($user)->get('/admin/sliders');
        $response->assertStatus(200);
        $response->assertSee('Full-Width SEO Marquee Sliders');

        $postData = [
            'badge' => '⚡ REVOLUTIONARY SEO',
            'title' => 'Engineered for Organic Scale',
            'highlight' => 'Organic Scale',
            'subtitle' => 'Scale search visibility by 10x with modern headless architecture.',
            'button_text' => 'Start Now',
            'button_url' => '/contact',
            'seo_stat_label_1' => 'Traffic Lift',
            'seo_stat_val_1' => '+500%',
            'order' => 1,
            'is_active' => '1',
        ];

        $postResponse = $this->actingAs($user)->post('/admin/sliders', $postData);
        $postResponse->assertRedirect('/admin/sliders');
        $this->assertDatabaseHas('sliders', [
            'title' => 'Engineered for Organic Scale',
            'seo_stat_val_1' => '+500%',
        ]);
    }
}
