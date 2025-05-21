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

        // Ambil semua user dan profilnya
        $users = DB::table('users')
            ->join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
            ->select(
                'users.id as user_id',
                'user_profiles.nama_lengkap',
                'user_profiles.tempat_lahir',
                'user_profiles.tanggal_lahir',
                'user_profiles.jenis_kelamin',
                'user_profiles.pekerjaan',
                'user_profiles.no_hp',
                'user_profiles.no_paspor',
                'user_profiles.paspor_terbit',
                'user_profiles.paspor_kadaluarsa',
                'user_profiles.wilayah_terbit',
                'user_profiles.lampiran_paspor'
            )
            ->get();

        foreach ($users as $user) {
            $checkinMekkah = Carbon::parse('2025-07-01')->addDays(rand(0, 10));
            $checkoutMekkah = (clone $checkinMekkah)->addDays(3);
            $checkinMadinah = (clone $checkoutMekkah)->addDays(1);
            $checkoutMadinah = (clone $checkinMadinah)->addDays(3);

            DB::table('visas')->insert([
                'user_id' => $user->user_id,
                'nama_lengkap' => $user->nama_lengkap,
                'tempat_lahir' => $user->tempat_lahir,
                'tanggal_lahir' => $user->tanggal_lahir,
                'jenis_kelamin' => $user->jenis_kelamin,
                'pekerjaan' => $user->pekerjaan,
                'no_hp' => $user->no_hp,
                'no_paspor' => $user->no_paspor,
                'paspor_terbit' => $user->paspor_terbit,
                'paspor_kadaluarsa' => $user->paspor_kadaluarsa,
                'wilayah_terbit' => $user->wilayah_terbit,

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
                'lampiran_paspor' => $user->lampiran_paspor,
                'lampiran_kk' => 'lampiran/kk.jpg',
                'lampiran_tiket' => 'lampiran/tiket.jpg',
                'lampiran_hotel' => 'lampiran/hotel.jpg',

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

