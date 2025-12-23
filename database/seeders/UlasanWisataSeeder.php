<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UlasanWisata;
use App\Models\DestinasiWisata;
use App\Models\Warga;
use Faker\Factory as Faker;

class UlasanWisataSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $destinasiIds = DestinasiWisata::pluck('destinasi_id')->toArray();
        $wargaIds     = Warga::pluck('warga_id')->toArray();

        if (empty($destinasiIds) || empty($wargaIds)) {
            $this->command->info('Tidak ada destinasi atau warga untuk dibuat ulasan.');
            return;
        }

        for ($i = 0; $i < 30; $i++) {
            UlasanWisata::create([
                'destinasi_id' => $faker->randomElement($destinasiIds),
                'warga_id'     => $faker->randomElement($wargaIds),
                'rating'       => $faker->numberBetween(1,5),
                'komentar'     => $faker->sentence(10),
                'waktu'        => $faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
