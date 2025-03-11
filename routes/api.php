<?php

use App\Http\Controllers\Backend\ApiPendidikanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Middleware autentikasi untuk endpoint /user
Route::middleware('auth:api')->get('/user', function(Request $request) {
    return $request->user();
});

// Rute API dengan prefix 'v1'
Route::prefix('v1')->group(function() {
    Route::get('/api_pendidikan', [ApiPendidikanController::class, 'getAll']);  // Mendapatkan semua data pendidikan
    Route::get('/api_pendidikan/{id}', [ApiPendidikanController::class, 'getPen']);  // Mendapatkan data pendidikan berdasarkan ID
    Route::post('/api_pendidikan', [ApiPendidikanController::class, 'createPen']);  // Menambahkan data pendidikan baru
    Route::put('/api_pendidikan/{id}', [ApiPendidikanController::class, 'updatePen']);  // Memperbarui data pendidikan
    Route::delete('/api_pendidikan/{id}', [ApiPendidikanController::class, 'deletePen']);  // Menghapus data pendidikan
});
