<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hero;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hero::create([
            'title' => 'Makkah’s legendary Golden Circle',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque arcu et turpis imperdiet dapibus.',
            'image' => 'hero/bg1.jpg',
        ]);
    }
}
