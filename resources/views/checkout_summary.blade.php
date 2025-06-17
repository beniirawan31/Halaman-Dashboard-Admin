@extends('layouts.app')
@section('content')
<div class="container">
    <h4>Ringkasan Pembayaran</h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tipe</th>
                <th>ID</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($checkoutItems as $item)
            <tr>
                <td>{{ ucfirst($item['type']) }}</td>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['jumlah'] }}</td>
                <td>Rp{{ number_format($item['harga'], 0, ',', '.') }}</td>
                <td>Rp{{ number_format($item['subtotal'], 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" class="text-end">Total:</th>
                <th id="totalText">Rp{{ number_format($grandTotal, 0, ',', '.') }}</th>
            </tr>
        </tfoot>
    </table>

    <div class="mt-4">
        <form action="{{ route('checkout.print') }}" method="GET" target="_blank" onsubmit="return validatePayment()">
            <input type="hidden" name="data" value='@json($checkoutItems)'>
            <input type="hidden" name="grandTotal" id="grandTotal" value="{{ $grandTotal }}">

            <div class="mb-3">
                <label for="bayar">Uang Dibayar (Rp)</label>
                <input type="number" id="bayar" class="form-control" oninput="hitungKembalian()">
            </div>

            <div class="mb-3">
                <label for="kembalian">Kembalian (Rp)</label>
                <input type="text" id="kembalian" class="form-control" readonly>
            </div>

            <button type="submit" class="btn btn-success">Cetak Struk PDF</button>
        </form>
    </div>
</div>

<script>
    function hitungKembalian() {
        let total = parseFloat(document.getElementById('grandTotal').value);
        let bayar = parseFloat(document.getElementById('bayar').value);
        let kembali = bayar - total;

        document.getElementById('kembalian').value = kembali > 0 ? 'Rp' + kembali.toLocaleString('id-ID') : 'Rp0';
    }

    function validatePayment() {
        let total = parseFloat(document.getElementById('grandTotal').value);
        let bayar = parseFloat(document.getElementById('bayar').value);
        if (isNaN(bayar) || bayar < total) {
            alert('Uang dibayar kurang dari total!');
            return false;
        }
        return true;
    }
</script>
@endsection
