<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Haji;
use App\Models\LandArrangement;
use Illuminate\Support\Str;

class HajiSeeder extends Seeder
{
    public function run(): void
    {
        $allLA = LandArrangement::pluck('id')->toArray();

        for ($i = 1; $i <= 10; $i++) {
            Haji::create([
                'name'        => 'Paket Haji ' . $i,
                'description' => Str::limit(str_repeat('Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 10), 1000),
                'prices'      => rand(30000000, 60000000),
                'images'      => 'images/default.png',
                'land_arrangement_id' => fake()->randomElement($allLA),
            ]);
        }
    }
}

