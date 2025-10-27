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
    Route::get('/profile', [ProductController::class, 'profile'])->name('profile');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

    Route::post('/checkout/shipping', [CheckoutController::class, 'shipping'])->name('checkout.shipping');
    Route::post('/checkout/summary', [CheckoutController::class, 'Summary'])->name('checkout.summary');
    Route::post('/checkout/confirm', [CheckoutController::class, 'confirm'])->name('checkout.confirm');

});

// SELLER ROUTES 
Route::middleware(['auth', 'role:seller'])->prefix('seller')->name('seller.')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('seller_dashboard');
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});

// ADMIN ROUTES 
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/dashboard', 'admin.admin_dashboard')->name('admin_dashboard');
});

Route::get('/product/{id}', [ProductController::class, 'show'])->name('user.product.show');
Route::post('/cart', [CartController::class, 'store'])->name('user.cart.store');



