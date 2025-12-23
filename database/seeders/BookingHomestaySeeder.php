<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BookingHomestay;
use App\Models\KamarHomestay;
use App\Models\Warga;
use Faker\Factory as Faker;

class BookingHomestaySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Ambil beberapa kamar dan warga yang ada
        $kamarIds = KamarHomestay::pluck('kamar_id')->toArray();
        $wargaIds = Warga::pluck('warga_id')->toArray();

        if (empty($kamarIds) || empty($wargaIds)) {
            $this->command->info('Tidak ada kamar atau warga untuk dibuat booking.');
            return;
        }

        for ($i = 0; $i < 20; $i++) {
            $checkin  = $faker->dateTimeBetween('now', '+30 days');
            $checkout = (clone $checkin)->modify('+'.rand(1,7).' days');

            BookingHomestay::create([
                'kamar_id'    => $faker->randomElement($kamarIds),
                'warga_id'    => $faker->randomElement($wargaIds),
                'checkin'     => $checkin->format('Y-m-d'),
                'checkout'    => $checkout->format('Y-m-d'),
                'total'       => $faker->randomFloat(2, 200000, 2000000),
                'status'      => $faker->randomElement(['pending', 'confirmed', 'cancelled']),
                'metode_bayar'=> $faker->randomElement(['cash', 'transfer', 'e-wallet']),
            ]);
        }
    }
}
