@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 400px; margin-top: 50px;">
    <h3 class="text-center mb-4">Daftar Akun Baru</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.post') }}">
        @csrf

        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="name" class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Daftar</button>
    </form>

    <div class="text-center mt-3">
        Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
    </div>
</div>
@endsection
