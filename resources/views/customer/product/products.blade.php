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
                        <form action="{{route('addkeranjang', $product->id_produk)}}" method="post">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label for="category_name">Nama Kategori</label>
                                <input type="text" class="form-control" id="category_name" name="category_name"  value="{{ $product->tbl_categories->category_name }}" readonly>
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
                                <input type="text" class="form-control" id="diskon" name="diskon" placeholder="Masukkan diskon" value="{{ $product->diskon }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="stok">Jumlah Pembelian</label>
                                <input type="text" class="form-control" id="stok" name="stock" placeholder="Masukkan Jumlah" value="0">
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

</div>
@endsection