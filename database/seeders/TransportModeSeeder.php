<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransportMode;

class TransportModeSeeder extends Seeder
{
    public function run(): void
    {
        $modes = [
            [
                'title' => 'Air Freight',
                'slug'  => 'air-freight', // Blade'deki route parametresiyle aynı olmalı
                'code'  => 'air',
                'description' => 'Hızlı ve güvenilir hava taşımacılığı çözümleri.',
            ],
            [
                'title' => 'Sea Freight',
                'slug'  => 'sea-freight',
                'code'  => 'sea',
                'description' => 'Dünya çapında ekonomik deniz yolu nakliyesi.',
            ],
            [
                'title' => 'Land Freight',
                'slug'  => 'road-freight', // Blade'de 'road-freight' yazdıysan burayı da öyle yap
                'code'  => 'land',
                'description' => 'Esnek ve kapıdan kapıya kara yolu taşımacılığı.',
            ],
        ];
    
        foreach ($modes as $mode) {
            TransportMode::updateOrCreate(['code' => $mode['code']], $mode);
        }
    }
}
