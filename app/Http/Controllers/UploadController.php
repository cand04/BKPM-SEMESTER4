<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function dropzone()
    {
        return view('dropzone');
    }

    // Proses Upload Gambar dengan Dropzone
    public function dropzone_store(Request $request)
    {
        // Ambil file yang diupload
        $image = $request->file('file');

        // Tentukan folder tujuan
        $folderPath = public_path('img/dropzone');

        // Jika folder belum ada, buat foldernya
        if (!File::isDirectory($folderPath)) {
            File::makeDirectory($folderPath, 0775, true); // Buat folder dengan izin 0775
        }

        // Buat nama file berdasarkan waktu untuk menghindari duplikasi
        $imageName = time() . '.' . $image->extension();

        // Pindahkan file ke folder tujuan
        $image->move($folderPath, $imageName);

        // Kembalikan nama file dalam respons JSON
        return response()->json(['success' => $imageName]);
    }

    // Proses upload file PDF
    public function pdf_store(Request $request)
    {
        $pdf = $request->file('file');

        // Nama file PDF yang diupload
        $pdfName = 'pdf_' . time() . '.' . $pdf->extension();

        // Pindahkan file PDF ke folder yang sesuai
        $pdf->move(public_path('pdf/dropzone'), $pdfName);

        return response()->json(['success' => $pdfName]);
    }
}
