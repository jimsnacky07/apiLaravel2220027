<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua data mobil
        $data = Mobil::all()->map(function ($mobil) {
            $mobil->foto = $mobil->foto ? asset('storage/' . $mobil->foto) : null;
            return $mobil;
        });

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kode' => 'required|unique:mobils',
            'merek' => 'required',
            'warna' => 'required',
            'foto' => 'nullable|image|max:2048',
            'harga' => 'required|numeric',
        ]);
        $data = $request->only(['kode', 'merek', 'warna', 'harga']);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_mobil', 'public');
        }
        $mobil = Mobil::create($data);
        return response()->json([
            'message' => 'Mobil berhasil ditambahkan',
            'mobil' => $mobil,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $mobil = Mobil::find($id);
        if (!$mobil) {
            return response()->json(['message' => 'Mobil tidak ditemukan'], 404);
        }
        $mobil->foto = $mobil->foto ? asset('storage/' . $mobil->foto) : null;
        return response()->json($mobil, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $mobil = Mobil::find($id);
        if (!$mobil) {
            return response()->json(['message' => 'Mobil tidak ditemukan'], 404);
        }
        $request->validate([
            'kode' => 'required|unique:mobils,kode,' . $id,
            'merek' => 'required',
            'warna' => 'required',
            'foto' => 'nullable|image|max:2048',
            'harga' => 'required|numeric',
        ]);
        $data = $request->only(['kode', 'merek', 'warna', 'harga']);
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_mobil', 'public');
        }
        $mobil->update($data);
        return response()->json([
            'message' => 'Mobil berhasil diperbarui',
            'mobil' => $mobil,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $mobil = Mobil::find($id);
        if (!$mobil) {
            return response()->json(['message' => 'Mobil tidak ditemukan'], 404);
        }
        if ($mobil->foto) {
            Storage::disk('public')->delete($mobil->foto);
        }
        $mobil->delete();
        return response()->json(['message' => 'Mobil berhasil dihapus'], 200);
    }
}