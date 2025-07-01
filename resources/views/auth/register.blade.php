@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="text-center">
    <h5 class="mb-0 fs-4 fw-semibold">Daftar Akun Baru</h5>
    <p class="mb-4">Silakan lengkapi data berikut</p>
</div>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
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
    <div class="mb-4">
        <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
    </div>
    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Daftar</button>
    <div class="d-flex align-items-center justify-content-center">
        <p class="fs-4 mb-0 fw-medium">Sudah punya akun?</p>
        <a class="text-primary fw-medium ms-2" href="{{ route('login') }}">Masuk</a>
    </div>
</form>
@endsection
