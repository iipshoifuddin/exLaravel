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

//route CRUD
Route::get('/pegawai','PegawaiController@index');
Route::get('/pegawai/tambah','PegawaiController@tambah');
Route::post('/pegawai/store','PegawaiController@store');
Route::get('/pegawai/edit/{id}','PegawaiController@edit');
Route::post('/pegawai/update','PegawaiController@update');
Route::get('/pegawai/hapus/{id}','PegawaiController@hapus');

//ORM
Route::get('/pegawai2', 'PegawaiControllerOrm@index');
Route::get('/pegawai2/tambah','PegawaiControllerOrm@tambah');
Route::post('/pegawai2/store','PegawaiControllerOrm@store');
Route::get('/pegawai2/edit/{pegawai_id}','PegawaiControllerOrm@edit');
Route::post('/pegawai2/update','PegawaiControllerOrm@update');
Route::get('/pegawai2/hapus/{id}','PegawaiControllerOrm@hapus');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
