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
        Schema::table('produks', function (Blueprint $table) {
            $table->text('teknis')->change();
            $table->text('personil')->change();
            $table->text('metodologi')->change();
            $table->text('jenis_pekerjaan')->change();
            $table->text('kualifikasi')->change();
            $table->text('ruang_lingkup')->change();
            $table->text('klasifikasi')->change();
            $table->text('lembaga')->change();
            $table->text('kategori')->change();
            $table->text('jadwal_lokasi_fasilitas')->change();
            $table->text('deskripsi_harga')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->string('teknis', 255)->change();
            $table->string('personil', 255)->change();
            $table->string('metodologi', 255)->change();
            $table->string('jenis_pekerjaan', 255)->change();
            $table->string('kualifikasi', 255)->change();
            $table->string('ruang_lingkup', 255)->change();
            $table->string('klasifikasi', 255)->change();
            $table->string('lembaga', 255)->change();
            $table->string('kategori', 255)->change();
            $table->string('jadwal_lokasi_fasilitas', 255)->change();
            $table->string('deskripsi_harga', 255)->change();
        });
    }
};
