<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MerchandiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('merchandises')->insert([
            [
                'name' => 'Kaos Logo Official',
                'images' => 'images/default.png',
                'description' => 'Kaos berkualitas tinggi dengan logo resmi komunitas.',
                'prices' => 120000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Topi Hitam Bordir',
                'images' => 'images/default.png',
                'description' => 'Topi snapback hitam dengan bordir elegan.',
                'prices' => 85000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Stiker Pack',
                'images' => 'images/default.png',
                'description' => 'Satu set stiker keren untuk laptop, botol, dan lainnya.',
                'prices' => 25000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tumbler Eksklusif',
                'images' => 'images/default.png',
                'description' => 'Tumbler stainless steel, menjaga suhu minuman tetap ideal.',
                'prices' => 95000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Notebook Custom',
                'images' => 'images/default.png',
                'description' => 'Buku catatan dengan desain custom dan kertas premium.',
                'prices' => 45000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gantungan Kunci Akrilik',
                'images' => 'images/default.png',
                'description' => 'Gantungan kunci dari akrilik tebal, ringan dan tahan lama.',
                'prices' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Totebag Kanvas',
                'images' => 'images/default.png',
                'description' => 'Totebag berbahan kanvas kuat dan desain eksklusif.',
                'prices' => 70000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pin Magnet',
                'images' => 'images/default.png',
                'description' => 'Pin kecil berbahan logam dengan magnet, cocok untuk kulkas atau whiteboard.',
                'prices' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Poster A3',
                'images' => 'images/default.png',
                'description' => 'Poster cetak A3 dengan kualitas gambar tajam dan glossy.',
                'prices' => 30000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Masker Kain 3 Lapis',
                'images' => 'images/default.png',
                'description' => 'Masker kain reusable dengan desain menarik dan 3 lapisan pelindung.',
                'prices' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
