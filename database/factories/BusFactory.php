<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bus>
 */
class BusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'companyName' => fake()->word(),
            'licensePlate' => fake()->bothify('???-###-??'),
            'driverName' => fake()->name(),
            'busCapacity' => fake()->randomNumber(2, true),
        ];
    }

    
}
