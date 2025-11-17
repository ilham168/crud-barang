@extends('layouts.app')

@section('title', 'Edit Jenis Barang')

@section('content')
<div class="container">
    <h3>Edit Jenis Barang</h3>
    <form action="{{ route('jenis-barang.update', $jenisBarang->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Jenis</label>
            <input type="text" name="nama_jenis" class="form-control" 
                   value="{{ old('nama_jenis', $jenisBarang->nama_jenis) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('jenis-barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
