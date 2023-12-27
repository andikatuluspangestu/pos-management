@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="table-responsive shadow-sm p-3">
      <table class="table resposnive table-bordered" id="dataTable" width="100%" cellspacing="0">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Customer</th>
            <th scope="col">Produk</th>
            <th scope="col">Alamat</th>
            <th scope="col">No. Telepon</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Bayar</th>
            <th scope="col">Kembali</th>
            <th scope="col">Kode Pembelian</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $id = 1; ?>
          @foreach($data as $laporan)
          <tr>
            <td>{{ $id++ }}</td>
            <td>{{ $laporan->users->name }}</td>
            <td>{{ $laporan->produk->nama_produk }}</td>
            <td>{{ $laporan->alamat }}</td>
            <td>{{ $laporan->telepon }}</td>
            <td>{{ $laporan->jumlah }}</td>
            <td>@currency($laporan->produk->harga_jual * $laporan->jumlah)</td>
            <td>@currency($laporan->bayar)</td>
            <td>@currency($laporan->kembali)</td>
            <td>{{ $laporan->kodepembelian }}</td>
            <td>{{ $laporan->status }}</td>
            <td>
              @if ($laporan->status == "Sedang di Proses")
              <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#prosesLaporan{{ $laporan->id_pesanan_detail }}">
                <i class="fas fa-shopping-cart"></i>
                Proses
              </button>
              @elseif ($laporan->status == "Sedang di Kirim")
              <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#prosesLaporan{{ $laporan->id_pesanan_detail }}" disabled style="opacity: 0.5; cursor: not-allowed;">
                <i class="fas fa-shopping-cart"></i>
                Proses
              </button>
              @endif
            </td>
          </tr>

          <!-- Delete Order Modal -->
          <div class="modal fade" id="prosesLaporan{{ $laporan->id_pesanan_detail }}" tabindex="-1" aria-labelledby="prosesLaporan{{ $laporan->id_pesanan_detail }}" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="prosesLaporan{{ $laporan->id_pesanan_detail }}">Hapus Data Keranjang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Apakah Anda yakin ingin Memproses pesanan {{ $laporan->users->name }}?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <a href="{{ route('saleslaporans.update', $laporan->id_pesanan_detail) }}" class="btn btn-success">Proses</a>
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