<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\User;

class LaporanController extends Controller
{
    // Index Page
    public function index(Request $request)
    {
        $data = Laporan::getAll();
        $products = Produk::getall();
        $users = User::getall();

        $role = $request->user()->role;

        $view = 'admin.laporans.list';
        if ($role === 'sales') {
            $view = 'sales.laporans.list';
        }

        return view($view, compact('data', 'products', 'users'));
    }

    // Insert Data
    public function insert(Request $request)
    {
        $data = [
            'id_user'               => $request->id_user,
            'id_produk'             => $request->id_produk,
            'name'                  => $request->name,
            'nama_produk'           => $request->nama_produk,            
            'stok'                  => $request->stok,
        ];

        Produk::insert($data);
        return redirect()->route('laporans')->with('success', 'Data berhasil ditambahkan');
    }

    // Delete Data
    public function delete($id)
    {
        Produk::deleteData($id);
        return redirect()->route('laporans')->with('success', 'Data berhasil dihapus');
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $data = [
            'id_user' => $request->id_user,
            'id_produk' => $request->id_produk,
            'name' => $request->name,
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok,
        ];

        Produk::updateData($id, $data);
        return redirect()->route('laporans')->with('success', 'Data berhasil diupdate');
    }

    // Count Data Produk
    public static function countLaporansData()
    {
        return Laporan::countLaporansData();
    }

    // Ambil Produk berdasarkan Waktu Input Terbaru
    public static function getLatestLaporans()
    {
        return Laporan::getLatestLaporans();
    }
}