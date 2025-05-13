<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityAndPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder untuk tabel users
        DB::table('cities')->insert([
            'name' => 'Makkah',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('cities')->insert([
            'name' => 'Madinah',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('cities')->insert([
            'name' => 'Baghdad',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seeder untuk tabel admins
        DB::table('periods')->insert([
            'name' => 'Mei',
            'start_date' => '2025-05-01',
            'end_date' => '2025-05-31',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('periods')->insert([
            'name' => 'Juni',
            'start_date' => '2025-06-01',
            'end_date' => '2025-06-30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('periods')->insert([
            'name' => 'Juli',
            'start_date' => '2025-07-01',
            'end_date' => '2025-07-31',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
