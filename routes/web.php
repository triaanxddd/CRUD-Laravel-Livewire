<?php

use App\Livewire\PostProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){

    return view('welcome');
})->name('name');

Route::get('/products', function () {
    return view('products.index');
})->name('products');
