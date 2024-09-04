<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductReviewController;
use Illuminate\Support\Facades\Route;

// Authentication routes (handled by Laravel Breeze)
require __DIR__.'/auth.php';

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Public routes
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::post('/cart', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::post('/products/{product}/reviews', [ProductReviewController::class, 'store'])->name('reviews.store');

// Admin routes for product management (protected by auth middleware)
Route::middleware(['auth'])->group(function () {
    Route::resource('admin/products', ProductController::class)->except(['show']);
    Route::get('/admin/products/{product}', [ProductController::class, 'show'])->name('admin.products.show');
    
    // Admin routes for orders
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
});
