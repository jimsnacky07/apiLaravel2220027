<?php

use App\Http\Controllers\Api\BukuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\MahasiswaController;
use App\Http\Controllers\Api\MobilController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MatakuliahApiController;
use App\Http\Controllers\Api\DosenApiController;
use App\Http\Controllers\Api\KrsApiController;

Route::apiResource('produks', ProdukController::class);
Route::apiResource('mahasiswa', MahasiswaController::class);
Route::apiResource('mobil', MobilController::class);
Route::apiResource('buku', BukuController::class);
Route::apiResource('user', UserController::class);
Route::apiResource('matakuliah', MatakuliahApiController::class);
Route::apiResource('dosen', DosenApiController::class);
Route::apiResource('krs', KrsApiController::class);
