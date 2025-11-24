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
        Schema::create('homestay', function (Blueprint $table) {
            $table->id('homestay_id');                                          // Primary Key
            $table->unsignedBigInteger('pemilik_warga_id')->nullable();         // Foreign Key (ke tabel warga, jika ada)
            $table->string('nama', 100);                                        // Nama homestay
            $table->string('alamat', 255)->nullable();                          // Alamat lengkap
            $table->string('rt', 5)->nullable();                                // RT
            $table->string('rw', 5)->nullable();                                // RW
            $table->json('fasilitas_json')->nullable();                         // Fasilitas disimpan dalam format JSON
            $table->decimal('harga_per_malam', 10, 2)->nullable();              // Harga per malam
            $table->enum('status', ['tersedia', 'penuh'])->default('tersedia'); // Status homestay
            $table->timestamps();                                               // created_at & updated_at

            // Jika tabel warga sudah ada:
            $table->foreign('pemilik_warga_id')
                ->references('warga_id')
                ->on('warga')
                ->onDelete('cascade');
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('homestay');
    }
};
