@extends('layouts.app')

@section('content')
    <div class="container-fluid px-5">
        <div class="row">
            <div class="table-responsive shadow-sm p-3">
                <table class="table table-bordered responsive" id="dataTable" width="100%" cellspacing="0">

                    <button type="button" class="btn  btn-primary mb-3" data-toggle="modal" data-target="#addCategoryModal">
                        <i class="fas fa-plus"></i>
                        Tambah Produk
                    </button>

                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Kode Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $product)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ $product->tbl_categories->category_name }}</td>
                                <td>{{ $product->kode_produk }}</td>
                                <td>{{ $product->nama_produk }}</td>
                                <td>{{ $product->diskon }}</td>
                                <td>{{ $product->harga_jual }}</td>
                                <td>{{ $product->stok }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                        data-target="#detailProductModal{{ $product->id_produk }}"><i
                                            class="fas fa-info"></i>
                                        Detail
                                    </button>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#editProductModal{{ $product->id_produk }}"><i class="fas fa-edit"></i>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#deleteProductModal{{ $product->id_produk }}">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @foreach ($data as $product)
                <!-- Delete Category Modal -->
                <div class="modal fade" id="deleteProductModal{{ $product->id_produk }}" tabindex="-1"
                    aria-labelledby="deleteProductModal{{ $product->id_produk }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteProductModal{{ $product->id_produk }}">Hapus Data Produk
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus produk {{ $product->nama_produk }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <a href="{{ route('admin.products.delete', $product->id_produk) }}"
                                    class="btn btn-danger">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Category Modal -->
                <div class="modal fade" id="editProductModal{{ $product->id_produk }}" tabindex="-1"
                    aria-labelledby="editCategoryModal{{ $product->id_produk }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title{{ $product->id_produk }}"
                                    id="editProductModal{{ $product->id_produk }}">Edit Data Produk</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.products.update', ['id' => $product->id_produk]) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="category_name">Nama Kategori</label>
                                        <select class="form-control" name="category_id" id="category_id"
                                            required="required">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->category_id }}">
                                                    {{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="kode_produk">Kode Produk</label>
                                        <input type="text" class="form-control" id="kode_produk" name="kode_produk"
                                            placeholder="Masukkan Kode Produk" value="{{ $product->kode_produk }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_produk">Nama Produk</label>
                                        <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                            placeholder="Masukkan Nama Produk" value="{{ $product->nama_produk }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">Gambar</label>
                                        <input type="file" class="form-control" id="gambar" name="gambar"
                                            placeholder="Masukkan Gambar" value="{{ $product->gambar }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="produk_description">Deskripsi Produk</label>
                                        <textarea class="form-control" id="produk_description" name="produk_description" rows="3">{{ $product->produk_description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="diskon">Diskon</label>
                                        <input type="text" class="form-control" id="diskon" name="diskon"
                                            placeholder="Masukkan diskon" value="{{ $product->diskon }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_jual">Harga Jual</label>
                                        <input type="text" class="form-control" id="harga_jual" name="harga_jual"
                                            placeholder="Masukkan Harga Jual" value="{{ $product->harga_jual }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="stok">Stok</label>
                                        <input type="text" class="form-control" id="stok" name="stok"
                                            placeholder="Masukkan Stok" value="{{ $product->stok }}">
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

                {{-- Detail Modal --}}
                <div class="modal fade" id="detailProductModal{{ $product->id_produk }}" tabindex="-1"
                    aria-labelledby="detailProductModal{{ $product->id_produk }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailProductModal{{ $product->id_produk }}">Detail Produk
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        {{-- Tampilkan gambar produk --}}
                                        <img src="{{ asset('/' . $product->gambar) }}" class="w-100" alt="Product Image">
                                    </div>
                                    <div class="col-md-8">
                                        {{-- Tampilkan informasi produk --}}
                                        <h5>{{ $product->nama_produk }}</h5>
                                        <p>Kode Produk: {{ $product->kode_produk }}</p>
                                        <p>Kategori: {{ $product->tbl_categories->category_name }}</p>
                                        <p>Deskripsi: {{ $product->produk_description }}</p>
                                        <p>Diskon: {{ $product->diskon }}</p>
                                        <p>Harga: {{ $product->harga_jual }}</p>
                                        <p>Stok: {{ $product->stok }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Add Category Modal -->
            <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModal"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addCategoryModal">Tambah Data Produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.products.insert') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="category_id">Nama Kategori</label>
                                    <select class="form-control" name="category_id" id="category_id" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->category_id }}">{{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="kode_produk">Kode Produk</label>
                                    <input type="text" class="form-control" id="kode_produk" name="kode_produk"
                                        placeholder="Masukkan Kode Produk">
                                </div>
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                        placeholder="Masukkan Nama Produk">
                                </div>
                                <div class="">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar"
                                        placeholder="Masukkan Gambar">
                                </div>
                                <div class="form-group">
                                    <label for="produk_description">Deskripsi Produk</label>
                                    <textarea class="form-control" id="produk_description" name="produk_description" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="diskon">Diskon</label>
                                    <input type="text" class="form-control" id="diskon" name="diskon"
                                        placeholder="Masukkan Diskon">
                                </div>
                                <div class="form-group">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="text" class="form-control" id="harga_jual" name="harga_jual"
                                        placeholder="Masukkan Harga Jual">
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="text" class="form-control" id="stok" name="stok"
                                        placeholder="Masukkan Nama Stok">
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
