@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="table-responsive shadow-sm p-3">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <button type="button" class="btn btn-sm btn-success mb-3" onclick="printLaporan()">
          <i class="fas fa-print"></i>
          Cetak Laporan
        </button>

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
            <th scope="col">Nama Customer</th>
            <th scope="col">Produk</th>
            <th scope="col">Alamat</th>
            <th scope="col">No. Telepon</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Bayar</th>
            <th scope="col">Kembali</th>
            <th scope="col">Kode Pembelian</th>
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
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection