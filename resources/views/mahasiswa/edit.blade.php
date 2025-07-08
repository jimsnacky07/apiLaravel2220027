@extends('welcome')

@section('content')
<div class="container">
    <h2>Edit Mahasiswa</h2>
    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>User</label>
            <select name="user_id" class="form-control" required>
                <option value="">-- Pilih User --</option>
                @foreach(App\Models\User::all() as $user)
                    <option value="{{ $user->id }}" @if($mahasiswa->user_id == $user->id) selected @endif>{{ $user->email }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Nama Mahasiswa</label>
            <input type="text" name="namamahasiswa" class="form-control" value="{{ $mahasiswa->namamahasiswa }}" required>
        </div>
        <div class="mb-3">
            <label>No BP</label>
            <input type="text" name="nobp" class="form-control" value="{{ $mahasiswa->nobp }}" required>
        </div>
        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan" class="form-control" value="{{ $mahasiswa->jurusan }}" required>
        </div>
        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
            @if($mahasiswa->foto)
                <img src="{{ asset('storage/'.$mahasiswa->foto) }}" width="80" class="mt-2">
            @endif
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
