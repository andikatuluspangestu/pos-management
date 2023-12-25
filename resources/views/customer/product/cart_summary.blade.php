<!-- resources/views/checkout/cart_summary.blade.php -->

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            @foreach ($cart as $index => $item)
                <?php
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
                ?>
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['productName'] }}</td>
                    <td>Rp {{ $item['price'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>Rp {{ $subtotal }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-right"><strong>Total:</strong></td>
                <td>Rp {{ $total }}</td>
            </tr>
        </tfoot>
    </table>
</div>
