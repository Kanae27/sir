<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\PageController;

// Client pages routes
Route::middleware(['web'])->group(function () {
    Route::get('/services', [PageController::class, 'services'])->name('client.services');
    Route::get('/products', [PageController::class, 'products'])->name('client.products');
    Route::get('/about', [PageController::class, 'about'])->name('client.about');
});
