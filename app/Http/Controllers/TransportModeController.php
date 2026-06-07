<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransportMode;

class TransportModeController extends Controller
{
    public function index()
    {
        $modes = TransportMode::all();
        return view('client.transport.modes', ['modes' => $modes]);
    }

    public function show($code)
    {
        // Veritabanında o koda (air, sea, land) sahip modu bul
        $mode = TransportMode::where('code', $code)->firstOrFail();
        
        // Şimdilik aynı sayfaya veya yeni bir detay sayfasına gönderebiliriz
        return view('client.transport.details', compact('mode'));
    }

    // Kaydet veya Güncelle (Ayda bir giriş yapacak admin için en pratik yol)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|unique:transport_modes,code,' . $request->id,
            'description' => 'nullable|string'
        ]);

        TransportMode::updateOrCreate(
            ['id' => $request->id],
            [
                'title' => $request->title,
                'code' => $request->code,
                'description' => $request->description,
            ]
        );

        return redirect()->back()->with('success', 'Mod başarıyla kaydedildi.');
    }

    public function destroy($id)
    {
        TransportMode::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Silindi.');
    }
}
