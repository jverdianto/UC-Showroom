<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    private $urutanMobil = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->urutanMobil++;
        
        return [
            'vehicle_id' => $this->urutanMobil,
            'tipe_bahan_bakar' => $this->faker->randomElement(['Pertalite', 'Pertamax', 'Dex', 'Solar']),
            'luas_bagasi' => $this->faker->numberBetween(5, 50)
        ];
    }
}
