<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PengalamanKerja;

class PengalamanKerjaController extends Controller
{
    public function index()
    {
        // Ambil semua data pengalaman kerja menggunakan Eloquent ORM
        $pengalaman_kerja = PengalamanKerja::all();  
        return view('backend.pengalaman_kerja.index', compact('pengalaman_kerja'));
    }

    public function create()
    {
        return view('backend.pengalaman_kerja.create');
    }

    public function store(Request $request)
    {
        // Validasi input menggunakan Laravel's built-in validation
        $request->validate([
            'nama' => 'required|min:3',
            'jabatan' => 'required|min:2',
            'tahun_masuk' => 'required|digits:4',
            'tahun_keluar' => 'required|digits:4',
        ]);

        // Simpan data pengalaman kerja menggunakan Eloquent ORM
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
        // Ambil data pengalaman kerja berdasarkan ID menggunakan Eloquent ORM
        $pengalaman_kerja = PengalamanKerja::find($id);
        return view('backend.pengalaman_kerja.create', compact('pengalaman_kerja'));
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

        // Perbarui data pengalaman kerja berdasarkan ID menggunakan Eloquent ORM
        $pengalaman_kerja = PengalamanKerja::find($id);
        $pengalaman_kerja->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar
        ]);

        return redirect()->route('pengalaman_kerja.index')
            ->with('success', 'Pengalaman Kerja berhasil diperbaharui.');
    }

    public function destroy($id)
{
    // Hapus data pengalaman kerja menggunakan Query Builder
    DB::table('pengalaman_kerja')->where('id', $id)->delete();

    return redirect()->route('pengalaman_kerja.index')
        ->with('success', 'Data Pengalaman Kerja berhasil dihapus');
}
}
