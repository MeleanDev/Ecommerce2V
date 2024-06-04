<?php

use Illuminate\Support\Facades\Route;

// Ecoommerce
    Route::get('/', function () {
        return view('Ecoommerce.inicio');
    })->name('inicio');

    Route::get('Quienes-Somos', function () {
        return view('Ecoommerce.quienesSomos');
    })->name('quienesSomos');

    Route::get('Contacto', function () {
        return view('Ecoommerce.contacto');
    })->name('contacto');

    Route::get('Categorias', function () {
        return view('Ecoommerce.categoria');
    })->name('categorias');

    Route::get('Productos', function () {
        return view('Ecoommerce.productos');
    })->name('productos');



require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
