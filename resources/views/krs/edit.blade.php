@extends('welcome')

@section('content')
<div class="container">
    <div class="bg-light p-3 mb-4" style="border-radius:8px;">
        <h3 class="mb-0" style="font-weight:600;">Aplikasi KRS</h3>
    </div>
    <h1 style="font-weight:700;">Edit Data KRS</h1>
    <form action="{{ route('krs.update', $krs->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Mahasiswa</label>
            <select name="mahasiswa_id" class="form-control" required>
                <option value="">-- Pilih Mahasiswa --</option>
                @foreach($mahasiswas as $m)
                    <option value="{{ $m->id }}" {{ $krs->mahasiswa_id == $m->id ? 'selected' : '' }}>{{ $m->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Mata Kuliah</label>
            <select name="matakuliah_id" class="form-control" required>
                <option value="">-- Pilih Mata Kuliah --</option>
                @foreach($matakuliahs as $mk)
                    <option value="{{ $mk->id }}" {{ $krs->matakuliah_id == $mk->id ? 'selected' : '' }}>{{ $mk->namamatkul }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Dosen</label>
            <select name="dosen_id" class="form-control" required>
                <option value="">-- Pilih Dosen --</option>
                @foreach($dosens as $d)
                    <option value="{{ $d->id }}" {{ $krs->dosen_id == $d->id ? 'selected' : '' }}>{{ $d->namadosen }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tahun Akademik</label>
            <input type="text" name="tahun_akademik" class="form-control" value="{{ $krs->tahun_akademik }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Semester</label>
            <input type="text" name="semester" class="form-control" value="{{ $krs->semester }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('krs.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
