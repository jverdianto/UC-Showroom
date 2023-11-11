<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(CustomerSeeder::class);
        \App\Models\Customer::factory(50)->create();
        \App\Models\Vehicle::factory(50)->create();
        \App\Models\Car::factory(20)->create();
        \App\Models\Motorcycle::factory(20)->create();
        \App\Models\Truck::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
