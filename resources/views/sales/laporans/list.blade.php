@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="table-responsive shadow-sm p-3">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <button type="button" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#addCategoryModal">
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
            <th scope="col">ID</th>
            <th scope="col">ID User</th>
            <th scope="col">ID Produk</th>
            <th scope="col">Nama User</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Gambar</th>
            <th scope="col">Stok</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $laporan)
          <tr>
            <td>{{ $laporan->id_produk }}</td>
            <td>{{ $laporan->tbl_categories->category_name }}</td>
            <td>{{ $laporan->kode_produk }}</td>
            <td>{{ $laporan->nama_produk }}</td>
            <td>
              <picture>
                <source srcset="{{ asset('img/products/' . $laporan->gambar) }}" type="image/jpeg">
                <img src="{{ asset('img/products/' . $laporan->gambar) }}" class="img-fluid img-thumbnail" alt="...">
              </picture>
            </td>
            <td>{{ $laporan->produk_description }}</td>
            <td>{{ $laporan->diskon }}</td>
            <td>{{ $laporan->harga_jual }}</td>
            <td>{{ $laporan->stok }}</td>
            <td>
              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editProductModal{{ $laporan->id_produk }}">
                <i class="fas fa-edit"></i>
                Edit
              </button>
              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProductModal{{ $laporan->id_produk }}">
                <i class="fas fa-trash"></i>
                Delete
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @foreach($data as $laporan)
    <!-- Delete Category Modal -->
    <div class="modal fade" id="deleteProductModal{{ $laporan->id_produk }}" tabindex="-1" aria-labelledby="deleteProductModal{{ $laporan->id_produk }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteProductModal{{ $laporan->id_produk }}">Hapus Data Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin ingin menghapus produk {{ $laporan->nama_produk }}?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a href="{{ route('products.delete', $laporan->id_produk) }}" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editProductModal{{ $laporan->id_produk }}" tabindex="-1" aria-labelledby="editCategoryModal{{ $laporan->id_produk }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title{{ $laporan->id_produk }}" id="editProductModal{{ $laporan->id_produk }}">Edit Data Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('products.update', ['id' => $laporan->id_produk]) }}" method="post">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="category_name">Nama Kategori</label>
                <select class="form-control" name="category_id" id="category_id" required="required">
                  @foreach ($categories as $category)
                      <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="kode_produk">Kode Produk</label>
                <input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="Masukkan Kode Produk" value="{{ $laporan->kode_produk }}">
              </div>
              <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" value="{{ $laporan->nama_produk }}">
              </div> 
              <div class="form-group">
                <label for="nama_produk">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Masukkan Gambar" value="{{ $laporan->gambar }}">
              </div>             
              <div class="form-group">
                <label for="produk_description">Deskripsi Produk</label>
                <textarea class="form-control" id="produk_description" name="produk_description" rows="3">{{ $laporan->produk_description }}</textarea>
              </div>
              <div class="form-group">
                <label for="diskon">Diskon</label>
                <input type="text" class="form-control" id="diskon" name="diskon" placeholder="Masukkan diskon" value="{{ $laporan->diskon }}">
              </div> 
              <div class="form-group">
                <label for="harga_jual">Harga Jual</label>
                <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Masukkan Harga Jual" value="{{ $laporan->harga_jual }}">
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

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addCategoryModal">Tambah Data Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('products.insert') }}" method="POST">
              @csrf
              
              <div class="form-group">
                <label for="category_name">Nama Kategori</label>
                <select class="form-control" name="category_id" id="category_id" required="required">
                    @foreach ($categories as $category)
                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="kode_produk">Kode Produk</label>
                <input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="Masukkan Kode Produk">
              </div>
              <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk">
              </div>
              <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Masukkan Gambar">
              </div>
              <div class="form-group">
                <label for="produk_description">Deskripsi Produk</label>
                <textarea class="form-control" id="produk_description" name="produk_description" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="diskon">Diskon</label>
                <input type="text" class="form-control" id="diskon" name="diskon" placeholder="Masukkan Diskon">
              </div>
              <div class="form-group">
                <label for="harga_jual">Harga Jual</label>
                <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Masukkan Harga Jual">
              </div>
              <div class="form-group">
                <label for="stok">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan Nama Stok">
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