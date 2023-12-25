@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Checkout</h2>

        {{-- Data Customer --}}
        <div class="row">
            
        </div>

        <!-- Ringkasan Pembelian -->
        <div class="card mt-4">
            <div class="card-header">
                Ringkasan Pembelian
            </div>
            <div class="card-body">
                <!-- Tampilkan ringkasan pembelian dari keranjang belanja -->
                @include('customer.product.cart_summary')
            </div>
        </div>

        <!-- Tombol Proses Checkout -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Proses Checkout</button>
        </div>
    </div>
@endsection
