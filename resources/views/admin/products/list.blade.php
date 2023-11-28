@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="table-responsive shadow-sm p-3">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <button type="button" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#addCategoryModal">
          <i class="fas fa-plus"></i>
          Tambah Produk
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
            <th scope="col">ID Kategori</th>
            <th scope="col">Kode Produk</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Deskripsi Produk</th>
            <th scope="col">Diskon</th>
            <th scope="col">Harga Jual</th>
            <th scope="col">Stok</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $product)
          <tr>
            <td>{{ $product->id_produk }}</td>
            <td>{{ $product->category_id }}</td>
            <td>{{ $product->kode_produk }}</td>
            <td>{{ $product->nama_produk }}</td>
            <td>{{ $product->product_description }}</td>
            <td>{{ $product->diskon }}</td>
            <td>{{ $product->harga_jual }}</td>
            <td>{{ $product->stok }}</td>
            <td>
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editProductModal{{ $product->id_produk }}">
                <i class="fas fa-edit"></i>
                Edit
              </button>
              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProductModal{{ $product->id_produk }}">
                <i class="fas fa-trash"></i>
                Delete
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @foreach($data as $product)
    <!-- Delete Category Modal -->
    <div class="modal fade" id="deleteProductModal{{ $product->id_produk }}" tabindex="-1" aria-labelledby="deleteProductModal{{ $product->id_produk }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteProductModal{{ $product->id_produk }}">Hapus Data Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin ingin menghapus produk {{ $product->nama_produk }}?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a href="{{ route('products.delete', $product->id_produk) }}" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editProductModal{{ $product->id_produk }}" tabindex="-1" aria-labelledby="editCategoryModal{{ $product->id_produk }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title{{ $product->id_produk }}" id="editProductModal{{ $product->id_produk }}">Edit Data Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('product.update', ['id' => $product->id_produk]) }}" method="post">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="nama_produk">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Kategori" value="{{ $product->nama_produk }}">
              </div>
              <div class="form-group">
                <label for="produk_description">Deskripsi Kategori</label>
                <textarea class="form-control" id="produk_description" name="produk_description" rows="3">{{ $product->produk_description }}</textarea>
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
            <form action="{{ route('product.insert') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="nama_produk">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk">
              </div>
              <div class="form-group">
                <label for="produk_description">Deskripsi Kategori</label>
                <textarea class="form-control" id="produk_description" name="produk_description" rows="3"></textarea>
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