<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kendaraan>
 */
class KendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'plat' => $this->faker->bothify('??###??'),
            'merk' => $this->faker->randomElement(['Toyota', 'Honda', 'Ford', 'Nissan']),
            'status' => $this->faker->randomElement(['active', 'expedition', 'maintenance']),
        ];
    }
}
