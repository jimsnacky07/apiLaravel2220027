<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function index()
    {
        $krsList = Krs::with(['mahasiswa', 'matakuliah', 'dosen'])->get();
        return view('krs.index', compact('krsList'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = Matakuliah::all();
        $dosens = Dosen::all();
        return view('krs.create', compact('mahasiswas', 'matakuliahs', 'dosens'));
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

    public function edit($id)
    {
        $krs = Krs::findOrFail($id);
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = Matakuliah::all();
        $dosens = Dosen::all();
        return view('krs.edit', compact('krs', 'mahasiswas', 'matakuliahs', 'dosens'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'matakuliah_id' => 'required|exists:matakuliahs,id',
            'dosen_id' => 'required|exists:dosens,id',
            'tahun_akademik' => 'required',
            'semester' => 'required',
        ]);
        $krs = Krs::findOrFail($id);
        $krs->update($request->all());
        return redirect()->route('krs.index')->with('success', 'KRS berhasil diupdate');
    }

    public function destroy($id)
    {
        $krs = Krs::findOrFail($id);
        $krs->delete();
        return redirect()->route('krs.index')->with('success', 'KRS berhasil dihapus');
    }
}