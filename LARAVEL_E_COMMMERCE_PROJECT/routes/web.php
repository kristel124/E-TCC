<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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
    if (!Auth::check()) {
        return redirect('/login');
    }

    $user = Auth::user();

    switch ($user->user_type) {
        case 'admin':
            return redirect()->route('admin.admin_dashboard');
        case 'seller':
            return redirect()->route('seller.seller_dashboard');
        case 'user':
            return redirect()->route('user.user_page');
        default:
            return redirect('/login')->with('error', 'Invalid user type.');
    }
})->middleware('auth')->name('dashboard'); // ✅ THIS LINE is critical


// ---------------- USER ROUTES ----------------
Route::middleware(['auth'])->group(function () {
    Route::get('/user_page', function () {
        $user = Auth::user();
        return view('user.user_page', compact('user'));
    })->name('user.user_page');
});

// ---------------- SELLER ROUTES ----------------
Route::middleware(['auth', 'role:seller'])->prefix('seller')->name('seller.')->group(function () {
    Route::view('/dashboard', 'seller.dashboard')->name('seller_dashboard');
    // Category Routes (CRUD)
    Route::resource('categories', CategoryController::class);

    // Product Routes (CRUD)
    Route::resource('products', ProductController::class);
});

// ---------------- ADMIN ROUTES ----------------
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
   // Route::view('/dashboard', 'admin.admin_dashboard')->name('admin_dashboard');
   Route::view('/dashboard', 'seller.dashboard')->name('seller_dashboard');
});
