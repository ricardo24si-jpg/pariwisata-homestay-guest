<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamarHomestaySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil daftar homestay_id
        $homestayIds = DB::table('homestay')->pluck('homestay_id')->toArray();

        if (empty($homestayIds)) {
            dd("Seeder GAGAL: Tabel homestay kosong! Tambahkan data homestay terlebih dahulu.");
        }

        $jumlahKamar = 100;

        // Daftar fasilitas yang tersedia
        $listFasilitas = [
            "AC",
            "Wifi",
            "Air Panas",
            "TV",
            "Sarapan",
            "Kamar Mandi Dalam",
        ];

        for ($i = 1; $i <= $jumlahKamar; $i++) {

            // Pilih fasilitas random (2–5 item)
            $fasilitasTerpilih = $faker->randomElements($listFasilitas, rand(2, 5));

            DB::table('kamar_homestay')->insert([
                'homestay_id'    => $faker->randomElement($homestayIds),
                'nama_kamar'     => "Kamar " . strtoupper($faker->randomLetter()),
                'kapasitas'      => $faker->numberBetween(1, 4),
                'fasilitas_json' => json_encode($fasilitasTerpilih, JSON_UNESCAPED_UNICODE),
                'harga'          => $faker->randomElement([150000, 200000, 250000, 300000, 350000]),
            ]);
        }
    }
}
