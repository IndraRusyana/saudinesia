<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceVisaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('price_visas')->insert([
            [
                'price' => 1500000.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
