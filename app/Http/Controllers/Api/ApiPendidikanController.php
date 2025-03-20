<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class ApiPendidikanController extends Controller
{
    public function getAll()
    {
        $pendidikan = Pendidikan::all();

        return response()->json([
            'success' => true,
            'message' => 'Data Pendidikan',
            'data' => $pendidikan
        ]);
    }

    public function getpen($id)
{
    // Mencari data Pendidikan berdasarkan ID yang diberikan
    $pendidikan = Pendidikan::find($id);

    // Memeriksa apakah data ditemukan
    if (!$pendidikan) {
        // Jika tidak ditemukan, kembalikan response JSON dengan status 404 (Not Found)
        return response()->json([
            'error' => 'Pendidikan dengan ID ' . $id . ' tidak ditemukan.'
        ], 404);
    }

    // Jika data ditemukan, kembalikan response JSON dengan data Pendidikan dan status 200 (OK)
    return response()->json($pendidikan, 200);
}

    public function createPen(Request $request)
{
    // Melakukan validasi data input dari request
    $request->validate([
        'nama' => 'required|string|max:255',
        'tingkatan' => 'required|integer',
        'tahun_masuk' => 'required|integer|min:1900|max:2099',
        'tahun_keluar' => 'required|integer|min:1900|max:2099',
    ]);

    // Menghindari jika 'tahun_keluar' lebih kecil dari 'tahun_masuk'
    if ($request->tahun_keluar < $request->tahun_masuk) {
        return response()->json([
            'success' => false,
            'message' => 'Tahun keluar tidak boleh lebih kecil dari tahun masuk.'
        ], 400);
    }

    try {
        // Membuat data pendidikan baru
        $pendidikan = Pendidikan::create([
            'nama' => $request->nama,
            'tingkatan' => $request->tingkatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);

        // Mengembalikan response JSON dengan status success dan data pendidikan yang baru dibuat
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambahkan!',
            'data' => $pendidikan
        ], 201);  // 201 HTTP status code menunjukkan bahwa resource telah dibuat
    } catch (\Exception $e) {
        // Jika terjadi error saat menyimpan data, mengembalikan response error
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan saat menyimpan data. ' . $e->getMessage()
        ], 500); // 500 HTTP status code untuk error server internal
    }
}


public function updatePen(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkatan' => 'required|integer',
            'tahun_masuk' => 'required|integer|min:1900|max:2099',
            'tahun_keluar' => 'required|integer|min:1900|max:2099',
        ]);

        $pendidikan = Pendidikan::find($id);
        if (!$pendidikan) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan!'], 404);
        }

        $pendidikan->update([
            'nama' => $request->nama,
            'tingkatan' => $request->tingkatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui!',
            'data' => $pendidikan
        ]);
    }

    // Hapus data pendidikan
    public function deletePen($id)
    {
        $pendidikan = Pendidikan::find($id);
        if (!$pendidikan) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan!'], 404);
        }

        $pendidikan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus!'
        ]);
    }
}