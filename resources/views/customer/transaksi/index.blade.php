@extends('layouts.app')

@section('content')
<div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Diskon</th>
                        <th>Harga Jual</th>
                        <th>Total Harga</th>
                        <th>Bayar</th>
                        <th>Status</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample data, replace it with your actual data -->
                    <tr>
                        <td>Product 1</td>
                        <td>5%</td>
                        <td>$50.00</td>
                        <td>$45.00</td>
                        <td>$50.00</td>
                        <td>Paid</td>
                        <td>2</td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="deleteTransaction(this)">Delete</button>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });

        function deleteTransaction(button) {
            // You can implement the actual deletion logic here
            // For example, you might want to prompt the user for confirmation
            var row = $(button).closest('tr');
            row.remove();
        }
    </script>
@endsection