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
            $table->text('persyaratan')->change();
            $table->text('highlight_harga')->change();
            $table->text('sasaran')->change();
            $table->text('deskripsi')->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->string('persyaratan', 255)->change();
            $table->string('highlight_harga', 255)->change();
            $table->string('sasaran', 255)->change();
            $table->string('deskripsi', 255)->change();
        });
    }
};
