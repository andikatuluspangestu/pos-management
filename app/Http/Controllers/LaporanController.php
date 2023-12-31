<?php

namespace App\Http\Controllers;

use App\User;
use App\Produk;
use App\Laporan;
use App\PesaananDetails;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Index Page
    public function index(Request $request)
    {
        $data       = PesaananDetails::getAll();
        $role       = $request->user()->role;

        if ($role == 'sales') {
            $view = 'sales.laporans.list';
        } else {
            $view = 'admin.laporans.list';
        }
        return view($view, compact('data'));
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
    public function update($id)
    {
        $data = [
            'status'       => 'Sedang di Kirim',
        ];

        PesaananDetails::updateData($id, $data);
        return redirect()->route('saleslaporans')->with('success', 'Data berhasil diupdate');
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
