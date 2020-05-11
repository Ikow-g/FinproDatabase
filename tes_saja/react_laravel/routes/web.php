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

Route::get('/example', function () {
    return view('example');
})->name('example');

Route::get('/category', 'Api\CategoryController@index');
Route::post('/category/store', 'Api\CategoryController@store');
Route::delete('/category/delete/{id}', 'Api\CategoryController@delete');
Route::get('/category/edit/{id}', 'Api\CategoryController@edit');
Route::put('/category/update/{id}', 'Api\CategoryController@update');
