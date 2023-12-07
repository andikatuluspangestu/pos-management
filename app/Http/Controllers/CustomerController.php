<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CategoriesController;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countProducts      = ProdukController::countProductsData();
        $countCategories    = CategoriesController::countCategoriesData();
        $countSalesData     = UsersController::countSalesData();
        $countCustomersData = UsersController::countCustomersData();
        // $getLatestProducts  = ProdukController::getLatestProducts();

        $data = [
            'countProducts'      => $countProducts,
            'countCategories'    => $countCategories,
            'countSalesData'     => $countSalesData,
            'countCustomersData' => $countCustomersData,
            // 'getLatestProducts'  => $getLatestProducts,
        ];

        return view('customer.index', $data);
    }

    public function categories()
    {
        $countProducts      = ProdukController::countProductsData();
        $countCategories    = CategoriesController::countCategoriesData();
        $countSalesData     = UsersController::countSalesData();
        $countCustomersData = UsersController::countCustomersData();
        // $getLatestProducts  = ProdukController::getLatestProducts();

        $data = [
            'countProducts'      => $countProducts,
            'countCategories'    => $countCategories,
            'countSalesData'     => $countSalesData,
            'countCustomersData' => $countCustomersData,
            // 'getLatestProducts'  => $getLatestProducts,
        ];

        return view('customer.categories', $data);
    }

    public function products()
    {
        $countProducts      = ProdukController::countProductsData();
        $countCategories    = CategoriesController::countCategoriesData();
        $countSalesData     = UsersController::countSalesData();
        $countCustomersData = UsersController::countCustomersData();
        // $getLatestProducts  = ProdukController::getLatestProducts();

        $data = [
            'countProducts'      => $countProducts,
            'countCategories'    => $countCategories,
            'countSalesData'     => $countSalesData,
            'countCustomersData' => $countCustomersData,
            // 'getLatestProducts'  => $getLatestProducts,
        ];

        return view('customer.products', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.purchase');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
