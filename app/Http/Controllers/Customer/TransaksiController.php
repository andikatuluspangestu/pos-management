<?php

namespace App\Http\Controllers\customer;

use App\Produk;
use App\PesaananDetails;
use App\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $products = Produk::getAll();
        $pesanan_detail = PesaananDetails::getAll();
        $isEmpty = $pesanan_detail->isEmpty();


        if ($pesanan_detail->isEmpty()) {
            return view('customer.transaksi.transaksi', compact('pesanan_detail', 'isEmpty'));
        } else {

            $data = [
                'pesanan_detail' => $pesanan_detail,
                'products' => $products,
            ];

            return view('customer.transaksi.transaksi', $data);
        }
    }

    public function create(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);
        // $pesanan_detail = PesaananDetails::getAll();

        PesaananDetails::create([
            'id_user' => $pesanan->id_user,
            'id_produk' => $pesanan->id_produk,
            'jumlah' => $pesanan->jumlah,
            'bayar' => $request->bayar,
            'kembali' => 0,
        ]);

        $pesanan->delete($id);

        return redirect('/customer/transaksi');

    }
    public function delete($id)
    {
        //
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
