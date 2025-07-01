<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matakuliahs = Matakuliah::all();
        return view('matakuliah.index', compact('matakuliahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:matakuliahs',
            'namamatkul' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required',
        ]);
        Matakuliah::create([
            'kode' => $request->kode,
            'namamatkul' => $request->namamatkul,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ]);
        return redirect()->route('matakuliah.index')->with('success', 'Data matakuliah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matakuliah $matakuliah)
    {
        return view('matakuliah.edit', compact('matakuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        $request->validate([
            'kode' => 'required|unique:matakuliahs,kode,' . $matakuliah->id,
            'namamatkul' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required',
        ]);
        $matakuliah->update([
            'kode' => $request->kode,
            'namamatkul' => $request->namamatkul,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ]);
        return redirect()->route('matakuliah.index')->with('success', 'Data matakuliah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();
        return redirect()->route('matakuliah.index')->with('success', 'Data matakuliah berhasil dihapus');
    }
}
