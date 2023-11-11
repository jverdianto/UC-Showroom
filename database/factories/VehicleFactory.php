<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model' => $this->faker->word,
            'tahun' => $this->faker->year,
            'jumlah_penumpang' => $this->faker->numberBetween(1, 8),
            'manufaktur' => $this->faker->company,
            'harga' => $this->faker->numberBetween(10000, 1000000),
            'jenis' => $this->faker->randomElement(['Mobil', 'Motor', 'Truk']),
        ];
    }
}
