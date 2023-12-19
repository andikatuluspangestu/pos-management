<?php

namespace App\Http\Controllers\customer;

use App\Produk;
use App\Pesanan;
use App\PesaananDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TransaksiController extends Controller
{
    public function index(Request $request)
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

            return view('customer.transaksi.transaksi', $data);
        }
    }

    public function create()
    {
        //
    }
    public function delete($id)
    {
        PesaananDetails::deleteData($id);
        return redirect()->route('pesananDetail')->with('success', 'Data berhasil dihapus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
