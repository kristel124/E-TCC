<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// ---------------- USER ROUTES ----------------
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::view('/page', 'user.user_page')->name('user_page');
});

// ---------------- SELLER ROUTES ----------------
Route::middleware(['auth', 'role:seller'])->prefix('seller')->name('seller.')->group(function () {
    Route::view('/dashboard', 'seller.seller_dashboard')->name('seller_dashboard');
    });

// ---------------- ADMIN ROUTES ----------------
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::view('/dashboard', 'admin.admin_dashboard')->name('admin_dashboard');
    });