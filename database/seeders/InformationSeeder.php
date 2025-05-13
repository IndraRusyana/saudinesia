<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Informations;
use Illuminate\Support\Str;
use Carbon\Carbon;

class InformationSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Informations::create([
                'title'   => "Informasi Penting #$i",
                'date'    => Carbon::now()->subDays(rand(0, 30))->format('Y-m-d'),
                'content' => Str::random(500), // Atau bisa pakai teks buatan
                'images'  => 'images/default.png', // Ganti dengan nama file yang tersedia
            ]);
        }
    }
}
