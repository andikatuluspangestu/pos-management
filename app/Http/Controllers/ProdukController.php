<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Categories;

class ProdukController extends Controller
{
    // Index Page
    public function index(Request $request)
    {
        $data = Produk::getAll();
        $categories = Categories::getall();

        $role = $request->user()->role;

        $view = 'admin.products.list';
        if ($role === 'sales') {
            $view = 'sales.products.list';
        }

        return view($view, compact('data', 'categories'));
    }

    /*public function indexSales()
    {
        $data = Produk::getAll();
        $categories = Categories::getall();
        return view('sales.products.list', compact('data', 'categories'));
    }*/

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

    // Count Data Produk
    public static function countProductsData()
    {
        return Produk::countProductsData();
    }
}
