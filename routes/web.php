<?php

use App\Livewire\Cart;
use App\Livewire\Home;
use App\Livewire\ProductDetail;
use Illuminate\Support\Facades\Route;

Route::get('/',Home::class)->name('home')->middleware(['role:admin,staff']);
Route::get('/product/{product}',ProductDetail::class)->name('product.detail');
Route::get('/cart',Cart::class)->name('cart');
// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
