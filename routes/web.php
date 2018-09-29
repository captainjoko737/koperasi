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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')->name('landingpage');
Route::get('/anggota', 'Anggota@index')->name('anggota');
Route::get('/anggota/add', 'Anggota@add')->name('anggota.add');
Route::get('/anggota/create', 'Anggota@create')->name('anggota.create');
Route::get('/anggota/edit', 'Anggota@edit')->name('anggota.edit');
Route::get('/anggota/save', 'Anggota@save')->name('anggota.save');
Route::get('/anggota/delete', 'Anggota@drop')->name('anggota.delete');


Route::get('/pengurus', 'Pengurus@index')->name('pengurus');
Route::get('/karyawan', 'Karyawan@index')->name('karyawan');
Route::get('/CalonAnggota', 'CalonAnggota@index')->name('CalonAnggota');
Route::get('/DataSimpananAnggota', 'DataSimpananAnggota@index')->name('DataSimpananAnggota');
Route::get('/DaftarTunggakan', 'DaftarTunggakan@index')->name('DaftarTunggakan');
Route::get('/JenisSimpanan', 'JenisSimpanan@index')->name('JenisSimpanan');
Route::get('/DataPinjaman', 'DataPinjaman@index')->name('DataPinjaman');
Route::get('/AngsuranTunggakan', 'AngsuranTunggakan@index')->name('AngsuranTunggakan');
Route::get('/bulanan', 'bulanan@index')->name('bulanan');
Route::get('/tahunan', 'tahunan@index')->name('tahunan');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('admin/admin','admin.admin');


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
