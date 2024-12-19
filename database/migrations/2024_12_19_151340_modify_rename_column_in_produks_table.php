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
            $table->renameColumn('deskripsi_harga', 'highlight');
            $table->renameColumn('highlight_harga', 'harga');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->renameColumn('highlight', 'deskripsi_harga');
            $table->renameColumn('harga', 'highlight_harga');
        });
    }
};
