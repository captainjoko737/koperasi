<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MAnggota;
use App\MSimpananPokok;
use App\MSimpananWajib;
use App\MConfig;

class SimpananWajib extends Controller
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
		return view('SimpananWajib', $data);
	}

	public function detail(request $request) {

		$anggota = MSimpananWajib::where('id_user', '=', $request->id)->get();
		// return json_encode($anggota);
		// foreach ($anggota as $key => $value) {
		// 	$simpananWajib = MSimpananPokok::where('id_user', $value['id'])->first();
		// 	$anggota[$key]['simpananPokok'] = $simpananPokok;
		// }

		// return $anggota;
		$data['result'] = $anggota;
		 // return $data;
		return view('SimpananWajib.detail', $data);
	}

	public function edit(request $request) {

		// return $request->id;
		$simpananWajib = MSimpananWajib::where('id_user', $request->id_user)->first();
		// return $anggota;
		$data['result'] = $simpananWajib;

		return view('SimpananWajib.edit', $data);	
	}

	public function add() {

		$data['simpanan_pokok'] = MSimpananWajib::where('id_user', 'simpanan_pokok')->first();
		return view('SimpananWajib.add', $data);

	}

	public function create(request $request) {

		 // return $request->all();
		$simpananWajib = new MSimpananWajib;

		$simpananWajib->id_user = $request->id_user;
		$simpananWajib->jumlah = $request->jumlah;
		$simpananWajib->tanggal = $request->tanggal;
		

		$simpananWajib->save();


		return redirect()->route('SimpananWajib.detail', ['id' => $request->id_user]);
	}

	public function save(request $request) {

		  // return $request->id;
		$simpananWajib = MSimpananWajib::where('jumlah', $request->jumlah)->first();
		   return $simpananWajib;
		
		$simpananWajib->jumlah = $request->jumlah;
		$simpananWajib->tanggal = $request->tanggal;
		

		$simpananWajib->save();

		return redirect()->route('SimpananWajib.detail', ['jumlah' => $request->jumlah]);
	}

	public function drop(request $request) {

		// return $request->all();


		$data = MSimpananWajib::where('id_user', $request->id_user)->first();

		// return $data;

		$data->delete();

		return redirect()->route('SimpananWajib.detail', ['id' => $request->id_user]);
	}



    
}
