@extends('welcome')

@section('content')
<div class="container">
    <h2>Daftar KRS</h2>
    <a href="{{ route('krs.create') }}" class="btn btn-primary mb-3">Tambah KRS</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Mahasiswa</th>
                <th>Mata Kuliah</th>
                <th>Dosen</th>
                <th>Tahun Akademik</th>
                <th>Semester</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($krsList as $krs)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $krs->mahasiswa->nama }}</td>
                <td>{{ $krs->matakuliah->namamatkul }}</td>
                <td>{{ $krs->dosen->namadosen }}</td>
                <td>{{ $krs->tahun_akademik }}</td>
                <td>{{ $krs->semester }}</td>
                <td>
                    <a href="{{ route('krs.edit', $krs->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('krs.destroy', $krs->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
