@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header"><h4>Edit Dosen</h4></div>
    <div class="card-body">
        <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>User</label>
                <select name="user_id" class="form-control" required>
                    <option value="">-- Pilih User --</option>
                    @foreach(App\Models\User::all() as $user)
                        <option value="{{ $user->id }}" @if($dosen->user_id == $user->id) selected @endif>{{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Nama Dosen</label>
                <input type="text" name="namadosen" class="form-control" value="{{ $dosen->namadosen }}" required>
            </div>
            <div class="mb-3">
                <label>NIDN</label>
                <input type="text" name="nidn" class="form-control" value="{{ $dosen->nidn }}" required>
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
