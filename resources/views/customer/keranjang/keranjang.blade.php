@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
    <div class="row">
        <div class="table-responsive shadow-sm p-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Diskon</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    @foreach($pesanan_details as $pesanan_detail)
                    <tr>
                        <td>{{ $id++ }}</td>
                        <td>{{ $pesanan_detail->produk->nama_produk }}</td>
                        <td>
                            <picture>
                                <img src="{{ asset('img/products/' . $pesanan_detail->produk->gambar) }}" class="img-fluid img-thumbnail" alt="...">
                            </picture>
                        </td>
                        <td>{{ $pesanan_detail->produk->harga_jual }}</td>
                        <td>{{ $pesanan_detail->produk->diskon }}</td>
                        <td>{{ $pesanan_detail->jumlah }}</td>
                        <td>{{ $pesanan_detail->subtotal }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#updateKeranjang{{ $pesanan_detail->id_pesanan_detail }}">
                                <i class="fas fa-shopping-cart"></i>
                                __u
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteKeranjang{{ $pesanan_detail->id_pesanan_detail }}">
                                <i class="fas fa-shopping-cart"></i>
                                __d
                            </button>
                        </td>
                    </tr>


                    <!-- Delete Category Modal -->
                    <div class="modal fade" id="deleteKeranjang{{ $pesanan_detail->id_pesanan_detail }}" tabindex="-1" aria-labelledby="deleteKeranjang{{ $pesanan_detail->id_pesanan_detail }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteKeranjang{{ $pesanan_detail->id_pesanan_detail }}">Hapus Data Keranjang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus pesanan {{ $pesanan_detail->produk->nama_produk }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <a href="{{ route('keranjang.delete', $pesanan_detail->id_pesanan_detail) }}" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Edit Keranjang Modal -->
                    <div class="modal fade" id="updateKeranjang{{ $pesanan_detail->id_pesanan_detail }}" tabindex="-1" aria-labelledby="updateKeranjang{{ $pesanan_detail->id_pesanan_detail }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title{{ $pesanan_detail->id_pesanan_detail }}" id="updateKeranjang{{ $pesanan_detail->id_pesanan_detail }}">Edit Data Produk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('keranjang.update', ['id' => $pesanan_detail->id_pesanan_detail]) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="kode_produk">Kategori</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="kode_produk">Nama Produk</label>
                                            <input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="Masukkan Kode Produk" value="{{ $pesanan_detail->produk->nama_produk }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_produk">Nama Produk</label>
                                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" value="{{ $pesanan_detail->produk->harga_jual }}" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="stok">Stok</label>
                                            <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok" value="{{ $pesanan_detail->jumlah }}">
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
                </tbody>
            </table>
        </div>
    </div>


</div>
@endsection