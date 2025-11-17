@extends('layouts.app')
@section('title', 'Dashboard Pengguna')

@section('content')
<div class="container">
    <h2 class="mb-4">Selamat Datang, {{ Auth::user()->name }}</h2>
    <p class="lead">Ini adalah halaman dashboard pengguna.</p>

    <div class="alert alert-info">
        <i class="bi bi-info-circle"></i>  
        Kamu bisa melihat daftar barang dan transaksi menggunakan menu di sidebar.
    </div>
</div>
@endsection
