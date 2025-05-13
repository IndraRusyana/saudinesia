<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Biodata
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('pekerjaan')->nullable();
            $table->string('no_hp')->nullable();

            // Paspor
            $table->string('no_paspor')->nullable();
            $table->date('paspor_terbit')->nullable();
            $table->date('paspor_kadaluarsa')->nullable();

            // Penerbangan
            $table->date('tanggal_berangkat')->nullable();
            $table->string('maskapai_berangkat')->nullable();
            $table->string('no_penerbangan_berangkat')->nullable();
            $table->date('tanggal_kembali')->nullable();
            $table->string('maskapai_kembali')->nullable();
            $table->string('no_penerbangan_kembali')->nullable();

            // Hotel
            $table->string('hotel_mekkah')->nullable();
            $table->date('checkin_mekkah')->nullable();
            $table->date('checkout_mekkah')->nullable();
            $table->string('hotel_madinah')->nullable();
            $table->date('checkin_madinah')->nullable();
            $table->date('checkout_madinah')->nullable();

            // Lampiran
            $table->string('lampiran_ktp')->nullable();
            $table->string('lampiran_paspor')->nullable();
            $table->string('lampiran_kk')->nullable();
            $table->string('lampiran_tiket')->nullable();
            $table->string('lampiran_hotel')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visas');
    }
};
