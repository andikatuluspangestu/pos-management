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
        $data       = Produk::getAll();
        $categories = Categories::getall();
        $role       = $request->user()->role;

        $view       = 'admin.products.list';
        if ($role === 'sales') {
            $view = 'sales.products.list';
        } else if ($role === 'customer') {
            $data = Produk::where('stok', '>', 0)->get();
            $view = 'customer.product.list';
        }

        return view($view, compact('data', 'categories'));
    }

    // Insert Data
    public function insert(Request $request)
    {
        $data = [
            'category_id'           => $request->category_id,
            'kode_produk'           => $request->kode_produk,
            'nama_produk'           => $request->nama_produk,
            'produk_description'    => $request->produk_description,
            'diskon'                => $request->diskon,
            'harga_jual'            => $request->harga_jual,
            'stok'                  => $request->stok,
        ];

        // Cek apakah ada gambar yang diupload
        if ($request->hasFile('gambar')) {
            
            // Konfigurasi folder upload dan nama file
            $destination = 'uploads';
            $file_name   = date('YmdHis') . '.' . $request->file('gambar')->getClientOriginalExtension();

            // Upload File
            $request->file('gambar')->move($destination, $file_name);

            // Set data untuk insert ke database
            $data['gambar'] = $destination . '/' . $file_name;
        } else {
            $data['gambar'] = 'noimage.png';
        }

        // Jika terdapat kode_produk yang sama, maka kembali ke halaman sebelumnya
        if (Produk::where('kode_produk', $request->kode_produk)->count() > 0) {
            return redirect()->back()->with('message', 'Kode Produk sudah ada');
        } else {
            // Jika tidak ada kode_produk yang sama, maka insert data
            Produk::insert($data);
            return redirect()->route('admin.products')->with('message', 'Data berhasil ditambahkan');
        }

        Produk::insert($data);
        return redirect()->route('admin.products')->with('message', 'Data berhasil ditambahkan');
    }

    // Delete Data
    public function delete($id)
    {
        Produk::deleteData($id);
        // Jika yang menghapus adalah admin
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.products')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('sales.products')->with('success', 'Data berhasil dihapus');
        }
    }

    // Update Data
    public function update(Request $request, $id)
    {
        // Ambil data user yang login
        $user = $request->user();

        $data = [
            'category_id'           => $request->category_id,
            'kode_produk'           => $request->kode_produk,
            'nama_produk'           => $request->nama_produk,
            'gambar'                => Produk::find($id)->gambar,
            'produk_description'    => $request->produk_description,
            'diskon'                => $request->diskon,
            'harga_jual'            => $request->harga_jual,
            'stok'                  => $request->stok,
        ];

        // Jika terdapat kode_produk yang sama, maka kembali ke halaman sebelumnya
        if (Produk::where('kode_produk', $request->kode_produk)->where('id_produk', '!=', $id)->count() > 0) {
            return redirect()->back()->with('message', 'Kode Produk sudah ada');
        } else {
            // Jika terdapat gambar yang diupload, maka gunakan gambar yang diupload
            if ($request->hasFile('gambar')) {
                $data['gambar'] = $request->file('gambar')->storeAs('', basename($request->file('gambar')->getClientOriginalName()));
            }
        }

        Produk::updateData($id, $data);

        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.products')->with('message', 'Data berhasil diupdate');
        } else {
            return redirect()->route('sales.products')->with('message', 'Data berhasil diupdate');
        }
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
