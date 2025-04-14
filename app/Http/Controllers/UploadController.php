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
 
     public function proses_upload(Request $request)
     {
         $this->validate($request, [
             'file' => 'required',
             'keterangan' => 'required',
         ]);
 
         // menyimpan data file yang diupload ke variabel $file
         $file = $request->file('file');
 
         // nama file
         echo 'File Name: ' . $file->getClientOriginalName() . '<br>';
 
         // ekstensi file
         echo 'File Extension: ' . $file->getClientOriginalExtension() . '<br>';
 
         // real path
         echo 'File Real Path: ' . $file->getRealPath() . '<br>';
 
         // ukuran file
         echo 'File Size: ' . $file->getSize() . '<br>';
 
         // tipe mime
         echo 'File Mime Type: ' . $file->getMimeType();
 
         // isi dengan nama folder tempat kemana file diupload
         $tujuan_upload = 'data_file';
 
         // upload file
         $file->move($tujuan_upload, $file->getClientOriginalName());
     }
 
     public function resize_upload(Request $request)
     {
         $this->validate($request, [
             'file' => 'required',
             'keterangan' => 'required',
         ]);
 
         // TENTUKAN PATH LOKASI UPLOAD
         $path = public_path('img/logo');
 
         // JIKA FOLDERNYA BELUM ADA
         if (!File::isDirectory($path)) {
             // MAKA FOLDER TERSEBUT AKAN DIBUAT
             File::makeDirectory($path, 0777, true);
         }
 
         // MENGAMBIL FILE IMAGE DARI FORM
         $file = $request->file('file');
 
         // MEMBUAT NAME FILE DARI GABUNGAN TANGGAL DAN UNIQID()
         $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();
 
         // MEMBUAT CANVAS IMAGE SEBESAR DIMENSI
         $canvas = Image::canvas(200, 200);
 
         // RESIZE IMAGE SESUAI DIMENSI DENGAN MEMPERTAHANKAN RATIO
         $resizeImage = Image::make($file)->resize(null, 200, function ($constraint) {
             $constraint->aspectRatio();
         });
 
         // MEMASUKAN IMAGE YANG TELAH DIRESIZE KE DALAM CANVAS
         $canvas->insert($resizeImage, 'center');
 
         // SIMPAN IMAGE KE FOLDER
         if ($canvas->save($path . '/' . $fileName)) {
             return redirect(route('upload'))->with('success', 'Data berhasil ditambahkan!');
         } else {
             return redirect(route('upload'))->with('error', 'Data gagal ditambahkan!');
         }
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

    public function pdf_upload()
{
    return view('pdf_upload');
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
