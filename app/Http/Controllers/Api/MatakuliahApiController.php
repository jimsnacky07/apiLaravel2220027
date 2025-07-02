<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Matakuliah::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required|unique:matakuliahs',
            'namamatkul' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required',
        ]);
        return Matakuliah::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Matakuliah $matakuliah)
    {
        return $matakuliah;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        $data = $request->validate([
            'kode' => 'required|unique:matakuliahs,kode,' . $matakuliah->id,
            'namamatkul' => 'required',
            'sks' => 'required|integer',
            'semester' => 'required',
        ]);
        $matakuliah->update($data);
        return $matakuliah;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
