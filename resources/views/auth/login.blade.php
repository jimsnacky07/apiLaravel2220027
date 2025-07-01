@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="text-center">
    <h5 class="mb-0 fs-4 fw-semibold">Selamat Datang</h5>
    <p class="mb-4">Silakan masuk ke akun Anda</p>
</div>
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-4">
        <label for="password" class="form-label">Kata Sandi</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
        @error('password')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="form-check">
            <input class="form-check-input primary" type="checkbox" id="remember" name="remember">
            <label class="form-check-label text-dark" for="remember">
                Ingat Saya
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Masuk</button>
    <div class="d-flex align-items-center justify-content-center">
        <p class="fs-4 mb-0 fw-medium">Belum punya akun?</p>
        <a class="text-primary fw-medium ms-2" href="{{ route('register') }}">Daftar</a>
    </div>
</form>
@endsection
