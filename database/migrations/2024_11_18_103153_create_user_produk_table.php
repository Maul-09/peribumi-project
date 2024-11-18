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
        Schema::create('user_produk', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id'); // Menggunakan uuid untuk foreign key
            $table->unsignedBigInteger('produk_id'); // Produk tetap menggunakan unsignedBigInteger
            $table->timestamp('tanggal_beli')->nullable();
            $table->timestamp('tanggal_berakhir')->nullable();
            $table->enum('status_transaksi', ['pending', 'confirmed', 'rejected'])->default('pending');
            $table->enum('status_akses', ['nonaktif', 'aktif'])->default('nonaktif');
            $table->timestamps();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_produk');
    }
};
