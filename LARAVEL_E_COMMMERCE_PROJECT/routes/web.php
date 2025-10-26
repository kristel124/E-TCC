<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;


// HOME 
Route::get('/', function () {
    return view('welcome');
});

//  DASHBOARD REDIRECT 
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
})->middleware('auth')->name('dashboard');

//  USER ROUTES 
Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/user_page', [ProductController::class, 'showProducts'])->name('user_page');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/clear', function () {
        session()->forget('cart');
        return redirect()->route('user.cart.index')->with('success', 'Cart cleared!');
    })->name('cart.clear');

    Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.place');

    Route::get('/orders', [UserController::class, 'orders'])->name('orders');
});

// SELLER ROUTES 
Route::middleware(['auth', 'role:seller'])->prefix('seller')->name('seller.')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('seller_dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});

// ADMIN ROUTES 
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/dashboard', 'admin.admin_dashboard')->name('admin_dashboard');

});



