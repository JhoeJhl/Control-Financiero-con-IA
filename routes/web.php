<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// 1. Página de Bienvenida (Pública)
Route::get('/', function () {
    return view('welcome');
});

// 2. Rutas Protegidas (Solo para usuarios logueados y verificados)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard Principal: Usa tu controlador personalizado para ver los saldos
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD de Transacciones: Cubre index, create, store, edit, update, destroy
    Route::resource('transactions', TransactionController::class);

    // Rutas de Perfil (Generadas por Breeze, útiles para que el usuario cambie su clave)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Ruta para Configuraciones/Categorías (Opcional)
    Route::get('/settings', function () {
        return view('settings.index');
    })->name('settings.index');
});

// 3. Importar las rutas de autenticación de Breeze (Login, Register, Logout, etc.)
// Esto evita que tengas que declarar 'Route::get("/register", ...)' manualmente.
require __DIR__.'/auth.php';

