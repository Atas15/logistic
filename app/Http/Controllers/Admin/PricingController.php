<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use App\Models\TransportMode;
use App\Models\Location;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    // Listeleme (Opsiyonel: Admin paneli için tablo görünümü)
    public function index()
    {
        $pricings = Pricing::with(['transportMode', 'fromLocation', 'toLocation'])->latest()->get();
        return view('admin.pricing.index', compact('pricings'));
    }

    // Yeni rota ekleme sayfası
    public function create()
    {
        $modes = TransportMode::all();
        $locations = Location::all();
        return view('admin.pricing.create', compact('modes', 'locations'));
    }
    
    // Veritabanına kaydetme
    public function store(Request $request)
    {
        $validated = $request->validate([
            'transport_mode_id' => 'required|exists:transport_modes,id',
            'from_location_id' => 'required|exists:locations,id',
            'to_location_id' => 'required|exists:locations,id',
            'price' => 'required|numeric',
            'currency' => 'required|string|max:3',
            'estimated_time' => 'nullable|string'
        ]);
    
        Pricing::create($validated);
    
        return redirect()->route('admin.pricing.index')->with('success', 'Rota başarıyla eklendi!');
    }
    
    // Düzenleme sayfası
    public function edit($id)
    {
        $pricing = Pricing::findOrFail($id);
        $modes = TransportMode::all();
        $locations = Location::all();
        return view('admin.pricing.edit', compact('pricing', 'modes', 'locations'));
    }
    
    // Güncelleme işlemi
    public function update(Request $request, $id)
    {
        $pricing = Pricing::findOrFail($id);
        
        $validated = $request->validate([
            'transport_mode_id' => 'required|exists:transport_modes,id',
            'from_location_id' => 'required|exists:locations,id',
            'to_location_id' => 'required|exists:locations,id',
            'price' => 'required|numeric',
            'currency' => 'required|string|max:3',
            'estimated_time' => 'nullable|string'
        ]);
    
        $pricing->update($validated);
    
        return redirect()->route('admin.pricing.index')->with('success', 'Rota güncellendi!');
    }
    
    // Silme işlemi
    public function destroy($id)
    {
        Pricing::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Rota silindi!');
    }
}