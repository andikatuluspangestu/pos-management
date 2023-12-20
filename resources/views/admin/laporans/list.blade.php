@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="table-responsive shadow-sm p-3">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

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
            <th scope="col">ID Laporan</th>
            <th scope="col">ID User</th>
            <th scope="col">ID Produk</th>
            <th scope="col">Nama User</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Stok</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $laporan)
          <tr>
            <td>{{ $laporan->id_laporan }}</td>
            <td>{{ $laporan->users->id_user }}</td>
            <td>{{ $laporan->tbl_produk->id_produk }}</td>
            <td>{{ $laporan->users->name }}</td>
            <td>{{ $laporan->tbl_produk->nama_produk }}</td>
            <td>{{ $laporan->tbl_produk->stok }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection