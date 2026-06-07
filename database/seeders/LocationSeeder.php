<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    
    public function run(): void
    {
        $locations = [
            'Germany',
            'France',
            'Netherlands',
            'Italy',
            'Spain',
            'United Kingdom',
            'Belgium',
            'Switzerland',
            'Austria',
            'Poland',
            'Turkey',
            'Sweden',
            'Norway'
        ];
        foreach ($locations as $location) {
            Location::create(['name' => $location]);
        }
    }
}
