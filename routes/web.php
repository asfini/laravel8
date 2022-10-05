<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//merouting tampilan aplikasi yang kita request
// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('/siswa', function () {
//      return view('siswa');
// });

//menambahkan array title
// Route::get('/', function () {
//     return view('dashboard',[
//         'page_title' => "Dashboard"
//     ]);
// });
// Route::get('/siswa', function () {
//     return view('siswa/siswa',[
//         'page_title' => "Siswa"
//     ]);
// });

// Route::get('/guru', function(){
//     return view('guru/guru',[
//         'page_title' => "Guru"
//     ]);
// });



Route::get('/', function () {
return view('dashboard',[
'page_title' => "Dashboard"
]);
})->middleware('auth');

Route::resource('siswa',SiswaController::class)->middleware('auth');
Route::resource('guru',GuruController::class)->middleware('auth');

route::get('/registrasi',[LoginController::class,'registrasi'])->name('registrasi');
route::post('/simpanRegistrasi',[LoginController::class,'simpanRegistrasi'])->name('simpanRegistrasi');
route::get('/login',[LoginController::class,'halamanlogin'])->name('login')->middleware('guest');
route::post('/prosesLogin',[LoginController::class,'prosesLogin'])->name('prosesLogin');
route::get('/logout',[LoginController::class,'logout'])->name('logout');
