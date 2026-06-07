<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pricing;
use App\Models\TransportMode;
use App\Models\Location;

class PricingSeeder extends Seeder
{
    public function run()
    {
        // 1. Taşıma Modlarını Çekelim
        $airMode = TransportMode::where('slug', 'air')->first();
        $roadMode = TransportMode::where('slug', 'road')->first();
        $seaMode = TransportMode::where('slug', 'sea')->first();

        // 2. Lokasyonları Çekelim (Daha önce eklediğin isimlere göre)
        $istanbul = Location::where('name', 'Istanbul')->first();
        $london = Location::where('name', 'London')->first();
        $houston = Location::where('name', 'Houston')->first();
        $ashgabat = Location::where('name', 'Ashgabat')->first();
        $dubai = Location::where('name', 'Dubai')->first();

        // Örnek Veri Seti
        $samples = [
            // HAVA YOLU FİYATLARI
            [
                'transport_mode_id' => $airMode->id ?? 1,
                'from_location_id' => $houston->id ?? 1,
                'to_location_id' => $ashgabat->id ?? 2,
                'price' => 12.50, // KG başı fiyat gibi düşünebilirsin
                'currency' => 'USD',
                'estimated_time' => '3-5 Gün',
            ],
            [
                'transport_mode_id' => $airMode->id ?? 1,
                'from_location_id' => $istanbul->id ?? 3,
                'to_location_id' => $london->id ?? 4,
                'price' => 8.00,
                'currency' => 'EUR',
                'estimated_time' => '1-2 Gün',
            ],

            // KARA YOLU FİYATLARI
            [
                'transport_mode_id' => $roadMode->id ?? 2,
                'from_location_id' => $istanbul->id ?? 3,
                'to_location_id' => $ashgabat->id ?? 2,
                'price' => 3500.00, // Komple tır fiyatı gibi
                'currency' => 'USD',
                'estimated_time' => '12-15 Gün',
            ],
            [
                'transport_mode_id' => $roadMode->id ?? 2,
                'from_location_id' => $dubai->id ?? 5,
                'to_location_id' => $ashgabat->id ?? 2,
                'price' => 2200.00,
                'currency' => 'USD',
                'estimated_time' => '5-7 Gün',
            ],

            // DENİZ YOLU FİYATLARI
            [
                'transport_mode_id' => $seaMode->id ?? 3,
                'from_location_id' => $houston->id ?? 1,
                'to_location_id' => $istanbul->id ?? 3,
                'price' => 4500.00, // Konteyner fiyatı
                'currency' => 'USD',
                'estimated_time' => '25-35 Gün',
            ],
            [
                'transport_mode_id' => $seaMode->id ?? 3,
                'from_location_id' => $dubai->id ?? 5,
                'to_location_id' => $london->id ?? 4,
                'price' => 3800.00,
                'currency' => 'USD',
                'estimated_time' => '20-30 Gün',
            ],
        ];

        foreach ($samples as $sample) {
            Pricing::create($sample);
        }
    }
}