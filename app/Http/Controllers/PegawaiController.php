<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $request){
        return $request->segment(2);
    }

    public function formulir(){
        return view('formulir');
    }

    public function proses(Request $request){
        // Custom messages untuk validasi
        $messages = [
            'required' => ':attribute wajib diisi.',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
            'alpha' => ':attribute hanya boleh berisi huruf.',
        ];

        // Menentukan pesan validasi untuk kolom input
        $this->validate($request, [
            'nama' => 'required|min:5|max:20',
            'alamat' => 'required|alpha'
        ], $messages);

        // Mengambil nilai input yang valid
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        return ["Nama" => $nama, "Alamat" => $alamat];
    }
}
