<?php

namespace Tests\Feature;

use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_access_reservation_page()
    {
        $this->get(route('reservation.create'))->assertStatus(200);
    }

    public function test_valid_reservation_is_stored()
    {
        $payload = [
            'customer_name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '123456789',
            'reservation_date' => now()->format('Y-m-d'),
            'reservation_time' => '18:00',
            'guest_count' => 2,
        ];

        $this->post(route('reservation.store'), $payload)->assertRedirect(route('reservation.create'));
        $this->assertDatabaseHas('reservations', ['customer_name' => 'John Doe']);
    }

    public function test_invalid_email_is_rejected()
    {
        $payload = [
            'customer_name' => 'John Doe',
            'email' => 'invalid-email',
            'phone' => '123456789',
            'reservation_date' => now()->format('Y-m-d'),
            'reservation_time' => '18:00',
            'guest_count' => 2,
        ];

        $this->post(route('reservation.store'), $payload)->assertSessionHasErrors('email');
    }

    public function test_past_date_is_rejected()
    {
        $payload = [
            'customer_name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '123456789',
            'reservation_date' => now()->subDay()->format('Y-m-d'),
            'reservation_time' => '18:00',
            'guest_count' => 2,
        ];

        $this->post(route('reservation.store'), $payload)->assertSessionHasErrors('reservation_date');
    }
}
