<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use App\Models\TransportMode;

class ShipmentController extends Controller
{
    // Müşterinin gördüğü ana sayfa (Sekmeli yapı)
    public function index()
    {
        // Taşıma modlarını sevkiyatlarıyla birlikte çekiyoruz (Eager Loading)
        $modes = TransportMode::with(['shipments' => function($query) {
            $query->where('shipment_date', '>=', now()) // Geçmiş sevkiyatları gösterme
                  ->orderBy('shipment_date', 'asc');
        }])->get();

        return view('client.shipments.index', compact('modes'));
    }

    // Tek bir sevkiyatın detaylarını görmek isterse
    public function show(Shipment $shipment)
    {
        return view('client.shipments.show', compact('shipment'));
    }
}
