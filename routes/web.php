<?php

use App\Livewire\Home;
use App\Livewire\ProductDetail;
use Illuminate\Support\Facades\Route;

Route::get('/',Home::class)->name('home');
Route::get('/product/{product}',ProductDetail::class)->name('product.detail');
// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
