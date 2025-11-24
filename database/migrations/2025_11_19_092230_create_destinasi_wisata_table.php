<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('destinasi_wisata', function (Blueprint $table) {
            $table->id('destinasi_id');                  // Primary Key
            $table->string('nama', 100);                 // Nama destinasi
            $table->text('deskripsi')->nullable();       // Deskripsi wisata
            $table->string('alamat', 255)->nullable();   // Alamat lengkap
            $table->string('rt', 5)->nullable();         // RT
            $table->string('rw', 5)->nullable();         // RW
            $table->string('jam_buka', 50)->nullable();  // Jam buka
            $table->decimal('tiket', 10, 2)->nullable(); // Harga tiket
            $table->string('kontak', 50)->nullable();    // Nomor kontak
            $table->timestamps();                        // created_at & updated_at
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinasi_wisata');
    }
};
