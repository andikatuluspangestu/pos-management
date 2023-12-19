@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="table-responsive shadow-sm p-3">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <button type="button" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#addLaporanModal">
          <i class="fas fa-plus"></i>
          Tambah Laporan
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
            <th scope="col">ID Laporan</th>
            <th scope="col">ID User</th>
            <th scope="col">ID Produk</th>
            <th scope="col">Nama User</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Stok</th>
            <th scope="col">Aksi</th>
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
            <td>
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editLaporanModal{{ $laporan->id_produk }}">
                <i class="fas fa-edit"></i>
                Edit
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @foreach($data as $laporan)

    <!-- Edit Laporan Modal -->
    <div class="modal fade" id="editLaporanModal{{ $laporan->id_produk }}" tabindex="-1" aria-labelledby="editLaporanModal{{ $laporan->id_produk }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title{{ $laporan->id_produk }}" id="editLaporanModal{{ $laporan->id_produk }}">Edit Data Laporan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('products.update', ['id' => $laporan->id_produk]) }}" method="post">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="name">Nama User</label>
                <select class="form-control" name="id" id="id" required="required">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <select class="form-control" name="id_produk" id="id_produk" required="required">
                    @foreach ($products as $produk)
                        <option value="{{ $produk->id_produk }}">{{ $produk->nama_produk }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="stok">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok" value="{{ $laporan->stok }}">
              </div> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    @endforeach

    <!-- Add Laporan Modal -->
    <div class="modal fade" id="addLaporanModal" tabindex="-1" aria-labelledby="addLaporanModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addLaporanModal">Tambah Data Laporan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('saleslaporans.insert') }}" method="POST">
              @csrf
              
              <div class="form-group">
                <label for="name">Nama User</label>
                <select class="form-control" name="id" id="id" required="required">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <select class="form-control" name="id_produk" id="id_produk" required="required">
                    @foreach ($products as $produk)
                        <option value="{{ $produk->id_produk }}">{{ $produk->nama_produk }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="stok">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan Jumlah Stok">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection