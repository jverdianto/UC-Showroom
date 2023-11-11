<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Truck>
 */
class TruckFactory extends Factory
{
    private $urutanTruk = 40;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->urutanTruk++;
        
        return [
            'vehicle_id' => $this->urutanTruk,
            'roda_ban' => $this->faker->numberBetween(4, 12),
            'luas_area_kargo' => $this->faker->numberBetween(50, 500),
        ];
    }
}
