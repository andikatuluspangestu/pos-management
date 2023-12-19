@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
    <div class="row">
        <div class="table-responsive shadow-sm p-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Diskon</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    @foreach($pesanan_detail as $pesanan_detail)
                    <tr>
                        <td>{{ $id++ }}</td>
                        <td>{{ $pesanan_detail->produk->nama_produk }}</td>
                        <td>
                            <picture>
                                <img src="{{ asset('img/products/' . $pesanan_detail->produk->gambar) }}" class="img-fluid img-thumbnail" alt="...">
                            </picture>
                        </td>
                        <td>{{ $pesanan_detail->harga_jual }}</td>
                        <td>{{ $pesanan_detail->diskon }}</td>
                        <td>{{ $pesanan_detail->jumlah }}</td>
                        <td>{{ $pesanan_detail->subtotal }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection