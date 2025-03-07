<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendidikan;

class PendidikanController extends Controller
{
    public function index()
{
    $pendidikan = Pendidikan::all();

    return view('backend.pendidikan.index', compact('pendidikan'));
}

    public function create()
    {
        return view('backend.pendidikan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkatan' => 'required|string',
            'tahun_masuk' => 'required|integer',
            'tahun_keluar' => 'nullable|integer',
        ]);

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
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkatan' => 'required|string',
            'tahun_masuk' => 'required|integer',
            'tahun_keluar' => 'nullable|integer',
        ]);

        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->update($request->all());

        return redirect()->route('pendidikan.index')
            ->with('success', 'Data Pendidikan berhasil diperbarui.');
    }

    public function destroy(Pendidikan $pendidikan)
    {
        $pendidikan->delete();
        return redirect()->route('pendidikan.index')
            ->with('success', 'Data Pendidikan berhasil dihapus.');
    }
}
