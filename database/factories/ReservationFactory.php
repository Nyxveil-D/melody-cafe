<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Reservation>
 */
class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition(): array
    {
        return [
            'customer_name' => fake('id_ID')->name(),
            'phone' => '08'.fake()->numerify('##########'),
            'email' => fake()->unique()->safeEmail(),
            'reservation_date' => fake()->dateTimeBetween('+1 day', '+30 days')->format('Y-m-d'),
            'reservation_time' => fake()->randomElement(['10:00:00', '12:00:00', '15:00:00', '18:00:00', '19:30:00']),
            'guest_count' => fake()->numberBetween(1, 8),
            'special_request' => fake()->optional(0.4)->randomElement([
                'Minta meja dekat jendela.',
                'Mohon siapkan kursi bayi.',
                'Perayaan ulang tahun kecil.',
                'Tidak ada permintaan khusus.',
            ]),
            'status' => fake()->randomElement(['pending', 'confirmed', 'cancelled', 'completed']),
        ];
    }
}
