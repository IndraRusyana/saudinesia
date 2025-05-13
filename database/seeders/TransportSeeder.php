<?php

namespace Database\Seeders;

use App\Models\Transport;
use App\Models\TransportPrices;
use App\Models\TransportImages;
use App\Models\Period;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransportSeeder extends Seeder
{
    public function run(): void
    {
        $types = ['Bus', 'Mobil', 'Sedan'];
        $routes = ['Bandara Jeddah ke Pusat Kota Jeddah (atau sebaliknya)', 'Jeddah ke Mekkah (atau sebaliknya)', 'Mekkah ke Taif (atau sebaliknya)', 'Jeddah ke Madinah (atau sebaliknya)', 'Bandara Madinah ke Pusat Kota Madinah (atau sebaliknya)', 'Mazarat tour Mekkah atau madinah', 'Pontianak - Samarinda', 'Balikpapan - Banjarmasin', 'Pusat Kota Mekkah ke Stasion HHR (atau sebaliknya)', 'Pusat Kota Madinah ke Stasion HHR (atau sebaliknya)'];

        $periods = \App\Models\Period::all();

        for ($i = 1; $i <= 15; $i++) {
            $transport = Transport::create([
                'name' => 'Transport ' . $i,
                'description' => Str::limit(fake()->paragraph(3), 200),
                'route' => $routes[array_rand($routes)],
                'type' => $types[array_rand($types)],
                'schedule' => 'Setiap Hari Pukul ' . rand(5, 10) . ':00',
            ]);

            // Pilih satu periode secara acak
            $randomPeriod = $periods->random();

            TransportPrices::create([
                'transport_id' => $transport->id,
                'period_id' => $randomPeriod->id,
                'price' => rand(500000, 2000000),
            ]);

            // Tambahkan 2 gambar per transport
            for ($j = 1; $j <= 4; $j++) {
                TransportImages::create([
                    'transport_id' => $transport->id,
                    'image_path' => 'images/default.png',
                ]);
            }
        }
    }
}
