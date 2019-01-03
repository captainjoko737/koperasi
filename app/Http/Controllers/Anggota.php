<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MAnggota;
use App\MSimpananPokok;
use App\MSimpananWajib;
use App\MSimpananSukarela;
use App\MConfig;

class Anggota extends Controller
{
	public function index() {

		$anggota = MAnggota::where('status', '!=', 'Calon Anggota')->get();
		// return json_encode($anggota);
		foreach ($anggota as $key => $value) {
			$simpananPokok = MSimpananPokok::where('id_user', $value['id'])->first();
			$anggota[$key]['simpananPokok'] = $simpananPokok;
		}

		// return $anggota;
		$data['result'] = $anggota;
		return view('anggota', $data);
	}

	public function add() {

		$data['simpanan_pokok'] = MConfig::where('key', 'simpanan_pokok')->first();
		return view('anggota.add', $data);

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

		$simpananPokok = new MSimpananPokok;
		$simpananPokok->id_user = $anggota->id;
		$simpananPokok->tanggal = $request->tanggal;
		$simpananPokok->jumlah = $request->jumlah;

		$simpananPokok->save();

		$simpananWajib = new MSimpananWajib;
		$simpananWajib->id_user = $anggota->id;
		$simpananWajib->tanggal = $request->tanggal;
		$simpananWajib->jumlah = $request->simpanan_wajib;

		$simpananWajib->save();

		$simpananSukarela = new MSimpananSukarela;
		$simpananSukarela->id_user = $anggota->id;
		$simpananSukarela->tanggal = $request->tanggal;
		$simpananSukarela->jumlah = $request->simpanan_sukarela;

		$simpananSukarela->save();

		return redirect()->route('anggota');
	}

	public function edit(request $request) {

		// return $request->id;
		$anggota = MAnggota::where('id', $request->id)->first();
		// return $anggota;
		$data['result'] = $anggota;

		return view('anggota.edit', $data);	
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

		return redirect()->route('anggota');
	}

	public function drop(request $request) {

		// return $request->all();


		$data = MAnggota::where('id', $request->id)->first();

		// return $data;

		$data->delete();

		return redirect()->route('anggota');
	}




    //
}
