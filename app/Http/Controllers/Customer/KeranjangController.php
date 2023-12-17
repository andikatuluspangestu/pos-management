<?php

namespace App\Http\Controllers\customer;

use App\Produk;
use App\Pesanan;
use App\PesaananDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Produk::getAll();
        $pesanan_details = PesaananDetails::getAll();


        $data = [
            'pesanan_details' => $pesanan_details,
            'products' => $products,
        ];

        return view('customer.keranjang.keranjang', $data);
    }

    public function create(Request $request, $id)
    {
        $produk = Produk::find($id);
        $harga_jual = $produk->harga_jual;
        $diskon = $produk->diskon;
        $stok = $produk->stok;

        PesaananDetails::create([
            'id_produk' => $id,
            'jumlah' => $request->stock,
            'harga_jual' => $harga_jual,
            'diskon' => $diskon,
            'subtotal' => $harga_jual * $request->stock
        ]);

        $produk->update([
            'stok' => $stok -= $request->stock
        ]);

        return redirect('/customer/keranjang');
    }

    public function delete(Request $request, $id)
    {
        $keranjang = PesaananDetails::find($id);

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
