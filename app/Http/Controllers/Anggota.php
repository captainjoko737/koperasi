<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MAnggota;

class Anggota extends Controller
{
	public function index() {

		$anggota = MAnggota::all();
		// return $anggota;
		$data['result'] = $anggota;
		return view('anggota', $data);
	}

	public function add() {

		return view('anggota.add');

	}

	public function create(request $request) {

		// return $request->all();
		$anggota = new MAnggota;

		$anggota->nama = $request->nama;
		$anggota->ttl = $request->ttl;
		$anggota->jenis_kelamin = $request->jenis_kelamin;
		$anggota->alamat = $request->alamat;
		$anggota->telepon = $request->telepon;
		$anggota->email = $request->email;
		$anggota->status = $request->status;

		$anggota->save();
	}

	public function edit() {

		return view('anggota.edit');
	}




    //
}
