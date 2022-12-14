<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusSchedule>
 */
class BusScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bus_id' => fake()->numberBetween(1, 9),
            'take_off_time' => fake()->dateTime()->format('Y-m-d H:i'),            
            'drop_off_time' => fake()->dateTime()->format('Y-m-d H:i'),
            'take_off' => fake()->word(),
            'destination' => fake()->word(),
            'ticket_price' => 100,
        ];
    }
}
