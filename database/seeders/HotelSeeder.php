<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Hotel;
use App\Models\HotelImage;
use App\Models\HotelPrice;
use App\Models\RoomType;
use App\Models\Period;
use App\Models\Cities;
use Illuminate\Support\Arr;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = Cities::all();
        $roomTypes = RoomType::all();
        $periods = Period::all();

        for ($i = 1; $i <= 10; $i++) {
            // Buat data hotel
            $hotel = Hotel::create([
                'name' => 'Hotel ' . $i,
                'address' => 'Alamat lengkap hotel ' . $i,
                'description' => 'Deskripsi hotel ' . $i . ' - Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'map_url' => 'https://maps.google.com/?q=Hotel+' . $i,
                'city_id' => $cities->random()->id,
                'stars' => rand(1, 5), // Bintang hotel
                'meals' => Arr::random(['Full Board (FB)', '(RO) Room Only', '(BnB) Bread & Breakfast']),
            ]);

            // Buat 2 gambar untuk setiap hotel
            for ($j = 1; $j <= 2; $j++) {
                HotelImage::create([
                    'hotel_id' => $hotel->id,
                    'image_path' => 'images/default.png', // Pastikan file dummy ada di /public/images/hotels
                ]);
            }

            // Pilih satu periode secara acak
            $randomPeriod = $periods->random();

            // Buat harga berdasarkan kombinasi periode dan tipe kamar
            foreach ($roomTypes as $roomType) {
                HotelPrice::create([
                    'hotel_id' => $hotel->id,
                    'period_id' => $randomPeriod->id,
                    'room_type_id' => $roomType->id,
                    'price' => rand(1000000, 3000000),
                ]);
            }
        }
    }
}
