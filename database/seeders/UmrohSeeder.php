<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Umroh;
use Illuminate\Support\Str;

class UmrohSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Umroh::create([
                'name'        => 'Paket Umroh ' . $i,
                'description' => Str::limit(str_repeat('Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 10), 1000),
                'price'       => rand(20000000, 40000000),
                'image'       => 'images/default.png',
            ]);
        }
    }
}
