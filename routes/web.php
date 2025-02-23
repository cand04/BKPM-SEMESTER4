<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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

//acara 6
Route::get('/home', function () {
    return view('home');
});
Route::get('/home', [ManagementUserController::class, 'index']);

//acara7
route::group(['namespace' => 'App\Http\Controllers\frontend'], function()
{
    route::resource('home', 'HomeController');
});