<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ShipmentController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\AuthController;


Route::middleware('guest')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('login', [AuthController::class, 'create'])->name('login');
        Route::post('login', [AuthController::class, 'store']);
    });

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::post('logout', [AuthController::class, 'destroy'])->name('logout');
    });


Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('dashboard', [ShipmentController::class, 'index'])->name('dashboard');
        
        Route::get('shipments', [ShipmentController::class, 'index'])->name('shipments.index');
        Route::get('shipments/create', [ShipmentController::class, 'create'])->name('shipments.create');
        Route::post('shipments', [ShipmentController::class, 'store'])->name('shipments.store');
        Route::delete('shipments/{shipment}', [ShipmentController::class, 'destroy'])->name('shipments.destroy');

        Route::get('pricing', [PricingController::class, 'index'])->name('pricing.index');
        Route::get('pricing/create', [PricingController::class, 'create'])->name('pricing.create');
        Route::post('pricing/store', [PricingController::class, 'store'])->name('pricing.store');
        Route::get('pricing/{id}/edit', [PricingController::class, 'edit'])->name('pricing.edit');
        Route::put('pricing/{id}/update', [PricingController::class, 'update'])->name('pricing.update');
        Route::delete('pricing/{id}/delete', [PricingController::class, 'destroy'])->name('pricing.destroy');
    });
