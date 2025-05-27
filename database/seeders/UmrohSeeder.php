<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Umroh;
use App\Models\LandArrangement;
use Illuminate\Support\Str;

class UmrohSeeder extends Seeder
{
    public function run(): void
    {
        $allLA = LandArrangement::pluck('id')->toArray();

        for ($i = 1; $i <= 10; $i++) {
            Umroh::create([
                'name'        => 'Paket Umroh ' . $i,
                'description' => Str::limit(str_repeat('Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 10), 1000),
                'prices'       => rand(20000000, 40000000),
                'images'       => 'images/default.png',
                'land_arrangement_id' => fake()->randomElement($allLA),
            ]);
        }
    }
}
