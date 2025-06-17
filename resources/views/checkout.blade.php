@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mb-4">Form Transaksi Checkout</h3>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="buku_id" class="form-label">Pilih Buku</label>
                <select class="form-select" name="buku_id">
                    <option value="">-- Pilih Buku --</option>
                    @foreach ($bukus as $buku)
                        <option value="{{ $buku->id }}">{{ $buku->title }} - Rp{{ number_format($buku->total_harga, 0, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="buku_jumlah" class="form-label">Jumlah Buku</label>
                <input type="number" name="buku_jumlah" class="form-control" min="0" value="0">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label for="event_id" class="form-label">Pilih Event</label>
                <select class="form-select" name="event_id">
                    <option value="">-- Pilih Event --</option>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}">{{ $event->title }} - Rp{{ number_format($event->total_harga, 0, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="event_jumlah" class="form-label">Jumlah Tiket</label>
                <input type="number" name="event_jumlah" class="form-control" min="0" value="0">
            </div>
        </div>

        <hr>

        <div class="mb-3">
            <label for="bayar" class="form-label">Uang Dibayar (Rp)</label>
            <input type="number" name="bayar" id="bayar" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Bayar & Simpan</button>
        <a href="{{ route('checkout.print') }}" class="btn btn-success" target="_blank">Cetak Struk</a>
    </form>
</div>
@endsection
