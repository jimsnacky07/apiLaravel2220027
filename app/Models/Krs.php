<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Krs extends Model
{
    use HasFactory;

    protected $table = 'krs';

    protected $fillable = [
        'mahasiswa_id',
        'matakuliah_id',
        'dosen_id',
        'tahun_akademik',
        'semester',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function store(Request $request)
    {
        $request->validate([
            'matakuliah_id' => 'required|exists:matakuliahs,id',
            'dosen_id' => 'required|exists:dosens,id',
            'tahun_akademik' => 'required',
            'mahasiswa_id' => 'required|array',
            'mahasiswa_id.*' => 'exists:mahasiswas,id',
            'semester' => 'required|array',
            'semester.*' => 'required',
        ]);

        foreach ($request->mahasiswa_id as $i => $mhs_id) {
            \App\Models\Krs::create([
                'mahasiswa_id' => $mhs_id,
                'matakuliah_id' => $request->matakuliah_id,
                'dosen_id' => $request->dosen_id,
                'tahun_akademik' => $request->tahun_akademik,
                'semester' => $request->semester[$i],
            ]);
        }

        return redirect()->route('krs.index')->with('success', 'Data KRS berhasil disimpan');
    }
}
