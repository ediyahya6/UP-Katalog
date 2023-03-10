<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UnitProduksiController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// ----------- Tanpa Login untuk User
Route::controller(WelcomeController::class)->group(function () {

    Route::get('/', 'index');
    Route::get('produk-detail/{id}', 'detail');
});

// ----------- Login Admin
Route::middleware(['auth'])->group(function () {

    /// Route Home
    Route::controller(HomeController::class)->group(function () {

        Route::get('/home', 'index');
    });

    /// Route Data Unit Produksi
    Route::controller(UnitProduksiController::class)->group(function () {

        Route::get('unitproduksi', 'index');
        Route::get('unitproduksi/create', 'create');
        Route::post('unitproduksi', 'store');
        Route::get('unitproduksi/edit/{id}', 'edit');
        Route::put('unitproduksi/{id}', 'update');
        Route::delete('unitproduksi/delete/{id}', 'destroy');
    });

    /// Route Data Produk
    Route::controller(ProdukController::class)->group(function () {

        Route::get('produk', 'index');
        Route::get('produk/detail/{id}', 'detail');
        Route::get('produk/create', 'create');
        Route::post('produk', 'store');
        Route::get('produk/edit/{id}', 'edit');
        Route::put('produk/{id}', 'update');
        Route::delete('produk/delete/{id}', 'destroy');
    });
});

Auth::routes([
    'verify' => false,
    'reset' => false
]);