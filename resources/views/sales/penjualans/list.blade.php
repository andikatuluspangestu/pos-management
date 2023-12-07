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
            <th scope="col">ID Penjualan</th>
            <th scope="col">ID User</th>
            <th scope="col">Total Item</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Status Bayar</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $penjualan)
          <tr>
            <td>{{ $penjualan->category_id }}</td>
            <td>{{ $penjualan->category_name }}</td>
            <td>
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editCategoryModal{{ $penjualan->category_id }}">
                <i class="fas fa-edit"></i>
                Edit
              </button>
              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteCategoryModal{{ $penjualan->category_id }}">
                <i class="fas fa-trash"></i>
                Delete
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @foreach($data as $penjualan)

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal{{ $penjualan->category_id }}" tabindex="-1" aria-labelledby="editCategoryModal{{ $penjualan->category_id }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title{{ $penjualan->category_id }}" id="editCategoryModal{{ $penjualan->category_id }}">Edit Data Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('categories.update', ['id' => $penjualan->category_id]) }}" method="post">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="category_name">Nama Kategori</label>
                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Masukkan Nama Kategori" value="{{ $penjualan->category_name }}">
              </div>
              <div class="form-group">
                <label for="category_description">Deskripsi Kategori</label>
                <textarea class="form-control" id="category_description" name="category_description" rows="3">{{ $penjualan->category_description }}</textarea>
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

</div>
@endsection