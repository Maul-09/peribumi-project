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
            $table->string('nama_produk')->nullable();
            $table->string('teknis')->nullable();
            $table->string('image')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('durasi')->nullable();
            $table->string('personil')->nullable();
            $table->string('persyaratan')->nullable();
            $table->string('metodologi')->nullable();
            $table->string('sasaran')->nullable();
            $table->string('jenis_pekerjaan')->nullable();
            $table->string('kualifikasi')->nullable();
            $table->string('ruang_lingkup')->nullable();
            $table->string('klasifikasi')->nullable();
            $table->string('durasi_/_lembaga')->nullable();
            $table->string('kategori')->nullable();
            $table->string('jadwal_lokasi_fasilitas')->nullable();
            $table->string('deskripsi_harga')->nullable();
            $table->string('highlight_harga')->nullable();
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
