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
		
		foreach ($anggota as $key => $value) {
			$simpananWajib = MSimpananWajib::where('id_user', $value['id'])->get();

			$sw = 0;
			foreach ($simpananWajib as $keys => $values) {
				$sw += $values['jumlah'];
			}

			$anggota[$key]['simpanan_wajib'] += $sw;
		}

		$data['result'] = $anggota;

		return view('SimpananWajib', $data);
	}

	public function detail(request $request) {

		$anggota = MSimpananWajib::where('id_user', '=', $request->id)
			->join('anggota', 'anggota.id', '=', 'simpanan_wajib.id_user')
			->select('simpanan_wajib.*', 'anggota.nama')
			->get();
// return $anggota;
		$data['result'] = $anggota;
		$data['id'] = $request->id;
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

	public function add(request $request) {
// return $request->all();

		$anggota = MAnggota::where('id', $request->id)->first();

		// return $anggota;
		$data['anggota'] = $anggota;
		$data['simpanan_wajib'] = MConfig::where('key', 'simpanan_wajib')->first();
// return $data;
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

		$simpananWajib = MSimpananWajib::where('jumlah', $request->jumlah)->first();
		   return $simpananWajib;
		
		$simpananWajib->jumlah = $request->jumlah;
		$simpananWajib->tanggal = $request->tanggal;
		

		$simpananWajib->save();

		return redirect()->route('SimpananWajib.detail', ['jumlah' => $request->jumlah]);
	}

	public function drop(request $request) {

		$data = MSimpananWajib::where('id', $request->id)->first();

		$data->delete();

		return redirect()->route('SimpananWajib.detail', ['id' => $request->id_user]);
	}



    
}
