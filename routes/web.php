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
	Route::get('/anggota/keluar/print', 'Anggota@printKeluar')->name('anggota.keluar.print');
	Route::get('/anggota/keluar', 'Anggota@keluar')->name('anggota.keluar');
	Route::get('/anggota/konfirmasi/keluar', 'Anggota@konfirmasiKeluar')->name('anggota.konfirmasi.keluar');
	Route::delete('/anggota/delete', 'Anggota@drop')->name('anggota.delete');

	

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

	Route::get('/SimpananSukarela/create', 'SimpananSukarela@create')->name('SimpananSukarela.create');
	Route::get('/SimpananSukarela/detail', 'SimpananSukarela@detail')->name('SimpananSukarela.detail');
	Route::get('/SimpananSukarela/edit', 'SimpananSukarela@edit')->name('SimpananSukarela.edit');
	Route::get('/SimpananSukarela/add', 'SimpananSukarela@add')->name('SimpananSukarela.add');
	Route::get('/SimpananSukarela/delete', 'SimpananSukarela@drop')->name('SimpananSukarela.delete');


	Route::get('/pengurus', 'Pengurus@index')->name('pengurus');
	Route::get('/karyawan', 'Karyawan@index')->name('karyawan');
	Route::get('/CalonAnggota', 'CalonAnggota@index')->name('CalonAnggota');
	Route::get('/DataSimpananAnggota', 'DataSimpananAnggota@index')->name('DataSimpananAnggota');
	Route::get('/DaftarTunggakan', 'DaftarTunggakan@index')->name('DaftarTunggakan');
	Route::get('/SimpananSukarela', 'SimpananSukarela@index')->name('SimpananSukarela');
	Route::get('/DataPinjaman', 'DataPinjaman@index')->name('DataPinjaman');
	Route::get('/AngsuranTunggakan', 'AngsuranTunggakan@index')->name('AngsuranTunggakan');
	Route::get('/bulanan', 'Bulanan@index')->name('bulanan');
	Route::get('/bulanan/print', 'Bulanan@prints')->name('bulanan.print');
	Route::get('/tahunan', 'tahunan@index')->name('tahunan');
	Route::get('/tahunan/search', 'tahunan@search')->name('tahunan.search');
	

	Route::get('/home', 'HomeController@index')->name('home');

	Route::view('admin/admin','admin.admin');

	Route::get('/aplikasi_pinjaman', 'AplikasiPinjaman@index')->name('aplikasi_pinjaman');
	Route::get('/aplikasi_pinjaman/detail', 'AplikasiPinjaman@detail')->name('aplikasi_pinjaman.detail');
	Route::get('/aplikasi_pinjaman/add', 'AplikasiPinjaman@add')->name('aplikasi_pinjaman.add');
	Route::get('/aplikasi_pinjaman/create', 'AplikasiPinjaman@create')->name('aplikasi_pinjaman.create');
	Route::get('/aplikasi_pinjaman/tangani', 'AplikasiPinjaman@tangani')->name('aplikasi_pinjaman.tangani');
	Route::get('/aplikasi_pinjaman/proses_pinjaman', 'AplikasiPinjaman@prosesPinjaman')->name('aplikasi_pinjaman.proses_pinjaman');
	Route::get('/aplikasi_pinjaman/edit', 'AplikasiPinjaman@edit')->name('aplikasi_pinjaman.edit');
	Route::get('/aplikasi_pinjaman/save', 'AplikasiPinjaman@save')->name('aplikasi_pinjaman.save');
	Route::get('/aplikasi_pinjaman/delete', 'AplikasiPinjaman@drops')->name('aplikasi_pinjaman.delete');

	Route::get('/DataPinjaman/detail', 'DataPinjaman@detail')->name('pinjaman.detail');

	Route::get('/DataPinjaman/detail/print', 'DataPinjaman@detailPrint')->name('pinjaman.detail.print');
	Route::get('/bayar', 'DataPinjaman@bayar')->name('pinjaman.bayar');
	Route::get('/bayar/cepat', 'DataPinjaman@bayarCepat')->name('pinjaman.bayar.cepat');
	Route::get('/konfirmasi', 'DataPinjaman@konfirmasi')->name('pinjaman.konfirmasi');
	Route::get('/konfirmasi/cepat', 'DataPinjaman@konfirmasiCepat')->name('pinjaman.konfirmasi.cepat');
	Route::get('/print', 'DataPinjaman@prints')->name('pinjaman.print');
	Route::get('/print/cepat', 'DataPinjaman@printsCepat')->name('pinjaman.print.cepat');
	Route::get('/cetak', 'DataPinjaman@cetak')->name('pinjaman.cetak');
	Route::delete('/hapus', 'DataPinjaman@hapus')->name('pinjaman.hapus');

	Route::get('/pengaturan', 'Pengaturan@index')->name('pengaturan.index');
	Route::get('/pengaturan/detail', 'Pengaturan@detail')->name('pengaturan.detail');
	Route::get('/pengaturan/simpan', 'Pengaturan@save')->name('pengaturan.simpan');

	// Route::get('/DataPinjaman/print', 'DataPinjaman@print')->name('pinjaman.print');

	Route::get('/biling', 'Biling@index')->name('biling');
	Route::get('/biling/search', 'Biling@search')->name('biling.search');
	Route::get('/biling/post', 'Biling@post')->name('biling.post');


	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

});

Auth::routes();


