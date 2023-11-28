<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbl_Produk;

class ProdukController extends Controller
{
    // Index Page
    public function index()
    {
        $data = Tbl_Produk::getAll();
        return view('admin.products.list', compact('data'));
    }

    // Insert Data
    public function insert(Request $request)
    {
        $data = [
            'nama_produk' => $request->nama_produk,
            'produk_description' => $request->produk_description,
        ];

        Tbl_Produk::insert($data);
        return redirect()->route('products')->with('success', 'Data berhasil ditambahkan');
    }

    // Delete Data
    public function delete($id)
    {
        Tbl_Produk::deleteData($id);
        return redirect()->route('products')->with('success', 'Data berhasil dihapus');
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $data = [
            'nama_produk' => $request->nama_produk,
            'produk_description' => $request->produk_description,
        ];

        Tbl_Produk::updateData($id, $data);
        return redirect()->route('products')->with('success', 'Data berhasil diupdate');
    }
}
