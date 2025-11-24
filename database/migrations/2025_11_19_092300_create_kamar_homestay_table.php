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
        Schema::create('kamar_homestay', function (Blueprint $table) {
            $table->id('kamar_id');                      // Primary Key
            $table->unsignedBigInteger('homestay_id');   // Foreign Key ke tabel homestay
            $table->string('nama_kamar', 100);           // Nama kamar
            $table->integer('kapasitas')->default(1);    // Jumlah orang maksimal
            $table->json('fasilitas_json')->nullable();  // Daftar fasilitas (JSON)
            $table->decimal('harga', 10, 2)->nullable(); // Harga kamar per malam
            $table->timestamps();                        // created_at & updated_at

            // Relasi ke tabel homestay
            $table->foreign('homestay_id')
                ->references('homestay_id')
                ->on('homestay')
                ->onDelete('cascade');
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar_homestay');
    }
};
