@extends('layouts.app')

@section('title', 'Tambah Jenis Barang')

@section('content')
<div class="container">
    <h3>Tambah Jenis Barang</h3>
    <form action="{{ route('jenis-barang.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Jenis</label>
            <input type="text" name="nama_jenis" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('jenis-barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
