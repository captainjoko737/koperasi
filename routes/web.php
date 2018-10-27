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


Route::group(['middleware' => 'auth'], function(){
	Route::get('/', 'HomeController@index')->name('login');

	Route::get('/anggota', 'Anggota@index')->name('anggota');
	Route::get('/anggota/add', 'Anggota@add')->name('anggota.add');
	Route::get('/anggota/create', 'Anggota@create')->name('anggota.create');
	Route::get('/anggota/edit', 'Anggota@edit')->name('anggota.edit');
	Route::get('/anggota/save', 'Anggota@save')->name('anggota.save');
	Route::get('/anggota/delete', 'Anggota@drop')->name('anggota.delete');

	Route::get('/CalonAnggota/edit', 'CalonAnggota@edit')->name('CalonAnggota.edit');
	Route::get('/CalonAnggota/save', 'CalonAnggota@save')->name('CalonAnggota.save');

	Route::get('/Karyawan/add', 'Karyawan@add')->name('Karyawan.add');
	Route::get('/Karyawan/save', 'Karyawan@save')->name('Karyawan.save');
	Route::get('/Karyawan/create', 'Karyawan@create')->name('Karyawan.create');
	Route::get('/Karyawan/edit', 'Karyawan@edit')->name('Karyawan.edit');
	Route::get('/Karyawan/delete', 'Karyawan@drop')->name('Karyawan.delete');

	Route::get('/SimpananWajib', 'SimpananWajib@index')->name('SimpananWajib');
	Route::get('/SimpananWajib/detail', 'SimpananWajib@detail')->name('SimpananWajib.detail');
	Route::get('/SimpananWajib/edit', 'SimpananWajib@edit')->name('SimpananWajib.edit');
	Route::get('/SimpananWajib/add', 'SimpananWajib@add')->name('SimpananWajib.add');
	Route::get('/SimpananWajib/create', 'SimpananWajib@create')->name('SimpananWajib.create');
	Route::get('/SimpananWajib/delete', 'SimpananWajib@drop')->name('SimpananWajib.delete');
	Route::get('/SimpananWajib/save', 'SimpananWajib@save')->name('SimpananWajib.save');


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
	

	Route::get('/home', 'HomeController@index')->name('home');

	Route::view('admin/admin','admin.admin');

	Route::get('/aplikasi_pinjaman', 'AplikasiPinjaman@index')->name('aplikasi_pinjaman');
	Route::get('/aplikasi_pinjaman/detail', 'AplikasiPinjaman@detail')->name('aplikasi_pinjaman.detail');
	Route::get('/aplikasi_pinjaman/add', 'AplikasiPinjaman@add')->name('aplikasi_pinjaman.add');
	Route::get('/aplikasi_pinjaman/create', 'AplikasiPinjaman@create')->name('aplikasi_pinjaman.create');
	Route::get('/aplikasi_pinjaman/tangani', 'AplikasiPinjaman@tangani')->name('aplikasi_pinjaman.tangani');
	Route::get('/aplikasi_pinjaman/edit', 'AplikasiPinjaman@edit')->name('aplikasi_pinjaman.edit');
	Route::get('/aplikasi_pinjaman/save', 'AplikasiPinjaman@save')->name('aplikasi_pinjaman.save');
	Route::get('/aplikasi_pinjaman/delete', 'AplikasiPinjaman@drop')->name('aplikasi_pinjaman.delete');

	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

});

Auth::routes();


