<?php

use App\Http\Controllers\AuthController;

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Registro
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/forgot-password', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/forgot-password', [AuthController::class, 'updatePassword'])->name('password.update');

Route::get('/dashboard', function() {
    return "Bienvenido al sistema";
})->middleware('auth')->name('dashboard');
