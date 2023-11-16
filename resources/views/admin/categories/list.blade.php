@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="table-responsive shadow-sm p-3">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <button type="button" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#addCategoryModal">
          <i class="fas fa-plus"></i>
          Tambah Kategori
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
            <th scope="col">ID</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
          <tr>
            <td>{{ $category->category_id }}</td>
            <td>{{ $category->category_name }}</td>
            <td>
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editCategoryModal{{ $category->category_id }}">
                <i class="fas fa-edit"></i>
                Edit
              </button>
              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteCategoryModal{{ $category->category_id }}">
                <i class="fas fa-trash"></i>
                Delete
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @foreach($categories as $category)
    <!-- Delete Category Modal -->
    <div class="modal fade" id="deleteCategoryModal{{ $category->category_id }}" tabindex="-1" aria-labelledby="deleteCategoryModal{{ $category->category_id }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteCategoryModal{{ $category->category_id }}">Hapus Data Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin ingin menghapus kategori {{ $category->category_name }}?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a href="{{ route('categories.delete', $category->category_id) }}" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal{{ $category->category_id }}" tabindex="-1" aria-labelledby="editCategoryModal{{ $category->category_id }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title{{ $category->category_id }}" id="editCategoryModal{{ $category->category_id }}">Edit Data Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('categories.update', ['id' => $category->category_id]) }}" method="post">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="category_name">Nama Kategori</label>
                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Masukkan Nama Kategori" value="{{ $category->category_name }}">
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

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addCategoryModal">Tambah Data Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('categories.insert') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="category_name">Nama Kategori</label>
                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Masukkan Nama Kategori">
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