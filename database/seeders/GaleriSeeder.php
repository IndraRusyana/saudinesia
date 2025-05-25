<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Masjid Nabawi',
                'gambar' => 'images/default.png',
                'deskripsi' => 'Pemandangan malam Masjid Nabawi yang indah.',
                'kategori' => 'Madinah',
            ],
            [
                'nama' => 'Ka\'bah',
                'gambar' => 'images/default.png',
                'deskripsi' => 'Pusat ibadah umat Islam di Makkah.',
                'kategori' => 'Makkah',
            ],
            [
                'nama' => 'Masjid Dhahran',
                'gambar' => 'images/default.png',
                'deskripsi' => 'Keindahan arsitektur masjid di Dhahran.',
                'kategori' => 'Dhahran',
            ],
            [
                'nama' => 'Pemandangan Al-Baha',
                'gambar' => 'images/default.png',
                'deskripsi' => 'Alam dan keindahan kota Al-Baha.',
                'kategori' => 'Al-Baha',
            ],
            [
                'nama' => 'Pegunungan Abha',
                'gambar' => 'images/default.png',
                'deskripsi' => 'Pegunungan berkabut di kota Abha.',
                'kategori' => 'Abha',
            ],
        ];

        foreach ($data as $item) {
            Galeri::create($item);
        }
    }
}
