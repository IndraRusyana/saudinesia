<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('invoice_number')->unique();
            $table->enum('status', ['belum bayar', 'sudah bayar', 'sudah diverifikasi', 'batal'])->default('belum bayar');

            $table->string('payment_proof')->nullable();
            $table->string('confirmation_letter')->nullable();
            $table->unsignedBigInteger('total_amount');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
