@extends('layouts.app')

@section('content')
<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Diskon</th>
                        <th>Harga Jual</th>
                        <th>Total Harga</th>
                        <th>Bayar</th>
                        <th>Status</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $pesananDetail)
                    <!-- Sample data, replace it with your actual data -->
                    <tr>
                        <td>{{$pesananDetail->id_pesanan_detail}}</td>
                        <td>{{$pesananDetail->tbl_products->nama_produk}}</td>
                        <td>{{$pesananDetail->tbl_products->diskon}}</td>
                        <td>{{$pesananDetail->tbl_products->harga_jual}}</td>
                        <td>{{$pesananDetail->tbl_pesanan->harga_total}}</td>
                        <td>{{$pesananDetail->tbl_products->Bayar}}</td>
                        <td>{{$pesananDetail->Jumlah}}</td>
                        <td></td>
                        <td>
                            <button class="btn btn-danger btn-sm"  data-target="#deletePesananDetailModal{{ $pesananDetail->id_pesanan_detail}}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
        @foreach($data as $pesananDetail)
        <div class="modal fade" id="deletePesananDetailModal{{ $pesananDetail->id_pesanan_detail}}" tabindex="-1" aria-labelledby="deleteProductModal{{ $pesananDetail->id_pesanan_detail}}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteProductModal{{ $product->id_pesanan_detail }}">Hapus Data Transaksi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin ingin menghapus transaksi {{ $pesananDetail->tbl_products->nama_produk}}?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a href="{{ route('pesananDetail.delete', $pesananDetail->id_pesanan_detail) }}" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
    </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });

        function deleteTransaction(button) {
            // You can implement the actual deletion logic here
            // For example, you might want to prompt the user for confirmation
            var row = $(button).closest('tr');
            row.remove();
        }
    </script>
@endsection