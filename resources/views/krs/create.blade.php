{{-- filepath: resources/views/krs/create.blade.php --}}
@extends('welcome')

@section('content')
<div class="container mt-4">
    <h2>Entri Data KRS</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('krs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="matakuliah_id" class="form-label">Mata Kuliah</label>
            <select name="matakuliah_id" id="matakuliah_id" class="form-control" required>
                <option value="">-- Pilih Mata Kuliah --</option>
                @foreach($matakuliahs as $mk)
                    <option value="{{ $mk->id }}">{{ $mk->namamatkul }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="dosen_id" class="form-label">Dosen</label>
            <select name="dosen_id" id="dosen_id" class="form-control" required>
                <option value="">-- Pilih Dosen --</option>
                @foreach($dosens as $dsn)
                    <option value="{{ $dsn->id }}">{{ $dsn->namadosen }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
            <input type="text" name="tahun_akademik" id="tahun_akademik" class="form-control" required>
        </div>
        <hr>
        <h5>Daftar Mahasiswa & Semester</h5>
        <table class="table" id="mahasiswa-table">
            <thead>
                <tr>
                    <th>Mahasiswa</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select name="mahasiswa_id[]" class="form-control" required>
                            <option value="">-- Pilih Mahasiswa --</option>
                            @foreach($mahasiswas as $mhs)
                                <option value="{{ $mhs->id }}">{{ $mhs->nobp ?? '-' }} - {{ $mhs->namamahasiswa ?? 'Tanpa Nama' }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" name="semester[]" class="form-control" required>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-secondary mb-3" id="add-row">Tambah Mahasiswa</button>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('add-row').addEventListener('click', function() {
        let table = document.getElementById('mahasiswa-table').getElementsByTagName('tbody')[0];
        let newRow = table.rows[0].cloneNode(true);
        newRow.querySelectorAll('input, select').forEach(function(input) {
            input.value = '';
        });
        table.appendChild(newRow);
    });
    document.getElementById('mahasiswa-table').addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-remove')) {
            let row = e.target.closest('tr');
            let table = row.parentNode;
            if (table.rows.length > 1) {
                row.remove();
            }
        }
    });
});
</script>
@endsection
