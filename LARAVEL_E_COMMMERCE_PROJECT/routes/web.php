<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

/**Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});**/

Route::get('/dashboard', function () {
    if (Auth::check()) {
        $user = Auth::user();
        
        if ($user->user_type === 'user') {
            return redirect()->route('user.user_page');
        } elseif ($user->user_type === 'seller') {
            return redirect()->route('seller.seller_dashboard');
        } elseif ($user->user_type === 'admin') {
            return redirect()->route('admin.admin_dashboard');
        }
        
        
        // Default fallback if no match
        return redirect('/login')->with('error', 'Invalid user type or role.');
    }
    
    // If not logged in, redirect to login
    return redirect('/login');
})->middleware('auth');

// ---------------- USER ROUTES ----------------
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::view('/page', 'user.user_page')->name('user_page');
    // Optional: Add a dashboard route if needed
    // Route::view('/dashboard', 'user.user_dashboard')->name('user_dashboard');
});

// ---------------- SELLER ROUTES ----------------
Route::middleware(['auth', 'role:seller'])->prefix('seller')->name('seller.')->group(function () {
    Route::view('/dashboard', 'seller.seller_dashboard')->name('seller_dashboard');
});

// ---------------- ADMIN ROUTES ----------------
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/dashboard', 'admin.admin_dashboard')->name('admin_dashboard');
});
