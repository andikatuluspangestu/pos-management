<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Categories;

class ProdukController extends Controller
{
    // Index Page
    public function index()
    {
        $data = Produk::getAll();
        $categories = Categories::getall();
        return view('admin.products.list', compact('data', 'categories'));
    }

    // Insert Data
    public function insert(Request $request)
    {
        $data = [
            'nama_produk' => $request->nama_produk,
            'produk_description' => $request->produk_description,
        ];

        Produk::insert($data);
        return redirect()->route('products')->with('success', 'Data berhasil ditambahkan');
    }

    // Delete Data
    public function delete($id)
    {
        Produk::deleteData($id);
        return redirect()->route('products')->with('success', 'Data berhasil dihapus');
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $data = [
            'nama_produk' => $request->nama_produk,
            'produk_description' => $request->produk_description,
        ];

        Produk::updateData($id, $data);
        return redirect()->route('products')->with('success', 'Data berhasil diupdate');
    }
}
