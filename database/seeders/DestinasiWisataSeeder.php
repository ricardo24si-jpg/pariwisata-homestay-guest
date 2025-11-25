<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinasiWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $now   = Carbon::now();

        for ($i = 0; $i < 100; $i++) {
            DB::table('destinasi_wisata')->insert([
                'nama'       => $faker->company . ' ' . $faker->randomElement(['Park', 'Beach', 'Hill', 'Garden', 'Valley']),
                'deskripsi'  => $faker->paragraph(3),
                'alamat'     => $faker->address,
                'rt'         => str_pad($faker->numberBetween(1, 10), 2, '0', STR_PAD_LEFT),
                'rw'         => str_pad($faker->numberBetween(1, 10), 2, '0', STR_PAD_LEFT),
                'jam_buka'   => $faker->randomElement([
                    '07:00 - 17:00',
                    '08:00 - 18:00',
                    '24 Jam',
                    '06:00 - 16:00',
                ]),
                'tiket'      => $faker->randomElement([5000, 8000, 10000, 15000, 20000, 30000]),
                'kontak'     => $faker->phoneNumber,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
