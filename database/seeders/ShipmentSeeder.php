<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shipment;
use App\Models\TransportMode;
use Carbon\Carbon;

class ShipmentSeeder extends Seeder
{
    public function run(): void
    {
        // Önce veritabanındaki modları çekelim (Slug'larına göre)
        $airMode = TransportMode::where('slug', 'air')->first();
        $roadMode = TransportMode::where('slug', 'road')->first();
        $seaMode = TransportMode::where('slug', 'sea')->first();

        // Eğer modlar bulunamazsa hata almamak için ID'leri kontrol ederek atayalım
        $airId = $airMode ? $airMode->id : 1;
        $roadId = $roadMode ? $roadMode->id : 2;
        $seaId = $seaMode ? $seaMode->id : 3;

        $data = [
            // HAVA YOLU ÖRNEKLERİ
            [
                'from_city' => 'Houston, USA',
                'to_city' => 'Ashgabat, TM',
                'shipment_date' => Carbon::now()->addDays(2),
                'transport_mode_id' => $airId,
                'status' => 'upcoming',
                'notes' => 'Air Express - Elektronik eşya sevkiyatı.'
            ],
            [
                'from_city' => 'Istanbul, TR',
                'to_city' => 'London, UK',
                'shipment_date' => Carbon::now()->addDays(4),
                'transport_mode_id' => $airId,
                'status' => 'upcoming',
                'notes' => 'Acil tekstil numuneleri.'
            ],

            // KARA YOLU ÖRNEKLERİ
            [
                'from_city' => 'Berlin, DE',
                'to_city' => 'Baku, AZ',
                'shipment_date' => Carbon::now()->addDays(7),
                'transport_mode_id' => $roadId,
                'status' => 'upcoming',
                'notes' => 'Tır sevkiyatı - Endüstriyel parça.'
            ],
            [
                'from_city' => 'Minsk, BY',
                'to_city' => 'Astana, KZ',
                'shipment_date' => Carbon::now()->addDays(5),
                'transport_mode_id' => $roadId,
                'status' => 'upcoming',
                'notes' => 'Grupaj yükleme.'
            ],

            // DENİZ YOLU ÖRNEKLERİ
            [
                'from_city' => 'Dubai, UAE',
                'to_city' => 'Lagos, NG',
                'shipment_date' => Carbon::now()->addDays(15),
                'transport_mode_id' => $seaId,
                'status' => 'upcoming',
                'notes' => '40ft Konteyner - Otomobil yedek parça.'
            ],
            [
                'from_city' => 'Shanghai, CN',
                'to_city' => 'Istanbul, TR',
                'shipment_date' => Carbon::now()->addDays(30),
                'transport_mode_id' => $seaId,
                'status' => 'upcoming',
                'notes' => 'Hammadde sevkiyatı.'
            ],
        ];

        foreach ($data as $item) {
            Shipment::create($item);
        }
    }
}