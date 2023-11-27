@extends('layouts.app')

@section('content')
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <div class="row">
    <div class="table">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Produk</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Kategori</th>
            <th scope="col">Harga</th>
            <th scope="col">Stok</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>P001</td>
            <td>Indomie</td>
            <td>Makanan</td>
            <td>Rp. 2.000</td>
            <td>100</td>
            <td>
              <a href="#" class="btn btn-sm btn-warning">Edit</a>
              <a href="#" class="btn btn-sm btn-danger">Hapus</a>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>P002</td>
            <td>Roti</td>
            <td>Makanan</td>
            <td>Rp. 5.000</td>
            <td>50</td>
            <td>
              <a href="#" class="btn btn-sm btn-warning">Edit</a>
              <a href="#" class="btn btn-sm btn-danger">Hapus</a>
            </td>
          </tr>
          @foreach ($produks as $produk)
          <tr>
              <td> {{ $loop->index + 1 }}</td>
              <td> {{ $produk->kode_produk }}</td>
              <td> {{ $produk->nama_produk }} </td>
              <td> {{ $produk->category->category_name }} </td>
              <td> {{ $produk->harga_jual }} </td>
              <td> {{ $produk->stok }} </td>
              <td>
                  <a href="#" class="btn btn-warning btn-sm" role="button">Edit</a>
                  <a href="#" class="btn btn-danger btn-sm" role="button">Hapus</a>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>
@endsection