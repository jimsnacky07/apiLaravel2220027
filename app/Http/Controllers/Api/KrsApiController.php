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
}
