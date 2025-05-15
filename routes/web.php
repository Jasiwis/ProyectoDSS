<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\PerfilController;


// Rutas Públicas 

Route::get('/', function () {
    return view('index');
})->name('home');


//Rutas de Autenticación

Route::middleware('guest')->group(function () {
    // Login
    Route::get('/sesion', [AuthController::class, 'showLoginForm'])->name('sesion');
    Route::post('/sesion', [AuthController::class, 'login'])->name('login');
    
    // Registro
    Route::get('/registro', [AuthController::class, 'showRegistrationForm'])->name('registro');
    Route::post('/registro', [AuthController::class, 'register'])->name('register');
});

 //Rutas Protegidas 

Route::middleware('auth')->group(function () {
    // Páginas principales
    Route::get('/registrado', function () {
        return view('registrado');
    })->name('registrado');
    
    // Perfil de usuario
    Route::get('/perfil', [AuthController::class, 'showProfile'])->name('perfil');
    
    // Notas
    Route::prefix('notas')->group(function () {
        Route::get('/', [NotasController::class, 'index'])->name('notas');
        Route::post('/crud', [NotasController::class, 'crud'])->name('notas.crud');
        Route::get('/get', [NotasController::class, 'getNota'])->name('notas.get');
    });
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::fallback(function () {
    return redirect()->route('home');
});