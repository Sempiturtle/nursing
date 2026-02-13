<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminRedirectionTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_is_redirected_to_dashboard_when_visiting_login(): void
    {
        $user = User::factory()->create([
            'is_admin' => false,
        ]);

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/dashboard');
    }

    public function test_authenticated_admin_is_redirected_to_admin_dashboard_when_visiting_login(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $response = $this->actingAs($admin)->get('/login');

        $response->assertRedirect('/admin/dashboard');
    }

    public function test_landing_page_shows_dashboard_link_for_authenticated_admin(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $response = $this->actingAs($admin)->get('/');

        $response->assertStatus(200);
        $response->assertSee(route('admin.dashboard'));
        $response->assertSee('Dashboard');
        $response->assertDontSee('Log in');
    }

    public function test_landing_page_shows_dashboard_link_for_authenticated_user(): void
    {
        $user = User::factory()->create([
            'is_admin' => false,
        ]);

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
        $response->assertSee(route('dashboard'));
        $response->assertSee('Dashboard');
        $response->assertDontSee('Log in');
    }
}
