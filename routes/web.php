<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Ana Sayfa Rotası (Tek bir yerde kalması yeterli)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dil Değiştirme Rotası (Grup dışına aldık, daha güvenli)
Route::get('locale/{locale}', [HomeController::class, 'locale'])
    ->name('locale')
    ->where('locale', 'en|ru|tk|tr|fa|ar'); 

require __DIR__ . '/client.php';
require __DIR__ . '/admin.php';