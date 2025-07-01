@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header"><h4>Edit Dosen</h4></div>
    <div class="card-body">
        <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ $dosen->nip }}" required>
            </div>
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $dosen->nama }}" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $dosen->email }}" required>
            </div>
            <div class="mb-3">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control" value="{{ $dosen->telepon }}">
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ $dosen->alamat }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
