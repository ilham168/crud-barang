@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<div class="card">
    <div class="card-header bg-warning">
        <h5 class="text-white mb-0">Edit Barang</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Jenis Barang</label>
                <select name="jenis_barang_id" class="form-select" required>
                    <option value="">-- Pilih Jenis Barang --</option>
                    @foreach($jenisBarang as $j)
                        <option value="{{ $j->id }}" {{ $barang->jenis_barang_id == $j->id ? 'selected' : '' }}>
                            {{ $j->nama_jenis }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ old('nama_barang', $barang->nama_barang) }}" required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection