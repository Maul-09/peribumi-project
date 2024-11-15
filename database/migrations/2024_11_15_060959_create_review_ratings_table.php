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
        Schema::create('review_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('booking_id'); // Sesuaikan dengan ID produk atau entitas lain
            $table->longText('comments')->nullable();
            $table->integer('star_rating');
            $table->string('user_id'); // Menambahkan kolom user_id
            $table->enum('status', ['active', 'deactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_ratings');
    }
};
