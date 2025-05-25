<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimoni;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $testimonis = [
            [
                'nama' => 'Andi Wijaya',
                'foto' => 'images/person_1.jpg',
                'deskripsi' => 'lorem ipsum dolor amet',
            ],
            [
                'nama' => 'Siti Rahma',
                'foto' => 'images/person_2.jpg',
                'deskripsi' => 'lorem ipsum dolor amet',
            ],
            [
                'nama' => 'Budi Santoso',
                'foto' => 'images/person_3.jpg',
                'deskripsi' => 'lorem ipsum dolor amet',
            ],
        ];

        foreach ($testimonis as $testimoni) {
            Testimoni::create($testimoni);
        }
    }
}
