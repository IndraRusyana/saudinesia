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
        Schema::create('land_arrangement_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_arrangement_id')->constrained()->onDelete('cascade');
            $table->string('serviceable_type')->nullable(); // untuk morph
            $table->unsignedBigInteger('serviceable_id')->nullable();
            $table->string('custom_name')->nullable(); // untuk layanan custom
            $table->string('keterangan')->nullable(); // tambahan deskripsi
            $table->string('type')->default('database'); // 'database' atau 'custom'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_arrangement_items');
    }
};
