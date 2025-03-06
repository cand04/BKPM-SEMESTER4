<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengalamanKerja; // Pastikan model PengalamanKerja diimport

class PengalamanKerjaController extends Controller
{
    public function index()
    {
        // Ambil semua data pengalaman kerja
        $pengalaman_kerja = PengalamanKerja::all();  
        return view('backend.pengalaman_kerja.index', compact('pengalaman_kerja'));
    }

    public function create()
    {
        return view('backend.pengalaman_kerja.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|min:3',
            'jabatan' => 'required|min:2',
            'tahun_masuk' => 'required|digits:4',
            'tahun_keluar' => 'required|digits:4',
        ]);

        // Simpan data pengalaman kerja
        PengalamanKerja::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);

        return redirect()->route('pengalaman_kerja.index')->with('success', 'Data pengalaman kerja berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data pengalaman kerja untuk diubah
        $pengalaman_kerja = PengalamanKerja::find($id);
        return view('backend.pengalaman_kerja.edit', compact('pengalaman_kerja'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|min:3',
            'jabatan' => 'required|min:2',
            'tahun_masuk' => 'required|digits:4',
            'tahun_keluar' => 'required|digits:4',
        ]);

        // Update data pengalaman kerja
        $pengalaman_kerja = PengalamanKerja::find($id);
        $pengalaman_kerja->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);

        return redirect()->route('pengalaman_kerja.index')->with('success', 'Data pengalaman kerja berhasil diupdate.');
    }

    public function destroy($id)
    {
        // Hapus data pengalaman kerja
        $pengalaman_kerja = PengalamanKerja::find($id);
        $pengalaman_kerja->delete();

        return redirect()->route('pengalaman_kerja.index')->with('success', 'Data pengalaman kerja berhasil dihapus.');
    }
}
