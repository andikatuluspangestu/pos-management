<?php

use App\Http\Controllers\AuthController;

// Rute untuk menampilkan formulir login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Rute untuk memproses login
Route::post('/login', [AuthController::class, 'login']);

// Rute untuk menampilkan formulir registrasi
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Rute untuk memproses registrasi
Route::post('/register', [AuthController::class, 'register']);

// Rute untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk halaman dashboard (contoh)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth'); // Hanya dapat diakses oleh pengguna yang sudah masuk
