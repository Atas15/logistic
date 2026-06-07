<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransportMode;
use App\Models\Pricing;
use App\Models\Shipment; 

class HomeController extends Controller
{
    public function index()
    {
        $modes = TransportMode::all();
        $pricings = Pricing::all();
        
        // Sevkiyat tarihlerini JS'in kolay okuyacağı formatta hazırlıyoruz
        $shipments = Shipment::all()->map(function($item) {
            return [
                // Takvim günlerini eşleştirmek için: YYYY-A-G formatı (örn: 2026-5-10)
                'date' => \Carbon\Carbon::parse($item->shipment_date)->format('Y-n-j'),
                'title' => $item->from_city . ' -> ' . $item->to_city
            ];
        });
        
        return view('index', compact('modes', 'pricings', 'shipments'));
    }

    public function locale($locale)
    {
        session()->put('locale', $locale == 'ru' ? 'ru' : 'en');

        return redirect()->back();
    }
}