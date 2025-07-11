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
        $this->call([
            UserAndAdminSeeder::class, 
            RoomTypeSeeder::class, 
            CityAndPeriodSeeder::class, 
            InformationSeeder::class, 
            HotelSeeder::class, 
            TransportSeeder::class, 
            MuttowifSeeder::class, 
            VisaSeeder::class,
            LandArrangementSeeder::class,
            HajiSeeder::class, 
            UmrohSeeder::class, 
            MerchandiseSeeder::class,
            TransactionSeeder::class,
            TestimoniSeeder::class,
            GaleriSeeder::class,
            HeroSeeder::class,
            PriceMuttowifSeeder::class,
            PriceVisaSeeder::class,
        ]);
    }
}
