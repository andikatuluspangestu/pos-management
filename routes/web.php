<?php

use App\Http\Controllers\AuthController;

// Rute untuk halaman utama
Route::view('/', 'home.index');

// Auth Group ( Login, Register, Logout)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware Group
Route::group(['middleware' => 'checkRole:admin'], function () {

    // Admin Dashboard
    Route::get('/admin', 'AdminController@index')->name('admin');

    // Kategori
    Route::get('/admin/categories', 'CategoriesController@index')->name('categories');
    Route::post('/admin/categories/insert', 'CategoriesController@insert')->name('categories.insert');
    Route::get('/admin/categories/delete/{id}', 'CategoriesController@delete')->name('categories.delete');
    Route::put('/admin/categories/update/{id}', 'CategoriesController@update')->name('categories.update');

    // Produk
    Route::get('/admin/products', 'ProdukController@index')->name('products');
    Route::post('/admin/products/insert', 'ProdukController@insert')->name('products.insert');
    Route::get('/admin/products/delete/{id}', 'ProdukController@delete')->name('products.delete');
    Route::put('/admin/products/update/{id}', 'ProdukController@update')->name('products.update');

});

Route::group(['middleware' => 'checkRole:sales'], function () {
    Route::get('/sales', 'SalesController@index');
});

Route::group(['middleware' => 'checkRole:customer'], function () {
    Route::get('/customer', 'CustomerController@index');
});
