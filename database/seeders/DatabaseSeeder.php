<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
    //     // User::factory(10)->create();

    //     User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //     ]);
    // }

    public function run(): void
    {
        $this->call(UserAndAdminSeeder::class);
        $this->call(RoomtypeSeeder::class);
        $this->call(CityAndPeriodSeeder::class);
        $this->call(InformationSeeder::class);
        $this->call(HajiSeeder::class);
        $this->call(UmrohSeeder::class);
        $this->call(HotelSeeder::class);
        $this->call(TransportSeeder::class);
        $this->call(MuttowifSeeder::class);
        $this->call(VisaSeeder::class);
    }
}
