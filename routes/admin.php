<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::prefix('Administracion')->group(function () {

        // Panel Principal
        Route::get('/Panel-Principal', function () {
            return view('dashboard');
        })->name('dashboard');

        // Perfil 
        Route::get('Perfil', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('Perfil', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('Perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});