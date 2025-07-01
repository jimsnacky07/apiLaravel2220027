<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = Dosen::all();
        return view('dosen.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:dosens',
            'nama' => 'required',
            'email' => 'required|email|unique:dosens',
            'telepon' => 'nullable',
            'alamat' => 'nullable',
        ]);
        Dosen::create($request->all());
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan');
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
    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nip' => 'required|unique:dosens,nip,' . $dosen->id,
            'nama' => 'required',
            'email' => 'required|email|unique:dosens,email,' . $dosen->id,
            'telepon' => 'nullable',
            'alamat' => 'nullable',
        ]);
        $dosen->update($request->all());
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus');
    }
}
