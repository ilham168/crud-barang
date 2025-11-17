@extends('layouts.app')

@section('title', 'Pengaturan Aplikasi')

@section('content')
<div class="container">
    <h3>Pengaturan Aplikasi</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('pengaturan.update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Toko</label>
            <input type="text" name="nama_toko" class="form-control" value="{{ $pengaturan['nama_toko'] }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $pengaturan['alamat'] }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ $pengaturan['telepon'] }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tema Tampilan</label>
            <select name="tema" class="form-select" required>
                <option value="default" {{ $pengaturan['tema'] == 'default' ? 'selected' : '' }}>Default</option>
                <option value="gelap" {{ $pengaturan['tema'] == 'gelap' ? 'selected' : '' }}>Gelap</option>
                <option value="terang" {{ $pengaturan['tema'] == 'terang' ? 'selected' : '' }}>Terang</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan Pengaturan</button>
    </form>
</div>
@endsection
