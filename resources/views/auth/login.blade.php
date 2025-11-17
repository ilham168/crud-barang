@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
    <h3 class="text-center mb-4">Login</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form method="POST" action="{{ route('login.submit') }}">

        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="text-center mt-3">
          Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
        </div>

        <button type="submit" class="btn btn-primary w-100">Masuk</button>
    </form>
</div>
@endsection
