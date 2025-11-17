@extends('layouts.app')
@section('title', 'Dashboard Admin')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-4 text-primary">Dashboard Admin</h2>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center p-3 bg-primary text-white">
                <div class="card-body">
                    <h4>{{ $totalBarang }}</h4>
                    <p class="mb-0">Total Barang</p>
                    <i class="bi bi-box-seam fs-2"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center p-3 bg-secondary text-white">
                <div class="card-body">
                    <h4>{{ $totalJenis }}</h4>
                    <p class="mb-0">Jenis Barang</p>
                    <i class="bi bi-tags fs-2"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center p-3 bg-success text-white">
                <div class="card-body">
                    <h4>{{ $totalTransaksi }}</h4>
                    <p class="mb-0">Total Transaksi</p>
                    <i class="bi bi-cash-stack fs-2"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center p-3 bg-warning text-dark">
                <div class="card-body">
                    <h4>{{ $totalUser }}</h4>
                    <p class="mb-0">Pengguna Terdaftar</p>
                    <i class="bi bi-people fs-2"></i>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <div class="text-center">
        <h5>Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</h5>
        <p class="text-muted">Gunakan menu di sidebar untuk mengelola data barang, jenis barang, atau transaksi.</p>
    </div>
</div>
@endsection
