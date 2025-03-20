<?php

use App\Http\Controllers\Backend\ApiPendidikanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PengalamanKerjaController;
use App\Http\Controllers\Backend\PendidikanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\UploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route untuk home page
// Route::get('/', function () {
//     return view('hello_world'); // Atau view lainnya
// });

// Route lainnya

// Route::get('/foo', function () {
//     return 'Hello, world!';
// });

// Route::get('/foo/{id}', function ($id) {
//     return 'User = ' . $id;
// });

// Route::get('/profile', function () {
//     return view('profile', [
//         'nama'  => 'Candra Puji Utama',
//         'nim'   => 'E41231578',
//         'prodi' => 'Teknik Informatika'
//     ]);
// });

// Route::get('/user/{name?}', function ($name = 'Guest') {
//     return "Hello, $name!";
// });

// Route::get('/user/name/{name}', function ($name) {
//     return "Hello, $name!";
// })->where('name', '[A-Za-z]+');

// Route::get('/user/id/{id}', function ($id) {
//     return "User ID: $id";
// })->where('id', '[0-9]+');

// Route::get('/user/details/{id}/{name}', function ($id, $name) {
//     return "User ID: $id, Name: $name";
// })->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);

// Route::get('/search/{query}', function ($query) {
//     return "Search result for: $query";
// })->where('query', '.*');

// // Redirect Route
// Route::redirect('/coba', '/sini');

// // Route untuk profile
// Route::get('/user/profile', [UserController::class, 'show'])->name('profile.user');

// // acara 5
// // Mendefinisikan rute untuk 'user' yang mengarah ke metode 'index' dari controller 'ManagementUserController'
// Route::get('user', [ManagementUserController::class, 'index']); 

// // Jika Anda ingin menggunakan resource controller untuk user, gunakan Route::resource
// Route::resource('user', ManagementUserController::class);

// // Rute untuk halaman depan aplikasi
// Route::get('/', function () {
//     return view('welcome');
// });

// acara 6
// Route::get('/home', function () {
//     return view('home');
// });
// Route::get('/home', [ManagementUserController::class, 'index']);

//acara7
route::group(['namespace' => 'App\Http\Controllers\frontend'], function()
{
    route::resource('homem', 'HomeController');
});

//Acara 8
Route::get('/dashboard', [DashboardController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//acara 11
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//acara 13 & 14
Route::resource('dashboard', DashboardController::class);
Route::resource('pendidikan', PendidikanController::class);
Route::resource('pengalaman_kerja', PengalamanKerjaController::class);

//acara 15 & 16
Route::resource('dashboard', App\Http\Controllers\Backend\DashboardController::class);
Route::resource('pendidikan', App\Http\Controllers\Backend\PendidikanController::class);

//acara 17 & 18
Route::get('/session/create', [SessionController::class, 'create']);
Route::get('/session/show', [SessionController::class, 'show']);
Route::get('/session/delete', [SessionController::class,'delete']);

Route::get('/pegawai/{nama}', [PegawaiController::class, 'index']);
Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::post('/formulir/proses', [PegawaiController::class, 'proses']);


Route::post('/formulir/proses', [PegawaiController::class, 'proses']);
Route::get('/cobaerror/{nama?}', [CobaController::class, 'index']);

//acara 19
Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
Route::post('/upload/proses', [UploadController::class, 'proses_upload'])->name('upload.proses');
Route::post('/upload/resize', [UploadController::class, 'resize_upload'])->name('upload.resize');

//acara 20
// Route untuk halaman upload dengan Dropzone
Route::get('/dropzone', [UploadController::class, 'dropzone'])->name('dropzone');

// Route untuk meng-handle upload gambar dengan Dropzone
Route::post('/dropzone/store', [UploadController::class, 'dropzone_store'])->name('dropzone.store');

// Route untuk upload file PDF
Route::post('/pdf/store', [UploadController::class, 'pdf_store'])->name('pdf.store');


// // acara 21
// Route::middleware('auth:api')->get('/user', function(Request $request) {
//     return $request->user();
// });
// Route::group(['namespace' => 'Backend'], function () {
//     Route::get('/api_pendidikan', [ApiPendidikanController::class, 'getAll']);
//     Route::get('/api_pendidikan{id}', [ApiPendidikanController::class, 'getPen']);
//     Route::post('/api_pendidikan', [ApiPendidikanController::class, 'createPen']);
//     Route::put('/api_pendidikan{id}', [ApiPendidikanController::class, 'updatePen']);
//     Route::delete('/api_pendidikan/{id}', [ApiPendidikanController::class, 'delete'])
// })