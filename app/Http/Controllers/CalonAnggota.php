<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MAnggota;
use App\MSimpananPokok;
use App\MConfig;

class CalonAnggota extends Controller
{
	public function index() {

		$CalonAnggota = MAnggota::where('status', '=', 'Calon Anggota')->get();
		
		foreach ($CalonAnggota as $key => $value) {
			$simpananPokok = MSimpananPokok::where('id_user', $value['id'])->first();
			$CalonAnggota[$key]['simpananPokok'] = $simpananPokok;
		}
		
		$data['result'] = $CalonAnggota;
		return view('CalonAnggota', $data);
	}

	public function edit(request $request) {

		// return $request->id;
		$anggota = MAnggota::where('id', $request->id)->first();
		// return $anggota;
		$data['result'] = $anggota;

		return view('CalonAnggota.edit', $data);
	}	

	public function save(request $request) {

		// return $request->id;
		$anggota = MAnggota::where('id', $request->id)->first();
		// return $anggota;
		$anggota->nama = $request->nama;
		$anggota->ttl = $request->ttl;
		$anggota->jenis_kelamin = $request->jenis_kelamin;
		$anggota->alamat = $request->alamat;
		$anggota->telepon = $request->telepon;
		$anggota->email = $request->email;
		$anggota->status = $request->status;

		$anggota->save();

		return redirect()->route('CalonAnggota');
	}
    
}
