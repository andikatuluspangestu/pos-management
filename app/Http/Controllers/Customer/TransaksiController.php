<?php

namespace App\Http\Controllers\customer;

use App\Produk;
use App\Laporan;
use App\Pesanan;
use App\PesaananDetails;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $products = Produk::getAll();
        $pesanan_detail = PesaananDetails::where('id_user', '=', Auth::user()->id)->get();

            $data = [
                'pesanan_detail' => $pesanan_detail,
                'products' => $products,
            ];

            return view('customer.transaksi.transaksi', $data);

    }

    public function create(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);
        
        $kembali = $request->bayar - $pesanan->subtotal;
        if ($kembali < 0)
        {
            return redirect('/customer/keranjang');
        }

        $randomString = Str::random(10);
        PesaananDetails::create([
            'id_user' => $pesanan->id_user,
            'id_produk' => $pesanan->id_produk,
            'jumlah' => $pesanan->jumlah,
            'bayar' => $request->bayar,
            'kembali' => $kembali,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'kode_pembelian' => $randomString
        ]);
        
        // $randomString = Str::random(10);
        // Laporan::create([
        //     'id_user' => $pesanan->id_user,
        //     'id_produk' => $pesanan->id_produk,
        //     'jumlah' => $pesanan->jumlah,
        //     'bayar' => $request->bayar,
        //     'kembali' => $kembali,
        //     'nama' => $request->nama,
        //     'alamat' => $request->alamat,
        //     'telepon' => $request->telepon,
        //     'kode_pembelian' => $randomString
        // ]);

        $pesanan->delete($id);

        return redirect('/customer/transaksi');

    }
    public function delete($id)
    {
        $transaksi = PesaananDetails::find($id);
        $transaksi->delete($id);

        return redirect('/customer/transaksi');
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
