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
        Schema::table('user_produk', function (Blueprint $table) {
            $table->date('tanggal_mulai')->nullable()->after('produk_id'); // Menambahkan kolom tanggal_mulai
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_produk', function (Blueprint $table) {
            $table->dropColumn('tanggal_mulai');
        });
    }
};
