<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Umroh;
use App\Models\Haji;
use App\Models\Hotel;
use App\Models\Transport;
use App\Models\LandArrangement;
use App\Models\LandArrangementItem;

class LandArrangementSeeder extends Seeder
{
    public function run(): void
    {
        $hotel1 = Hotel::first();
        $transport1 = Transport::first();

        // Buat 2 land arrangements
        $la1 = LandArrangement::create([
            'name' => 'Paket LA A',
        ]);

        $la2 = LandArrangement::create([
            'name' => 'Paket LA B',
        ]);

        // Tambahkan item ke LA1 (2 hotel, 2 transport, 1 kustom)
        LandArrangementItem::create([
            'land_arrangement_id' => $la1->id,
            'serviceable_type' => Hotel::class,
            'serviceable_id' => $hotel1->id,
        ]);
        LandArrangementItem::create([
            'land_arrangement_id' => $la1->id,
            'serviceable_type' => Hotel::class,
            'serviceable_id' => $hotel1->id,
        ]);
        LandArrangementItem::create([
            'land_arrangement_id' => $la1->id,
            'serviceable_type' => Transport::class,
            'serviceable_id' => $transport1->id,
        ]);
        LandArrangementItem::create([
            'land_arrangement_id' => $la1->id,
            'serviceable_type' => Transport::class,
            'serviceable_id' => $transport1->id,
        ]);
        LandArrangementItem::create([
            'land_arrangement_id' => $la1->id,
            'custom_name' => 'Air Zamzam 5L',
            'keterangan' => 'Diberikan saat pulang dari Mekkah',
            'type' => 'custom',
        ]);

        // Tambahkan item ke LA2
        LandArrangementItem::create([
            'land_arrangement_id' => $la2->id,
            'serviceable_type' => Hotel::class,
            'serviceable_id' => $hotel1->id,
        ]);
        LandArrangementItem::create([
            'land_arrangement_id' => $la2->id,
            'serviceable_type' => Transport::class,
            'serviceable_id' => $transport1->id,
        ]);
        LandArrangementItem::create([
            'land_arrangement_id' => $la2->id,
            'custom_name' => 'Muttowif',
            'keterangan' => 'Pembimbing ibadah selama di tanah suci',
            'type' => 'custom',
        ]);

        // Tambahkan LA ke paket haji dan umroh
        // $haji = Haji::first();
        // $umroh = Umroh::first();

        // $haji->update(['land_arrangement_id' => $la1->id]);
        // $umroh->update(['land_arrangement_id' => $la2->id]);
    }
}

