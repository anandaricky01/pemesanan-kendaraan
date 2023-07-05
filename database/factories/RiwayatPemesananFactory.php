<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemesanan>
 */
class RiwayatPemesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kendaraan' => $this->faker->randomElement(['bq417xc', 'pv767sd', 'vl728jg', 'td018it', 'ss090kb', 'tm541ce']),
            'user_name' => 'Ricky',
            'destinasi' => 'Raja Ampat',
            'bbm' => $this->faker->numberBetween(50,70),
            'tanggal' => $this->faker->dateTimeBetween('-2 months', 'now')->format('Y-m-d'),
        ];
    }
}
