<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CategoriesController;
use App\User;

class SalesController extends Controller
{
    // Menampilkan Data Sales
    public function index()
    {
        $sales = User::getAllSales();
        return view('admin.users.sales.list', compact('sales'));
    }
}
