<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Haji;
use Illuminate\Support\Str;

class HajiSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Haji::create([
                'name'        => 'Paket Haji ' . $i,
                'description' => Str::limit(str_repeat('Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 10), 1000),
                'price'       => rand(30000000, 60000000), // harga acak
                'image'       => 'images/default.png', // ubah sesuai path image kamu
            ]);
        }
    }
}
