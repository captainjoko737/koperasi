<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MAnggota;
use App\MSimpananSukarela;

class SimpananSukarela extends Controller
{
	public function index() {

		$anggota = MAnggota::where('status', '!=', 'Calon Anggota')->get();
		
		foreach ($anggota as $key => $value) {
			$simpananSukarela = MSimpananSukarela::where('id_user', $value['id'])->get();

			$sw = 0;
			foreach ($simpananSukarela as $keys => $values) {
				$sw += $values['jumlah'];
			}

			$anggota[$key]['simpanan_sukarela'] += $sw;
		}

		$data['result'] = $anggota;

		return view('SimpananSukarela', $data);
	}

	public function detail(request $request) {

		$anggota = MSimpananSukarela::where('id_user', '=', $request->id)
			->join('anggota', 'anggota.id', '=', 'simpanan_sukarela.id_user')
			->select('simpanan_sukarela.*', 'anggota.nama')
			->get();
// return $anggota;
		$data['result'] = $anggota;
		$data['id'] = $request->id;
		 // return $data;
		return view('SimpananSukarela.detail', $data);
	}

	public function edit(request $request) {

		// return $request->id;
		$simpananSukarela = MSimpananSukarela::where('id_user', $request->id_user)->first();
		// return $anggota;
		$data['result'] = $simpananSukarela;

		return view('SimpananSukarela.edit', $data);	
	}

	public function add(request $request) {
// return $request->all();

		$anggota = MAnggota::where('id', $request->id)->first();

		// return $anggota;
		$data['anggota'] = $anggota;
		// $data['simpanan_sukarela'] = MConfig::where('key', 'simpanan_sukarela')->first();
// return $data;
		return view('SimpananSukarela.add', $data);

	}

	public function create(request $request) {

		 // return $request->all();
		$simpananSukarela = new MSimpananSukarela;

		$simpananSukarela->id_user = $request->id_user;
		$simpananSukarela->jumlah = $request->jumlah;
		$simpananSukarela->tanggal = $request->tanggal;
		

		$simpananSukarela->save();


		return redirect()->route('SimpananSukarela.detail', ['id' => $request->id_user]);
	}

	public function save(request $request) {

		$simpananSukarela = MSimpananSukarela::where('jumlah', $request->jumlah)->first();
		   return $simpananSukarela;
		
		$simpananSukarela->jumlah = $request->jumlah;
		$simpananSukarela->tanggal = $request->tanggal;
		

		$simpananSukarela->save();

		return redirect()->route('SimpananSukarela.detail', ['jumlah' => $request->jumlah]);
	}

	public function drop(request $request) {

		$data = MSimpananSukarela::where('id', $request->id)->first();

		$data->delete();

		return redirect()->route('SimpananSukarela.detail', ['id' => $request->id_user]);
	}



    
}
