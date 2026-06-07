<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\TransportMode;
use App\Models\Pricing;
use App\Models\Location;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    /**
     * Taşıma modlarını (Hava, Kara, Deniz) listeler.
     */
    public function index()
    {
        $modes = TransportMode::all();
        return view('client.pricing.index', compact('modes'));
    }

    /**
     * Seçilen taşıma moduna ait fiyatları ve filtrelemeyi gösterir.
     */
    public function show(Request $request, $slug)
    {
        $mode = TransportMode::where('slug', $slug)->firstOrFail();
        $locations = Location::orderBy('name', 'asc')->get();
    
        $query = Pricing::where('transport_mode_id', $mode->id);
    
        // Filtreleme mantığı
        if ($request->filled('from')) {
            $query->where('from_location_id', $request->from);
        }
        
        if ($request->filled('to')) {
            $query->where('to_location_id', $request->to);
        }
    
        $pricings = $query->with(['fromLocation', 'toLocation'])->latest()->get();
    
        return view('client.pricing.details', [
            'mode' => $mode,
            'locations' => $locations,
            'pricings' => $pricings
        ]);
    }
}