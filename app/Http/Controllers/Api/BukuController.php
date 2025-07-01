<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::all()->map(function ($buku) {
            $buku->foto = $buku->foto ? asset('storage/' . $buku->foto) : null; // Gunakan url() untuk konsistensi
            return $buku;
        });

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->only(['kode', 'judul', 'harga']);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_buku', 'public');
        }
        $buku = Buku::create($data);
        return response()->json($buku, 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buku = Buku::findOrFail($id);
        return response()->json($buku, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $buku = Buku::findOrFail($id);
        $request->validate([
            'kode' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->only(['kode', 'judul', 'harga']);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_buku', 'public');
        }
        $buku->update($data);
        return response()->json($buku);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);
        if ($buku->foto) {
            Storage::disk('public')->delete($buku->foto);
        }
        $buku->delete();
        return response()->json(['message' => 'Data Buku Berhasil Dihapus'], 200);
    }
}
