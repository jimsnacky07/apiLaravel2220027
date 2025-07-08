<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'krs_id' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,sakit,izin',
            'mahasiswa_id' => 'required',
        ]);

        $absen = Absensi::create($data);

        return response()->json([
            'message' => 'Absensi berhasil!',
            'data' => $absen
        ], 200);
    }
}
