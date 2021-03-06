<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MAnggota;
use App\MSimpananPokok;
use App\MConfig;
use App\User;
use Auth;

class Karyawan extends Controller
{
	public function index() {
		
		$karyawan = User::get();
		// return ';
		// foreach ($karyawan as $key => $value) {
		// 	$simpananPokok = MSimpananPokok::where('id_user', $value['id'])->first();
		// 	$karyawan[$key]['simpananPokok'] = $simpananPokok;
		// }

		$data['result'] = $karyawan;
		return view('karyawan', $data);
	}

	public function add() {

		$data['simpanan_pokok'] = MConfig::where('key', 'simpanan_pokok')->first();
		return view('Karyawan.add', $data);
	}

	public function create(request $request) {

		// $anggota = new MAnggota;

		// $anggota->nama = $request->nama;
		// $anggota->ttl = $request->ttl;
		// $anggota->jenis_kelamin = $request->jenis_kelamin;
		// $anggota->alamat = $request->alamat;
		// $anggota->telepon = $request->telepon;
		// $anggota->email = $request->email;
		// $anggota->status = 'aktif';

		// $anggota->save();

		// $simpananPokok = new MSimpananPokok;
		// $simpananPokok->id_user = $anggota->id;
		// $simpananPokok->tanggal = $request->tanggal;
		// $simpananPokok->jumlah = $request->jumlah;

		// $simpananPokok->save();

		$karyawan = new User;

		if ($request->jabatan == 'Juru Bayar') {
			$jabatan = 'karyawan';
		}else{
			$jabatan = 'accounting';
		}

		$karyawan->nama = $request->nama;
		$karyawan->email = $request->email;
		$karyawan->password = bcrypt($request->password);
		$karyawan->ttl = $request->ttl;
		$karyawan->jenis_kelamin = $request->jenis_kelamin;
		$karyawan->telepon = $request->telepon;
		$karyawan->jabatan = $request->jabatan;
		$karyawan->status_user = $jabatan;
		$karyawan->status = 'aktif';

		$karyawan->save();

		return redirect()->route('karyawan');
	}

	public function save(request $request) {

		// return $request->id;
		$anggota = User::where('id', $request->id)->first();
		 // return $anggota;
		$anggota->nama = $request->nama;
		$anggota->ttl = $request->ttl;
		$anggota->jenis_kelamin = $request->jenis_kelamin;
		$anggota->telepon = $request->telepon;
		$anggota->email = $request->email;
		$anggota->password = bcrypt($request->password);
		$anggota->status = 'Karyawan';

		$anggota->save();

		return redirect()->route('karyawan');
	}

	public function edit(request $request) {

		$anggota = User::where('id', $request->id)->first();
		
		$data['result'] = $anggota;

		return view('Karyawan.edit', $data);	
	}

	public function drop(request $request) {

		$data = User::where('id', $request->id)->first();

		$data->delete();

		return redirect()->route('karyawan');
	}
    
}
