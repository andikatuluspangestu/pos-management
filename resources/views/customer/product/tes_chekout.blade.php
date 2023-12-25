@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                Produk Tersedia
            </h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive shadow-sm p-3">

                    {{-- Tombol Modal Keranjang --}}
                    <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal"
                        data-target="#keranjangModal">
                        <i class="fas fa-shopping-cart"></i> Keranjang
                    </button>

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
                            <?php $id = 1; ?>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $id++ }}</td>
                                    <td>{{ $product->tbl_categories->category_name }}</td>
                                    <td>{{ $product->nama_produk }}</td>
                                    <td>
                                        <img src="{{ asset('/' . $product->gambar) }}" alt="Gambar" width="100px"
                                            height="100px">
                                    </td>
                                    <td>{{ $product->produk_description }}</td>
                                    <td>{{ $product->diskon }}</td>
                                    <td>{{ $product->harga_jual }}</td>
                                    <td>{{ $product->stok }}</td>
                                    <td>
                                        @if ($product->stok > 0)
                                            <a href="javascript:void(0);" class="btn btn-primary btn-sm add-to-cart-btn"
                                                data-product-id="{{ $product->id }}"
                                                data-product-name="{{ $product->nama_produk }}"
                                                data-product-price="{{ $product->harga_jual }}"
                                                data-product-quantity="1">Add to Cart</a>
                                        @else
                                            <button class="btn btn-danger btn-sm" disabled>Stok Habis</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Keranjang --}}
    <div class="modal fade" id="keranjangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keranjang Belanja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('customers.checkout') }}" method="post" 
                class="form-group">
                @csrf
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="cartTableBody">
                            {{-- Form Data Barang akan diisi secara dinamis melalui JavaScript --}}
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Proses Checkout</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal Keranjang --}}

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Inisialisasi keranjang belanja
            var cart = [];

            // Menambahkan produk ke keranjang belanja
            $('.add-to-cart-btn').on('click', function () {
                var productId = $(this).data('product-id');
                var productName = $(this).data('product-name');
                var productPrice = $(this).data('product-price');
                var productQuantity = $(this).data('product-quantity');

                // Cek apakah produk sudah ada di keranjang
                var existingProduct = cart.find(function (item) {
                    return item.productId === productId;
                });

                if (existingProduct) {
                    // Jika sudah ada, tambahkan jumlah
                    existingProduct.quantity += productQuantity;
                } else {
                    // Jika belum ada, tambahkan produk baru
                    cart.push({
                        productId: productId,
                        productName: productName,
                        price: productPrice,
                        quantity: productQuantity
                    });
                }

                // Perbarui tampilan keranjang
                updateCartView();
            });

            // Menghapus produk dari keranjang belanja
            $(document).on('click', '.remove-from-cart-btn', function () {
                var productId = $(this).data('product-id');

                // Hapus produk dari keranjang
                cart = cart.filter(function (item) {
                    return item.productId !== productId;
                });

                // Perbarui tampilan keranjang
                updateCartView();
            });

            // Fungsi untuk memperbarui tampilan keranjang
            function updateCartView() {
                var cartTableBody = $('#cartTableBody');
                cartTableBody.empty();

                var total = 0;

                // Loop melalui setiap item di keranjang
                cart.forEach(function (item, index) {
                    var subtotal = item.price * item.quantity;
                    total += subtotal;

                    var row = '<tr>' +
                        '<td>' + (index + 1) + '</td>' +
                        '<td>' + item.productName + '</td>' +
                        '<td>Rp ' + item.price + '</td>' +
                        '<td>' + item.quantity + '</td>' +
                        '<td>Rp ' + subtotal + '</td>' +
                        '<td><button class="btn btn-danger btn-sm remove-from-cart-btn" data-product-id="' + item.productId + '">Remove</button></td>' +
                        '</tr>';

                    cartTableBody.append(row);
                });

                // Tampilkan total
                var totalRow = '<tr>' +
                    '<td colspan="4" class="text-right"><strong>Total:</strong></td>' +
                    '<td><strong>Rp ' + total + '</strong></td>' +
                    '<td></td>' +
                    '</tr>';

                cartTableBody.append(totalRow);
            }
        });
    </script>
@endsection
