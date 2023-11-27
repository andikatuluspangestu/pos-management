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
        $produks = Tbl_Produk::all();
        return view('admin.products.list', [
            'produks' => $produks
        ]);
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

    // Insert Data
    public function insert(Request $request)
    {
        $data = [
            'category_id' => $request->category_id,
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'product_description' => $request->product_description,
        ];

        Categories::insert($data);
        return redirect()->route('products')->with('success', 'Data berhasil ditambahkan');
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
