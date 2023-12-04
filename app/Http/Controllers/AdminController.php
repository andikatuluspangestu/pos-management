<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CategoriesController;

class AdminController extends Controller
{
    // Display Admin Dashboard
    public function index()
    {
        // Count Data Produk
        $countProducts = ProdukController::countProductsData();

        // Count Data Kategori
        $countCategories = CategoriesController::countCategoriesData();

        return view('admin.index', compact('countProducts', 'countCategories'));
    }
}
