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
            $table->text('teknis')->nullable()->change();
            $table->text('personil')->nullable()->change();
            $table->text('metodologi')->nullable()->change();
            $table->text('jenis_pekerjaan')->nullable()->change();
            $table->text('kualifikasi')->nullable()->change();
            $table->text('ruang_lingkup')->nullable()->change();
            $table->text('klasifikasi')->nullable()->change();
            $table->text('lembaga')->nullable()->change();
            $table->text('kategori')->nullable()->change();
            $table->text('jadwal_lokasi_fasilitas')->nullable()->change();
            $table->text('deskripsi_harga')->nullable()->change();
            $table->text('persyaratan')->nullable()->change();
            $table->text('highlight_harga')->nullable()->change();
            $table->text('sasaran')->nullable()->change();
            $table->text('deskripsi')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->string('teknis', 255)->nullable()->change();
            $table->string('personil', 255)->nullable()->change();
            $table->string('metodologi', 255)->nullable()->change();
            $table->string('jenis_pekerjaan', 255)->nullable()->change();
            $table->string('kualifikasi', 255)->nullable()->change();
            $table->string('ruang_lingkup', 255)->nullable()->change();
            $table->string('klasifikasi', 255)->nullable()->change();
            $table->string('lembaga', 255)->nullable()->change();
            $table->string('kategori', 255)->nullable()->change();
            $table->string('jadwal_lokasi_fasilitas', 255)->nullable()->change();
            $table->string('deskripsi_harga', 255)->nullable()->change();
        });
    }
};
