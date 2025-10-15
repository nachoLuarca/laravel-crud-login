<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;


// 👇 Redirige la página principal al listado de productos
Route::get('/', function () {
    return redirect()->route('products.index');
});

// 👇 Rutas protegidas: solo usuarios logueados pueden acceder
Route::middleware('auth')->group(function () {
    // CRUD de productos
    Route::resource('products', ProductController::class);

    // Perfil del usuario (opcional)
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 👇 Rutas de autenticación: login, register, logout
require __DIR__.'/auth.php';
