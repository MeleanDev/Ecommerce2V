<?php

use App\Http\Controllers\admin\CategoriaController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\EditEcommerceWebController;
use App\Http\Controllers\admin\EmpresaController;
use App\Http\Controllers\admin\ProductoController;
use App\Http\Controllers\admin\SuscritoWebController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::prefix('Administracion')->group(function () {

        // Panel Principal
        Route::get('Panel-Principal', [DashboardController::class, 'index'])->name('dashboard');

        // Empresa
        Route::controller(EmpresaController::class)->group(function () {
            Route::get('Empresa', 'index')->name('empresa');
            Route::post('Empresa/Datos', 'datos')->name('empresa.datos');
        });

        // SuscritoWeb
        Route::controller(SuscritoWebController::class)->group(function () {
            Route::get('SuscritosWeb', 'index')->name('suscritoWeb');
            Route::get('SuscritosWeb/Lista', 'lista')->name('suscritoWeb.lista');
            Route::post('SuscritosWeb/Eliminar', 'eliminar')->name('suscritoWeb.eliminar');
        });

        // Stock
        Route::prefix('Stock')->group(function () {
            // Categorias
            Route::controller(CategoriaController::class)->group(function () {
                Route::get('Categorias', 'index')->name('categoria');
                Route::get('Categorias/Lista', 'lista')->name('categoria.lista');
                Route::post('Categorias', 'crear')->name('categoria.crear');
                Route::get('Categorias/Datos/{id?}', 'datoCategoria')->name('categoria.datoCategoria');
                Route::post('Categorias/Editar/{id?}', 'editar')->name('categoria.editar');
                Route::delete('Categorias/{id?}', 'eliminar')->name('categoria.eliminar');
            });

            // Productos
            Route::controller(ProductoController::class)->group(function () {
                Route::get('Productos', 'index')->name('producto');
                Route::get('Productos/Lista', 'lista')->name('producto.lista');
                Route::post('Productos', 'crear')->name('producto.crear');
                Route::get('Productos/Datos/{id?}', 'datoProducto')->name('producto.datoProducto');
                Route::post('Productos/Editar/{id?}', 'editar')->name('producto.editar');
                Route::delete('Productos/{id?}', 'eliminar')->name('producto.eliminar');
            });
        });

        // EcommerceWebEdit
        Route::prefix('EcommerceWeb')->group(function () {
            // Inicio
            Route::controller(EditEcommerceWebController::class)->group(function () {
                Route::get('Inicio', 'inicio')->name('editInicio');
                Route::post('Inicio', 'inicioEdit')->name('editInicio.editar');
            });

            // banners
            Route::controller(EditEcommerceWebController::class)->group(function () {
                Route::get('Banners', 'banner')->name('editBanner');
                Route::post('Banners', 'bannerfoto')->name('editBanner.editar');
            });

            // Quienes Somos
            Route::controller(EditEcommerceWebController::class)->group(function () {
                Route::get('Quienes-Somos', 'quienesSomos')->name('editSomos');
                Route::post('Quienes-Somos', 'quienesSomosEdit')->name('editSomos.editar');
            });
        });

        // Perfil 
        Route::get('Perfil', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('Perfil', [ProfileController::class, 'update'])->name('profile.update');
        // Route::delete('Perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});