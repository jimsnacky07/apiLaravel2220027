<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mahasiswa::all()->map(function ($mhs) {
            $mhs->foto = $mhs->foto ? asset('storage/' . $mhs->foto) : null; // Gunakan url() untuk konsistensi
            return $mhs;
        });

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'namamahasiswa' => 'required|string|max:255',
            'nobp' => 'required|string|max:255|unique:mahasiswas',
            'jurusan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->only(['user_id', 'namamahasiswa', 'nobp', 'jurusan']);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_mahasiswa', 'public');
        }
        $mahasiswa = Mahasiswa::create($data);
        return response()->json($mahasiswa, 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return response()->json($mahasiswa, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'namamahasiswa' => 'required|string|max:255',
            'nobp' => 'required|string|max:255|unique:mahasiswas,nobp,' . $id,
            'jurusan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->only(['user_id', 'namamahasiswa', 'nobp', 'jurusan']);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_mahasiswa', 'public');
        }
        $mahasiswa->update($data);
        return response()->json($mahasiswa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        if ($mahasiswa->foto) {
            Storage::disk('public')->delete($mahasiswa->foto);
        }
        $mahasiswa->delete();
        return response()->json(['message' => 'Data Mahasiswa Berhasil Dihapus'], 200);
    }
}
