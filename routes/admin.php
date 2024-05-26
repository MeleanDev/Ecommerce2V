<?php

use App\Http\Controllers\admin\CategoriaController;
use App\Http\Controllers\admin\ClienteController;
use App\Http\Controllers\admin\EmpresaController;
use App\Http\Controllers\admin\ProductoController;
use App\Http\Controllers\admin\SuscritoWebController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::prefix('Administracion')->group(function () {

        // Panel Principal
        Route::get('/Panel-Principal', function () {
            return view('dashboard');
        })->name('dashboard');

        // Empresa
        Route::controller(EmpresaController::class)->group(function () {
            Route::get('Empresa', 'index')->name('empresa');
            Route::post('Empresa/Datos', 'datos')->name('empresa.datos');
        });

        // General Venta


        // Clientes
        Route::controller(ClienteController::class)->group(function () {
            Route::get('Clientes', 'index')->name('cliente');
        });

        // SuscritoWeb
        Route::controller(SuscritoWebController::class)->group(function () {
            Route::get('SuscritosWeb', 'index')->name('suscritoWeb');
        });

        // Stock
            // Categorias
            Route::controller(CategoriaController::class)->group(function () {
                Route::get('Categorias', 'index')->name('categoria');
            });

            // Productos
            Route::controller(ProductoController::class)->group(function () {
                Route::get('Productos', 'index')->name('producto');
            });

        // Perfil 
        Route::get('Perfil', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('Perfil', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('Perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});