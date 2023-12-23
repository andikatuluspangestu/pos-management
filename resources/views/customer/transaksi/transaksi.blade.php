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
                        <th scope="col" style="max-width: 250px;">Gambar</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Diskon</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Dibayar</th>
                        <th scope="col">Kembalian</th>
                        <th scope="col">Delete History</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    @foreach($pesanan_detail as $pesanan_detail)
                    <tr>
                        <td>{{ $id++ }}</td>
                        <td>{{ $pesanan_detail->produk->nama_produk }}</td>
                        <td style="max-width: 250   px;">
                            <img src="{{ asset('img/products/' . $pesanan_detail->produk->gambar) }}" class="img-fluid img-thumbnail" style="max-width: 100%;" alt="...">
                        </td>
                        <td>{{ $pesanan_detail->produk->harga_jual }}</td>
                        <td>{{ $pesanan_detail->produk->diskon }}</td>
                        <td>{{ $pesanan_detail->jumlah }}</td>
                        <td>@currency($pesanan_detail->produk->harga_jual * $pesanan_detail->jumlah)</td>
                        <td>@currency($pesanan_detail->bayar)</td>
                        <td>@currency($pesanan_detail->kembali)</td>
                        <td>
                            <!-- Delete -->
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteTransaksi{{ $pesanan_detail->id_pesanan_detail }}">
                                <i class="fas fa-trash"></i>
                                Delete
                            </button>
                        </td>
                    </tr>

                    <!-- Delete Order Modal -->
                    <div class="modal fade" id="deleteTransaksi{{ $pesanan_detail->id_pesanan_detail }}" tabindex="-1" aria-labelledby="deleteTransaksi{{ $pesanan_detail->id_pesanan_detail }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteTransaksi{{ $pesanan_detail->id_pesanan_detail }}">Hapus Data Transaksi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus riwayat pembelian {{ $pesanan_detail->produk->nama_produk }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <a href="{{ route('transaksi.delete', $pesanan_detail->id_pesanan_detail) }}" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>
@endsection