<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use Illuminate\Http\Request;

class KrsApiController extends Controller
{
    public function index()
    {
        $krsList = Krs::with(['mahasiswa', 'matakuliah', 'dosen'])->get();
        return response()->json($krsList);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'matakuliah_id' => 'required|exists:matakuliahs,id',
            'dosen_id' => 'required|exists:dosens,id',
            'tahun_akademik' => 'required|string',
            'semester' => 'required|string',
        ]);

        $krs = Krs::create($data);
        return response()->json($krs, 201);
    }

    public function show(Krs $krs)
    {
        return response()->json($krs->load(['mahasiswa', 'matakuliah', 'dosen']));
    }

    public function update(Request $request, Krs $krs)
    {
        $data = $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'matakuliah_id' => 'required|exists:matakuliahs,id',
            'dosen_id' => 'required|exists:dosens,id',
            'tahun_akademik' => 'required|string',
            'semester' => 'required|string',
        ]);

        $krs->update($data);
        return response()->json($krs);
    }

    public function destroy(Krs $krs)
    {
        $krs->delete();
        return response()->json(null, 204);
    }
}
