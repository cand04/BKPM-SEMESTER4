<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendidikanController extends Controller
{
    // Menampilkan data pendidikan
    public function index()
    {
        $pendidikan = DB::table('pendidikan')->get();
        return view('pendidikan.index', compact('pendidikan'));
    }

    // Menampilkan form untuk menambah data pendidikan
    public function create()
    {
        return view('pendidikan.create');
    }

    // Menyimpan data pendidikan baru
    public function store(Request $request)
    {
        DB::table('pendidikan')->insert([
            'nama' => $request->nama,
            'tahun' => $request->tahun,
            'jurusan' => $request->jurusan,
        ]);

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data pendidikan berhasil disimpan.');
    }

    // Menampilkan form untuk mengedit data pendidikan
    public function edit($id)
    {
        $pendidikan = DB::table('pendidikan')->where('id', $id)->first();
        return view('pendidikan.edit', compact('pendidikan'));
    }

    // Mengupdate data pendidikan
    public function update(Request $request, $id)
    {
        DB::table('pendidikan')->where('id', $id)->update([
            'nama' => $request->nama,
            'tahun' => $request->tahun,
            'jurusan' => $request->jurusan,
        ]);

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data pendidikan berhasil diupdate.');
    }

    // Menghapus data pendidikan
    public function destroy($id)
    {
        DB::table('pendidikan')->where('id', $id)->delete();
        return redirect()->route('pendidikan.index')
            ->with('success', 'Data pendidikan berhasil dihapus.');
    }
}
