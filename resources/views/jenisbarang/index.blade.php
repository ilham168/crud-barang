@extends('layouts.app')

@section('title', 'Daftar Jenis Barang')

@section('content')
<div class="container">
    <h3>Daftar Jenis Barang</h3>

    <a href="{{ route('jenis-barang.create') }}" class="btn btn-primary mb-3">
        Tambah Jenis Barang
    </a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenisBarang as $jenis)
            <tr>
                <td>{{ $jenis->id }}</td>
                <td>{{ $jenis->nama_jenis }}</td>
                <td>
                    <a href="{{ route('jenis-barang.edit', $jenis->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>
                    <form action="{{ route('jenis-barang.destroy', $jenis->id) }}" 
                          method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" 
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $jenisBarang->links() }}
</div>
@endsection
