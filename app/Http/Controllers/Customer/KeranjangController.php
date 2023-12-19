<?php

namespace App\Http\Controllers\customer;

use App\User;
use App\Produk;
use App\Pesanan;
use App\PesaananDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeranjangController extends Controller
{
    public function index()
    {
        $products = Produk::getAll();
        $pesanan = Pesanan::getAll();
        $isEmpty = $pesanan->isEmpty();


        if ($pesanan->isEmpty()) {
            return view('customer.keranjang.keranjang', compact('pesanan', 'isEmpty'));
        } else {

            $data = [
                'pesanan' => $pesanan,
                'products' => $products,
            ];

            return view('customer.keranjang.keranjang', $data);
        }
    }

    public function create(Request $request, $id)
    {
        $produk = Produk::find($id);
        $harga_jual = $produk->harga_jual;
        $diskon = $produk->diskon;
        $stok = $produk->stok;

        $users      = User::getAllCustomers();
        $id_user       = $request->user()->id;

        if ($stok - $request->stock < 0) {
            return redirect('/customer/products');
        }

        Pesanan::create([
            'id_produk' => $id,
            'id_user' => $id_user,
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

    public function delete($id)
    {
        $keranjang = Pesanan::find($id);
        $produk = Produk::find($keranjang->id_produk);
        $jumlah = $keranjang->jumlah;

        $produk->update([
            'stok' => $produk->stok += $jumlah
        ]);

        $keranjang->delete($id);

        return redirect('/customer/keranjang');
    }

    public function update(Request $request, $id)
    {
        $keranjang = Pesanan::find($id);
        $produk = Produk::find($keranjang->id_produk);
        $jumlah = $keranjang->jumlah;
        $jumlahNew = $request->stok;


        $produkstok = $jumlah + $produk->stok - $jumlahNew;
        if ($produkstok < 0) {
            return redirect('/customer/keranjang');
        }

        $produk->update([
            'stok' => $produkstok
        ]);
        $keranjang->update([
            'jumlah' => $jumlahNew
        ]);

        return redirect('/customer/keranjang');
    }

    public function checkout(Request $request, $id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
