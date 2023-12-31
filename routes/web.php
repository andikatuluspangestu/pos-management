<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\KeranjangController;
use App\Http\Controllers\Customer\TransaksiController;
use App\Http\Controllers\Customer\CheckoutController;

// Rute untuk halaman utama
Route::view('/', 'home.index');

// Auth Group ( Login, Register, Logout)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Profile
Route::get('/profile', 'AuthController@profile')->name('profile');
Route::post('/profile/update', 'AuthController@profileUpdate')->name('profile.update');

// Middleware Group
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {

    // Admin Dashboard
    Route::get('/admin', 'AdminController@index')->name('admin');

    // Kategori
    Route::get('/admin/categories', 'CategoriesController@index')->name('admin.categories');
    Route::post('/admin/categories/insert', 'CategoriesController@insert')->name('admin.categories.insert');
    Route::get('/admin/categories/delete/{id}', 'CategoriesController@delete')->name('admin.categories.delete');
    Route::put('/admin/categories/update/{id}', 'CategoriesController@update')->name('admin.categories.update');

    // Produk
    Route::get('/admin/products', 'ProdukController@index')->name('admin.products');
    Route::post('/admin/products/insert', 'ProdukController@insert')->name('admin.products.insert');
    Route::get('/admin/products/delete/{id}', 'ProdukController@delete')->name('admin.products.delete');
    Route::put('/admin/products/update/{id}', 'ProdukController@update')->name('admin.products.update');

    // Manage Sales Users
    Route::get('/admin/users/sales', 'UsersController@getSales')->name('sales');
    Route::get('/admin/users/sales/add', 'UsersController@insertSalesForm')->name('sales.insert.add');
    Route::post('/admin/users/sales/insert', 'UsersController@insertSales')->name('sales.insert');
    Route::delete('/admin/users/sales/delete/{id}', 'UsersController@deleteSales')->name('sales.delete');
    Route::put('/admin/users/sales/update/{id}', 'UsersController@updateSales')->name('sales.update');

    // Manage Customer Users
    Route::get('/admin/users/customers', 'UsersController@getCustomers')->name('customers');
    Route::get('/admin/users/customers/add', 'UsersController@insertCustomersForm')->name('customers.insert.add');
    Route::post('/admin/users/customers/insert', 'UsersController@insertCustomers')->name('customers.insert');
    Route::delete('/admin/users/customers/delete/{id}', 'UsersController@deleteCustomers')->name('customers.delete');
    Route::put('/admin/users/customers/update/{id}', 'UsersController@updateCustomers')->name('customers.update');

    // Manage Sellings atau Penjualan
    Route::get('/admin/sellings', 'SellingsController@getAll')->name('sellings');
    Route::get('/admin/laporans', 'LaporanController@index')->name('adminlaporans');

});

// Sales
Route::group(['middleware' => ['auth', 'checkRole:sales']], function () {
    Route::get('/sales', 'SalesController@index');

    // Sales Dashboard
    Route::get('/sales', 'SalesController@index')->name('salesdashboard');;

    // Kategori
    Route::get('/sales/categories', 'CategoriesController@index')->name('salescategories');

    // Manage Sales Users
    Route::get('/sales/users/sales', 'UsersController@getSales')->name('salessales');

    // Manage Customer Users
    Route::get('/sales/users/customers', 'UsersController@getCustomers')->name('salescustomers');

    // Produk
    Route::get('/sales/products', 'ProdukController@index')->name('salesproducts');
    Route::put('/sales/products/update/{id}', 'ProdukController@update')->name('salesproducts.update');

    // Laporan
    Route::get('/sales/laporans', 'LaporanController@index')->name('saleslaporans');
    // Route::post('/sales/laporans/insert', 'LaporanController@insert')->name('saleslaporans.insert');
    Route::get('/sales/laporans/update/{id}', 'LaporanController@update')->name('saleslaporans.update');
    
});

// Customer
Route::group(['middleware' => ['auth', 'checkRole:customer']], function () {
    
    // customer Dashboard
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer');

    // customer purchase
    Route::get('/customer/categories', [CustomerController::class, 'categories'])->name('categories');
    Route::get('/customer/products', [CustomerController::class, 'products'])->name('products');
    Route::post('/customer/products/{id}', [KeranjangController::class, 'create'])->name('addkeranjang');

    // keranjang
    Route::get('/customer/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
    Route::get('/customer/keranjang/{id}', [KeranjangController::class, 'delete'])->name('keranjang.delete');
    Route::post('/customer/keranjang/{id}', [KeranjangController::class, 'update'])->name('keranjang.update');

    // checkout
    Route::post('/customer/keranjang/checkout/{id}', [TransaksiController::class, 'create'])->name('keranjang.checkout');

    // riwayat
    Route::get('/customer/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::get('/customer/transaksi/{id}', [TransaksiController::class, 'delete'])->name('transaksi.delete');
});



