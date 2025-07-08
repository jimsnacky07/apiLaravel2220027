@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Daftar Dosen</h4>
        <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah Dosen</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Nama Dosen</th>
                    <th>NIDN</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dosens as $dosen)
                <tr>
                    <td>{{ $dosen->user ? $dosen->user->email : '-' }}</td>
                    <td>{{ $dosen->namadosen }}</td>
                    <td>{{ $dosen->nidn }}</td>
                    <td>{{ $dosen->telepon }}</td>
                    <td>{{ $dosen->alamat }}</td>
                    <td>
                        <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
