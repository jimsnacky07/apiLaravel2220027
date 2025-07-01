<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return response()->json(Produk::all(), 200);
    }

    public function show($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return response()->json(['message' => 'Produk Tidak Ditemukan'], 404);
        }
        return response()->json($produk, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
        ]);
        $produk = Produk::create($validated);
        return response()->json($produk, 201);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return response()->json(['message' => 'Produk Tidak Ditemukan'], 404);
        }
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'sometimes|required|numeric',
        ]);
        $produk->update($validated);
        return response()->json($produk, 200);
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return response()->json(['message' => 'Produk Tidak Ditemukan'], 404);
        }
        $produk->delete();
        return response()->json(['message' => 'Produk Berhasil Dihapus'], 200);
    }
}