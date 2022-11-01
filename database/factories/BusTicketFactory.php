<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusTicket>
 */
class BusTicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(1, 9),
            'busSchedule_id' => fake()->numberBetween(1, 20),
            'status' => 'unused',
            'price' => fake()->numberBetween(100, 250),
            'reference' => Str::random(15),            
        ];
    }
}
