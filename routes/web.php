<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/product/{id}', function ($id) {
    return view('pages.product-description', ['id' => $id]);
})->name('product-description');

Route::middleware(['auth', 'verified'])->group(function(){
    
    Route::get('/cart', function () {
        return view('pages.cart');
    })->name('cart');
    Route::get('/my-purchases', function () {
        return view('pages.my-purchases');
    })->name('my-purchases');
    Route::get('/chat', function () {
        return view('pages.chat ');
    })->name('chat');
    Route::get('/my-profile', function () {
        return view('pages.profile', ['user' => Auth::user()]);
    })->name('client-profile');
    Route::get('/change-password', function () {
        return view('pages.password ');
    })->name('change-password');
});

Route::get('/dashboard', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $userType = Auth::user()->user_type ?? '';
    
    switch ($userType) {
        case 'admin':
            return redirect()->route('admin.dashboard');
        case 'client':
            return redirect()->route('welcome');
        default:
            return redirect()->route('welcome');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('administrator')->group( function() {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/category', function () {
        return view('admin.category');
    })->name('admin.category');
    Route::get('/product', function () {
        return view('admin.product');
    })->name('admin.product');
    Route::get('/create/product', function () {
        return view('admin.product-create');
    })->name('admin.product-create');
    Route::get('/orders', function () {
        return view('admin.orders');
    })->name('admin.orders');
    Route::get('/chat', function () {
        return view('admin.chat');
    })->name('admin.chat');
    Route::get('/report', function () {
        return view('admin.report');
    })->name('admin.report');
    Route::get('/onsite', function () {
        return view('admin.onsite');
    })->name('admin.onsite');
    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');
    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('admin.profile');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
