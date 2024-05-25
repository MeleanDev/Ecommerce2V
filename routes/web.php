<?php

use Illuminate\Support\Facades\Route;

// Ecoommerce
    Route::get('/', function () {
        return view('Ecoommerce.home');
    })->name('home');

    Route::get('/About', function () {
        return view('Ecoommerce.about');
    })->name('about');

    Route::get('/Contact', function () {
        return view('Ecoommerce.contact');
    })->name('contact');

    Route::get('/Products', function () {
        return view('Ecoommerce.products');
    })->name('products');

    Route::get('/Products/{product}', function () {
        return view('Ecoommerce.products');
    })->name('products.single');



require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
