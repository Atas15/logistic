<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransportModeController;
use App\Http\Controllers\Client\ShipmentController;
use App\Http\Controllers\Client\PricingController;

Route::name('client.')->group(function () {

    Route::prefix('transport-modes')->name('transport_modes.')->group(function () {
        Route::get('/', [TransportModeController::class, 'index'])->name('index');
        Route::get('/{code}', [TransportModeController::class, 'show'])->name('show');
    });

    Route::get('/shipments', [ShipmentController::class, 'index'])->name('shipments.index');
  
    Route::prefix('pricing')->name('pricing.')->group(function () {
        Route::get('/', [PricingController::class, 'index'])->name('index');
        Route::get('/{slug}', [PricingController::class, 'show'])->name('details');
    });

});