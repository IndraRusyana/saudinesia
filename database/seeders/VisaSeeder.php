<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class VisaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 5; $i++) {
            $tanggalLahir = $faker->date('Y-m-d', '2000-01-01');
            $pasporTerbit = $faker->dateTimeBetween('-5 years', 'now');
            $pasporKadaluarsa = (clone $pasporTerbit)->modify('+5 years');

            $checkinMekkah = Carbon::parse('2025-07-01')->addDays(rand(0, 10));
            $checkoutMekkah = (clone $checkinMekkah)->addDays(3);
            $checkinMadinah = (clone $checkoutMekkah)->addDays(1);
            $checkoutMadinah = (clone $checkinMadinah)->addDays(3);

            DB::table('visas')->insert([
                'user_id' => $i,
                'nama_lengkap' => $faker->name,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $tanggalLahir,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'pekerjaan' => $faker->jobTitle,
                'no_hp' => $faker->phoneNumber,

                'no_paspor' => strtoupper($faker->bothify('A#######')),
                'paspor_terbit' => $pasporTerbit->format('Y-m-d'),
                'paspor_kadaluarsa' => $pasporKadaluarsa->format('Y-m-d'),

                'tanggal_berangkat' => '2025-07-01',
                'maskapai_berangkat' => $faker->company,
                'no_penerbangan_berangkat' => 'GA' . rand(100, 999),
                'tanggal_kembali' => '2025-07-10',
                'maskapai_kembali' => $faker->company,
                'no_penerbangan_kembali' => 'GA' . rand(800, 999),

                'hotel_mekkah' => 'Hotel Mekkah ' . $faker->lastName,
                'checkin_mekkah' => $checkinMekkah->toDateString(),
                'checkout_mekkah' => $checkoutMekkah->toDateString(),
                'hotel_madinah' => 'Hotel Madinah ' . $faker->lastName,
                'checkin_madinah' => $checkinMadinah->toDateString(),
                'checkout_madinah' => $checkoutMadinah->toDateString(),

                'lampiran_ktp' => 'lampiran/ktp.jpg',
                'lampiran_paspor' => 'lampiran/paspor.jpg',
                'lampiran_kk' => 'lampiran/kk.jpg',
                'lampiran_tiket' => 'lampiran/tiket.jpg',
                'lampiran_hotel' => 'lampiran/hotel.jpg',

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
