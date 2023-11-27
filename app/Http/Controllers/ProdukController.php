<?php

namespace App\Http\Controllers;

use App\Tbl_Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Index Page
    public function index()
    {
        $data = Tbl_Produk::getAll();
        return view('admin.products.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Tbl_Produk  $tbl_Produk
     * @return \Illuminate\Http\Response
     */
    public function show(Tbl_Produk $tbl_Produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tbl_Produk  $tbl_Produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Tbl_Produk $tbl_Produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tbl_Produk  $tbl_Produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tbl_Produk $tbl_Produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tbl_Produk  $tbl_Produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tbl_Produk $tbl_Produk)
    {
        //
    }
}
