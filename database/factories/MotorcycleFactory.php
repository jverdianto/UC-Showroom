<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Motorcycle>
 */
class MotorcycleFactory extends Factory
{
    private $urutanMotor = 20;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->urutanMotor++;

        return [
            'vehicle_id' => $this->urutanMotor,
            'ukuran_bagasi' => $this->faker->numberBetween(1, 10),
            'kapasitas_bensin' => $this->faker->numberBetween(1, 5),
        ];
    }
}
