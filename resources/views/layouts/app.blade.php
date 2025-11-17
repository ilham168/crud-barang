<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Aplikasi Barang')</title>
<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
html, body {
    height: 100%;
    margin: 0;
    overflow-y: auto;
    background-color: #f7f8fa;
}
.sidebar {
    width: 250px;
    background-color: #002147;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    padding-top: 60px;
    color: white;
    overflow-y: auto;
}
.sidebar a {
    color: #fff;
    text-decoration: none;
    display: block;
    padding: 10px 20px;
}
.sidebar a:hover,
.sidebar a.active {
    background-color: #004085;
    color: #ffc107;
}
.navbar {
    background-color: #002147;
}
.navbar-brand,
.navbar-text {
    color: #ffc107 !important;
}
.content-wrapper {
    margin-left: 250px;
    padding: 80px 20px 40px;
    min-height: 100vh;
    overflow-y: auto;
}
footer {
    text-align: center;
    margin-top: 20px;
    color: #777;
}
</style>

@php
    use Illuminate\Support\Facades\Auth;
    use App\Helpers\PengaturanHelper;
    $pengaturan = PengaturanHelper::getPengaturan();
    $tema = $pengaturan['tema'] ?? 'default';
@endphp

@if ($tema === 'gelap')
<style>
    body {
        background-color: #121212;
        color: #e0e0e0;
    }
    .card, .navbar, .sidebar {
        background-color: #1e1e1e !important;
        color: #e0e0e0 !important;
    }
    .btn, .table, input, select, textarea {
        background-color: #2c2c2c;
        color: #f5f5f5;
        border-color: #444;
    }
    .btn:hover {
        background-color: #444;
    }
    a, a:hover {
        color: #ffc107 !important;
    }
</style>
@endif
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <i class="bi bi-box-seam"></i> Aplikasi Barang
        </a>

        <div class="ms-auto">
            <form action="{{ route('pengaturan.update') }}" method="POST" class="d-inline">
                @csrf
                <input type="hidden" name="tema" value="{{ $tema === 'gelap' ? 'default' : 'gelap' }}">
                <button type="submit" class="btn btn-sm btn-outline-warning">
                    <i class="bi bi-brightness-high"></i>
                    {{ $tema === 'gelap' ? 'Terang' : 'Gelap' }}
                </button>
            </form>
        </div>
    </div>
</nav>
@if(Auth::check())
    <div class="text-center mb-3">
        <small class="text-warning">Login sebagai: {{ Auth::user()->role }}</small>
    </div>
@endif

<!-- Sidebar -->
<div class="sidebar">
    <h6 class="text-center text-warning mb-4 fw-bold">Menu Utama</h6>

    @auth
        {{-- Menu untuk ADMIN --}}
<div class="sidebar">
    <h6 class="text-center text-warning mb-4 fw-bold">Menu Utama</h6>

    {{-- Dashboard --}}
    @if(Auth::user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
    @else
        <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
    @endif

    {{-- Daftar Barang --}}
    <a href="{{ route('barang.index') }}" class="{{ request()->routeIs('barang.index') ? 'active' : '' }}">
        <i class="bi bi-box"></i> Daftar Barang
    </a>

    {{-- Tambah Barang --}}
    <a href="{{ route('barang.create') }}" class="{{ request()->routeIs('barang.create') ? 'active' : '' }}">
        <i class="bi bi-plus-circle"></i> Tambah Barang
    </a>

    {{-- Jenis Barang (khusus admin) --}}
    @if(Auth::user()->role === 'admin')
        <a href="{{ route('jenis-barang.index') }}" class="{{ request()->routeIs('jenis-barang.*') ? 'active' : '' }}">
            <i class="bi bi-tags"></i> Jenis Barang
        </a>
    @endif

    {{-- Transaksi --}}
    <a href="{{ route('transaksi.index') }}" class="{{ request()->routeIs('transaksi.*') ? 'active' : '' }}">
        <i class="bi bi-cash-coin"></i> Transaksi Penjualan
    </a>

    <hr class="bg-light">

    {{-- Pengaturan (khusus admin) --}}
    @if(Auth::user()->role === 'admin')
        <a href="{{ route('pengaturan.index') }}" class="{{ request()->routeIs('pengaturan.*') ? 'active' : '' }}">
            <i class="bi bi-gear"></i> Pengaturan
        </a>
    @endif

    {{-- Logout --}}
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-link text-light" onclick="return confirm('Yakin ingin keluar?')">
            <i class="bi bi-box-arrow-right"></i> Logout ({{ Auth::user()->role === 'admin' ? 'Admin Utama' : Auth::user()->name }})
        </button>
    </form>
</div>


    @else
        {{-- Menu untuk BELUM LOGIN --}}
        <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">
            <i class="bi bi-box-arrow-in-right"></i> Login
        </a>
        <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}">
            <i class="bi bi-person-plus"></i> Register
        </a>
    @endauth
</div>

<!-- Main Content -->
<div class="content-wrapper">
    <div class="container-fluid">
        @yield('content')
    </div>
    <footer>
        <p class="mt-4">&copy; {{ date('Y') }} Aplikasi Barang - Laravel 12</p>
    </footer>
</div>

<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
