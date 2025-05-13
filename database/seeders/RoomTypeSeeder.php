<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder untuk tabel tipe kamar hotel
        DB::table('room_types')->insert([
            'name' => 'Double',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('room_types')->insert([
            'name' => 'Triple',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('room_types')->insert([
            'name' => 'Quad',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
