<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use App\Models\TransportMode;
use App\Models\Location;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    // Sevkiyatları listeler
    public function index()
    {
        $shipments = Shipment::with('transportMode')->latest()->get();
        return view('admin.shipments.index', compact('shipments'));
    }

    // Yeni sevkiyat formu
    public function create()
    {
        $transportModes = TransportMode::all();
        $locations = Location::all();
        return view('admin.shipments.create', compact('transportModes', 'locations'));
    }

    // Kayıt işlemi
    public function store(Request $request)
    {
        $validated = $request->validate([
            'transport_mode_id' => 'required|exists:transport_modes,id',
            'from_city' => 'required|string',
            'to_city' => 'required|string',
            'shipment_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        Shipment::create($validated);

        return redirect()->route('admin.shipments.index')->with('success', 'Sevkiyat planı eklendi.');
    }

    // Silme işlemi
    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
        return back()->with('success', 'Sevkiyat takvimden kaldırıldı.');
    }
}