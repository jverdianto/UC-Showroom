<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = new \App\Models\Customer([
            'nama' => 'John Wick',
            'alamat' => 'Street 247',
            'no_telpon' => '08123456789'
        ]);
        $customer->save();
    }
}
