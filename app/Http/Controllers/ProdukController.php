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
            'category_id'           => $request->category_id,
            'kode_produk'           => $request->kode_produk,
            'nama_produk'           => $request->nama_produk,
            'gambar'                => $request->gambar,
            'produk_description'    => $request->produk_description,
            'diskon'                => $request->diskon,
            'harga_jual'            => $request->harga_jual,
            'stok'                  => $request->stok,
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

    // Count Data Produk
    public static function countProductsData()
    {
        return Produk::countProductsData();
    }

    // Ambil Produk berdasarkan Waktu Input Terbaru
    public static function getLatestProducts()
    {
        return Produk::getLatestProducts();
    }
}
