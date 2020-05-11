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
    return view('welcome');
});

//Guru
Route::get('/teacher', 'TeacherController@index')->name('teacher.index');
Route::get('/teacher/add', 'TeacherController@add')->name('teacher.add_page');
Route::POST('/teacher/add/store', 'TeacherController@store')->name('teacher.add');
//Siswa

//gaji
Route::get('/gaji', 'PaymentController@index')->name('payment.index');
Route::get('/gaji/add', 'PaymentController@add_page')->name('payment.add');
Route::POST('/gaji/store', 'PaymentController@store')->name('payment.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
