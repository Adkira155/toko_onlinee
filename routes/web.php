<?php

use Illuminate\Support\Facades\Route;

Route::get('/', action: \App\Livewire\Home::class)->name('home');
Route::get('/produk', action: \App\Livewire\Products::class)->name('produk');
