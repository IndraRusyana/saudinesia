<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MuttowifSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            $startDate = Carbon::now()->addDays(rand(1, 10));
            $endDate = (clone $startDate)->addDays(rand(5, 10));

            DB::table('muttowifs')->insert([
                'user_id' => $i,
                'start_date' => $startDate->toDateString(),
                'end_date' => $endDate->toDateString(),
                'jamaah_count' => rand(20, 60),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
