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
        Schema::create('ulasan_wisata', function (Blueprint $table) {
            $table->id('ulasan_id');
            $table->unsignedBigInteger('destinasi_id');
            $table->unsignedBigInteger('warga_id');
            $table->unsignedTinyInteger('rating');
            $table->text('komentar');
            $table->dateTime('waktu');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan_wisata');
    }
};
