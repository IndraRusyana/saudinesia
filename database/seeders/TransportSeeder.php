<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transport;
use App\Models\TransportImages;
use App\Models\TransportRoutes;
use App\Models\TransportPrices;
use App\Models\Period;

class TransportSeeder extends Seeder
{
    public function run(): void
    {
        $periods = Period::all();

        $routesList = ['Bandara Jeddah ke Pusat Kota Jeddah (atau sebaliknya)', 'Jeddah ke Mekkah (atau sebaliknya)', 'Mekkah ke Taif (atau sebaliknya)', 'Jeddah ke Madinah (atau sebaliknya)', 'Bandara Madinah ke Pusat Kota Madinah (atau sebaliknya)', 'Mazarat tour Mekkah atau madinah', 'Pusat Kota Mekkah ke Stasion HHR (atau sebaliknya)', 'Pusat Kota Madinah ke Stasion HHR (atau sebaliknya)', '6 Jam tour ke Mekkah', '6 jam tour di Jeddah', '6 Jam tour di Madinah'];
        foreach ($routesList as $route) {
            TransportRoutes::create([
                'routes' => $route,
            ]);
        }

        $routes = TransportRoutes::all();
        
        for ($i = 1; $i <= 10; $i++) {
            $randomRoutes = $routes->random();
            
            $transport = Transport::create([
                'name' => 'Transport ' . $i,
                'description' => 'Deskripsi untuk transportasi nomor ' . $i,
                'type' => ['Bus', 'Van', 'Sedan'][rand(0, 2)],
                'route_id' => $randomRoutes->id
            ]);

            // Tambahkan 2 gambar
            TransportImages::create([
                'transport_id' => $transport->id,
                'image_path' => 'images/default.png',
            ]);
            TransportImages::create([
                'transport_id' => $transport->id,
                'image_path' => 'images/default.png',
            ]);

            // Tambahkan harga untuk semua periode
            foreach ($periods as $period) {
                TransportPrices::create([
                    'transport_id' => $transport->id,
                    'period_id' => $period->id,
                    'price' => rand(50000, 300000),
                ]);
            }
        }
    }
}
