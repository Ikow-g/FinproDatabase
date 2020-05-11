<?php

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

Route::get('/', function () {
    return view('home');
});

Route::prefix('siswa')->group(function () {
    Route::get('','SiswaController@index');
    Route::post('tambah','SiswaController@add')->name('tambah.siswa');
    Route::get('delete/{id_siswa}','SiswaController@delete');
    Route::post('update','SiswaController@update')->name('update.siswa');
});

Route::prefix('absensi')->group(function () {
Route::get('','AbsenController@index');
Route::get('{id_kelas}','AbsenController@view_absen')->name('kelas.absen');
Route::get('tambah/{id_kelas}/{date}','AbsenController@view_siswa');
Route::post('tambah','AbsenController@add');
Route::get('delete/{id}','AbsenController@del');
Route::post('update','AbsenController@update')->name('update.Absen');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
