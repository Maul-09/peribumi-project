<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('image')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('durasi');
            $table->string('personil');
            $table->string('persyaratan');
            $table->string('metodologi');
            $table->string('sasaran');
            $table->string('jadwal_lokasi_fasilitas');
            $table->string('desc_harga');
            $table->string('hl_harga');
            $table->string('produkType')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
