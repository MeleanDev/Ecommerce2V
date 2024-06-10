<?php

use App\Http\Controllers\EcommerceWebController;
use Illuminate\Support\Facades\Route;

// Ecoommerce
    Route::controller(EcommerceWebController::class)->group(function () {
        Route::get('/', 'inicio')->name('inicio');
        Route::get('Quienes-Somos', 'quienesSomos')->name('quienesSomos');
        Route::get('Contacto', 'contacto')->name('contacto');
        Route::get('Categorias', 'categorias')->name('categorias');
        Route::get('Categorias/{categoria}', 'categoriasProductos')->name('categorias.productos');
        Route::get('Categorias/{categoria}/{producto}', 'productos')->name('productoPublic');
        Route::post('suscripcion', 'SuscripcionWeb')->name('suscripcion');
    });

require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
