@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
    <div class="row">
        <div class="table-responsive shadow-sm p-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Deskripsi Produk</th>
                        <th scope="col">Diskon</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id_produk }}</td>
                        <td>{{ $product->tbl_categories->category_name }}</td>
                        <td>{{ $product->nama_produk }}</td>
                        <td>
                            <picture>
                                <img src="{{ asset('img/products/' . $product->gambar) }}" class="img-fluid img-thumbnail" alt="...">
                            </picture>
                        </td>
                        <td>{{ $product->produk_description }}</td>
                        <td>{{ $product->diskon }}</td>
                        <td>{{ $product->harga_jual }}</td>
                        <td>{{ $product->stok }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#buyProductsModal{{ $product->id_produk }}">
                                <i class="fas fa-shopping-cart"></i>
                                Buy
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @foreach($products as $product)
    
        <!-- Buy Category Modal -->
        <div class="modal fade" id="buyProductsModal{{ $product->id_produk }}" tabindex="-1" aria-labelledby="editCategoryModal{{ $product->id_produk }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title{{ $product->id_produk }}" id="buyProductsModal{{ $product->id_produk }}">Buy Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('products.update', ['id' => $product->id_produk]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="category_name">Nama Kategori</label>
                                <input type="text" class="form-control" id="category_name" name="category_name"  value="{{ $product->category_name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"  value="{{ $product->nama_produk }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="harga_jual">Harga Jual</label>
                                <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Masukkan Harga Jual" value="{{ $product->harga_jual }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="diskon">Diskon</label>
                                <input type="text" class="form-control" id="diskon" name="diskon" placeholder="Masukkan diskon" value="{{ $product->diskon }}">
                            </div>
                            <!-- <div class="form-group">
                                <label for="total">Total Harga</label>
                                <input type="text" class="form-control" id="total" name="total" placeholder="Masukkan total" value="{{ $product->diskon }}">
                            </div> -->
                            <div class="form-group">
                                <label for="stok">Jumlah Pembelian</label>
                                <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan Jumlah" value="0">
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