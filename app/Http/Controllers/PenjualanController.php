<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\User;

class PenjualanController extends Controller
{
    // Index Page
    public function index(Request $request)
    {
        $data       = Penjualan::getAll();
        $users      = User::getall();

        $role       = $request->user()->role;

        $view       = 'admin.penjualans.list';
        if ($role === 'sales') {
            $view = 'sales.penjualans.list';
        }

        return view($view, compact('data', 'users'));
    }

    // Insert Data
    public function insert(Request $request)
    {
        $data = [
            'id_penjualan'          => $request->id_penjualan,
            'id_user'               => $request->id_user,
            'total_item'            => $request->total_item,
            'total_harga'           => $request->total_harga,            
            'diskon'                => $request->diskon,
            'status_bayar'          => $request->status_bayar,
            'diterima'              => $request->diterima,
        ];

        Produk::insert($data);
        return redirect()->route('penjualans')->with('success', 'Data berhasil ditambahkan');
    }

    // Delete Data
    public function delete($id)
    {
        Produk::deleteData($id);
        return redirect()->route('penjualans')->with('success', 'Data berhasil dihapus');
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $data = [
            'id_penjualan'          => $request->id_penjualan,
            'id_user'               => $request->id_user,
            'total_item'            => $request->total_item,
            'total_harga'           => $request->total_harga,            
            'diskon'                => $request->diskon,
            'status_bayar'          => $request->status_bayar,
            'diterima'              => $request->diterima,
        ];

        Produk::updateData($id, $data);
        return redirect()->route('penjualans')->with('success', 'Data berhasil diupdate');
    }

    // Count Data Produk
    public static function countPenjualansData()
    {
        return Penjualan::countPenjualansData();
    }

    // Ambil Produk berdasarkan Waktu Input Terbaru
    public static function getLatestPenjualans()
    {
        return Penjualan::getLatestPenjualans();
    }
}
