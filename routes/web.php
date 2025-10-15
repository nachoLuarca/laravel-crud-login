<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


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
// 👇 Ruta para cerrar sesión (logout)
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    
});

// 👇 Rutas de autenticación: login, register, logout
require __DIR__.'/auth.php';
