<?php

namespace App\Http\Controllers\customer;

use App\PesaananDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = PesaananDetails::getAll();
        // $categories = Categories::getall();

        $role = $request->user()->role;

        $view = 'customer.transaksi.index';
        if ($role === 'customer') {
            $view = 'customer.transaksi.index';
        }

        return view($view, compact('data'));
        // return view($view, compact('data', 'categories'));
    }
    // {
    //     return view('customer.transaksi.index');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
