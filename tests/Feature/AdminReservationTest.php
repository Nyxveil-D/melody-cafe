<?php

namespace Tests\Feature;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminReservationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create(['role' => 'admin']);
    }

    public function test_admin_can_view_reservations()
    {
        $this->actingAs($this->admin)->get(route('admin.reservations.index'))->assertStatus(200);
    }

    public function test_admin_can_update_status()
    {
        $reservation = Reservation::factory()->create(['status' => 'pending']);
        $this->actingAs($this->admin)
            ->patch(route('admin.reservations.update', $reservation), ['status' => 'confirmed'])
            ->assertRedirect();
        
        $this->assertEquals('confirmed', $reservation->fresh()->status);
    }

    public function test_unauthorized_user_cannot_access()
    {
        $this->get(route('admin.reservations.index'))->assertRedirect(route('admin.login'));
    }
}
