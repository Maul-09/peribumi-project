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
        Schema::create('isi_silabuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('silabus_id')->constrained('silabuses')->onDelete('cascade');
            $table->text('judul_isi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isi_silabuses');
    }
};
