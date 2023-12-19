<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CategoriesController;
use App\User;

class SalesController extends Controller
{
	// Display Sales Dashboard
    public function index()
    {
        $countProducts          = ProdukController::countProductsData();
        $countCategories        = CategoriesController::countCategoriesData();
        $countSalesData         = UsersController::countSalesData();
        $countCustomersData     = UsersController::countCustomersData();
        //$getLatestProducts    = ProdukController::getLatestProducts();

        $data = [
            'countProducts'      => $countProducts,
            'countCategories'    => $countCategories,
            'countSalesData'     => $countSalesData,
            'countCustomersData' => $countCustomersData,
            //'getLatestProducts'  => $getLatestProducts,
        ];

        return view('sales.index', $data);
    }
}
