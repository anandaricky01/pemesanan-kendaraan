<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sensor>
 */
class SensorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'device_id' => $this->faker->numberBetween(1,3),
            'data' => $this->faker->numberBetween(1,50),
            'created_at' => $this->faker->dateTimeBetween('-2 month', 'now')
        ];
    }
}
