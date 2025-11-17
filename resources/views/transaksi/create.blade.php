@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')
<div class="container">
    <h3>Tambah Transaksi Penjualan</h3>
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Pilih Barang</label>
            <select name="barang_id" class="form-select" required>
                <option value="">-- Pilih Barang --</option>
                @foreach ($barang as $b)
                    <option value="{{ $b->id }}">{{ $b->nama_barang }} (Stok: {{ $b->stok }})</option>
                @endforeach
            </select>
            @error('barang_id') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required min="1">
            @error('jumlah') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
