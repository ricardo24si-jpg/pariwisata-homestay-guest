<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateHomestayDummy extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua warga_id yang sudah ada untuk dijadikan pemilik
        $pemilikIds = DB::table('warga')->pluck('warga_id')->toArray();

        foreach (range(1, 100) as $index) {
            DB::table('homestay')->insert([
                'pemilik_warga_id' => $faker->randomElement($pemilikIds ?: [null]),
                'nama'             => 'Homestay ' . $faker->city,
                'alamat'           => $faker->address,
                'rt'               => $faker->numberBetween(1, 10),
                'rw'               => $faker->numberBetween(1, 10),
                'fasilitas_json'   => json_encode($faker->randomElements([
                    'WiFi', 'AC', 'Televisi', 'Kamar Mandi Dalam',
                    'Parkir', 'Sarapan', 'Kolam Renang', 'Dapur Bersama',
                ], $faker->numberBetween(3, 6))),
                'harga_per_malam'  => $faker->randomFloat(2, 100000, 500000),
                'status'           => $faker->randomElement(['tersedia', 'penuh']),
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}
