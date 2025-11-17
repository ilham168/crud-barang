@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Barang</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $barang->id }}</td>
                </tr>
                <tr>
                    <th>Nama Barang</th>
                    <td>{{ $barang->nama_barang }}</td>
                </tr>
                <tr>
                    <th>Jenis Barang</th>
                    <td>{{ $barang->jenis->nama_jenis ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Satuan</th>
                    <td>{{ $barang->satuan }}</td>
                </tr>
                <tr>
                    <th>Harga Pokok</th>
                    <td>Rp {{ number_format($barang->harga_pokok, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Harga Jual</th>
                    <td>Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Stok</th>
                    <td>{{ $barang->stok }}</td>
                </tr>
                <tr>
                    <th>Dibuat Pada</th>
                    <td>{{ $barang->created_at->format('d M Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Terakhir Diperbarui</th>
                    <td>{{ $barang->updated_at->format('d M Y H:i') }}</td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Barang
                </a>
                <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-primary">
                    <i class="bi bi-pencil"></i> Edit
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
