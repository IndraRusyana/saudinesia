<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceMuttowifSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('price_muttowifs')->insert([
            [
                'price' => 1500000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
