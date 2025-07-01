@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header"><h4>Tambah Matakuliah</h4></div>
    <div class="card-body">
        <form action="{{ route('matakuliah.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Kode</label>
                <input type="text" name="kode" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama Matakuliah</label>
                <input type="text" name="namamatkul" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>SKS</label>
                <input type="number" name="sks" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Semester</label>
                <input type="text" name="semester" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
