<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Message>
 */
class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition(): array
    {
        return [
            'name' => fake('id_ID')->name(),
            'email' => fake()->unique()->safeEmail(),
            'subject' => fake()->randomElement([
                'Pertanyaan menu',
                'Reservasi meja',
                'Kerja sama acara',
                'Saran untuk cafe',
            ]),
            'message' => fake()->paragraph(),
            'status' => fake()->randomElement(['unread', 'read']),
        ];
    }
}
