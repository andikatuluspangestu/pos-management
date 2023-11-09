<?php

use App\Http\Controllers\AuthController;

// Rute untuk halaman utama
Route::view('/', 'home.index');

// Rute untuk formulir login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rute untuk formulir registrasi
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Rute untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Grup rute berdasarkan peran
Route::group(['middleware' => 'checkRole:admin'], function () {
    Route::get('/admin', 'AdminController@index');
});

Route::group(['middleware' => 'checkRole:sales'], function () {
    Route::get('/sales', 'SalesController@index');
});

Route::group(['middleware' => 'checkRole:customer'], function () {
    Route::get('/customer', 'CustomerController@index');
});
