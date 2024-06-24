<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\ProfileController;


Route::get('/', [LibroController::class, 'index'])->name('home');


Route::get('libros', [LibroController::class, 'index'])->name('libros.index');


Route::middleware(['auth'])->group(function () {
    Route::resource('prestamos', PrestamoController::class)->except(['edit', 'update', 'destroy']); // Excluir las rutas de edición, actualización y eliminación

    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
