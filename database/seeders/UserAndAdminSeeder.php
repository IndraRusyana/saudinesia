<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Seeder untuk tabel users
        for ($i = 1; $i <= 5; $i++) {
            DB::table('users')->insert([
                'name' => 'User'.$i,
                'email' => 'user'.$i.'@mail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Ganti dengan password aman
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seeder untuk tabel admins
        DB::table('admins')->insert([
            'name' => 'Admin1',
            'email' => 'admin1@mail.com',
            'password' => Hash::make('password'), // Ganti dengan password aman
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
