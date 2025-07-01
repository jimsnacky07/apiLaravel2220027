<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Dosen::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nidn' => 'required|unique:dosens',
            'namadosen' => 'required',
            'email' => 'required|email|unique:dosens',
            'telepon' => 'nullable',
            'alamat' => 'nullable',
        ]);
        return Dosen::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        return $dosen;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $data = $request->validate([
            'nidn' => 'required|unique:dosens,nidn,' . $dosen->id,
            'namadosen' => 'required',
            'email' => 'required|email|unique:dosens,email,' . $dosen->id,
            'telepon' => 'nullable',
            'alamat' => 'nullable',
        ]);
        $dosen->update($data);
        return $dosen;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return response()->json(['message' => 'Deleted']);
    }
}