<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendidikan;

class PendidikanController extends Controller
{
    public function index()
    {
        // Ambil semua data pendidikan
        $pendidikan = Pendidikan::all();

        // Array mapping untuk tingkatan
        $tingkatanMapping = [
            '1' => 'TK',
            '2' => 'SD',
            '3' => 'SMP',
            '4' => 'SMK',
            '5' => 'S1',
            '6' => 'S2',
            '7' => 'S3',
        ];

        // Mengubah tingkatan menjadi nama yang sesuai
        foreach ($pendidikan as &$item) {
            // Cek dan ganti tingkatan dengan nama yang sesuai dari mapping
            $item->tingkatan = $tingkatanMapping[$item->tingkatan] ?? 'Unknown';
        }

        // Kembalikan ke view dengan data pendidikan yang sudah dimodifikasi
        return view('backend.pendidikan.index', compact('pendidikan'));
    }

    public function create()
    {
        return view('backend.pendidikan.create');
    }

    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkatan' => 'required|string',
            'tahun_masuk' => 'required|integer',
            'tahun_keluar' => 'nullable|integer',
        ]);

        // Simpan data pendidikan baru
        Pendidikan::create($request->all());

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data Pendidikan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);

        return view('backend.pendidikan.edit', compact('pendidikan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input data
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkatan' => 'required|string',
            'tahun_masuk' => 'required|integer',
            'tahun_keluar' => 'nullable|integer',
        ]);

        // Update data pendidikan
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->update($request->all());

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data Pendidikan berhasil diperbarui.');
    }

    public function destroy(Pendidikan $pendidikan)
    {
        // Hapus data pendidikan
        $pendidikan->delete();
        return redirect()->route('pendidikan.index')
            ->with('success', 'Data Pendidikan berhasil dihapus.');
    }
}
