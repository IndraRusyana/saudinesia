<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Carbon\Carbon;

class UserAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 5; $i++) {
            $userId = DB::table('users')->insertGetId([
                'email' => "user{$i}@mail.com",
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $tanggalLahir = $faker->date('Y-m-d', '2000-01-01');
            $pasporTerbit = Carbon::parse($faker->dateTimeBetween('-5 years', 'now'));
            $pasporKadaluarsa = (clone $pasporTerbit)->addYears(5);

            DB::table('user_profiles')->insert([
                'user_id' => $userId,
                'nama_lengkap' => $faker->name,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $tanggalLahir,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'pekerjaan' => $faker->jobTitle,
                'no_hp' => $faker->phoneNumber,
                'no_paspor' => strtoupper($faker->bothify('A#######')),
                'paspor_terbit' => $pasporTerbit->format('Y-m-d'),
                'paspor_kadaluarsa' => $pasporKadaluarsa->format('Y-m-d'),
                'lampiran_paspor' => 'images/default.png',
                'wilayah_terbit' => 'Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('admins')->insert([
            'email' => 'admin1@mail.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

