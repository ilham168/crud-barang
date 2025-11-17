@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')
<div class="container">
    <h3>Daftar Transaksi Penjualan</h3>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>
        <p><strong>Total Penjualan:</strong> Rp {{ number_format($totalPenjualan) }}</p>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $t)
            <tr>
                <td>{{ $t->id }}</td>
                <td>{{ $t->barang->nama_barang }}</td>
                <td>{{ $t->jumlah }}</td>
                <td class="text-end">{{ number_format($t->total_harga) }}</td>
                <td>{{ $t->tanggal_transaksi }}</td>
                <td>
                    <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus transaksi ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $transaksi->links() }}
</div>
@endsection
