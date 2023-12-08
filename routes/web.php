<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\customer\CartController;

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

    // Manage Sales Users
    Route::get('/admin/users/sales', 'UsersController@getSales')->name('sales');
    Route::get('/admin/users/sales/add', 'UsersController@insertSalesForm')->name('sales.insert.add');
    Route::post('/admin/users/sales/insert', 'UsersController@insertSales')->name('sales.insert');
    Route::get('/admin/users/sales/delete/{id}', 'UsersController@deleteSales')->name('sales.delete');
    Route::put('/admin/users/sales/update/{id}', 'UsersController@updateSales')->name('sales.update');

});

Route::group(['middleware' => 'checkRole:sales'], function () {
    Route::get('/sales', 'SalesController@index');

    // Sales Dashboard
    Route::get('/sales', 'SalesController@index');

    // Kategori
    Route::get('/sales/categories', 'CategoriesController@index')->name('categories');

    // Manage Sales Users
    Route::get('/sales/users/sales', 'UsersController@getSales')->name('sales');

    // Manage Customer Users
    Route::get('/sales/users/customers', 'UsersController@getCustomers')->name('customers');

    // Produk
    Route::get('/sales/products', 'ProdukController@index')->name('products');
    Route::put('/sales/products/update/{id}', 'ProdukController@update')->name('products.update');

    //Penjualan
    Route::get('/sales/penjualans', 'PenjualanController@index')->name('penjualans');
    Route::put('/sales/penjualans/update/{id}', 'PenjualanController@update')->name('penjualans.update');

    //Laporan
    Route::get('/sales/laporans', 'LaporanController@index')->name('laporans');
    Route::put('/sales/laporans/update/{id}', 'LaporanController@update')->name('laporans.update');
    
});

Route::group(['middleware' => 'checkRole:customer'], function () {
    // customer Dashboard
    Route::get('/customer', 'CustomerController@index')->name('customer');

    // customer purchase
    Route::get('/customer/categories', 'CustomerController@categories')->name('categories');
    Route::get('/customer/products', 'CustomerController@products')->name('products');

    // riwayat
    Route::get('/customer/keranjang', 'customer\CartController@index')->name('keranjang');
    Route::get('/customer/transaksi', 'CustomerController@transaksi')->name('transaksi');
});
