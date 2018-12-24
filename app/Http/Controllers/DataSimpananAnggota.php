<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MAnggota;
use App\MSimpananPokok;
use App\MSimpananWajib;
use App\MSimpananSukarela;

class DataSimpananAnggota extends Controller
{
	public function index() {

		$anggota = MAnggota::where('status', '!=', 'Calon Anggota')->get();
		
		foreach ($anggota as $key => $value) {

			$simpananPokok = MSimpananPokok::where('id_user', $value['id'])->get();
			$simpananSukarela = MSimpananSukarela::where('id_user', $value['id'])->get();
			$simpananWajib = MSimpananWajib::where('id_user', $value['id'])->get();

			$ss = 0;
			foreach ($simpananSukarela as $keys => $values) {
				$ss += $values['jumlah'];
			}

			$sp = 0;
			foreach ($simpananPokok as $keys => $values) {
				$sp += $values['jumlah'];
			}

			$sw = 0;
			foreach ($simpananWajib as $keys => $values) {
				$sw += $values['jumlah'];
			}

			$anggota[$key]['simpanan_pokok'] += $sp;
			$anggota[$key]['simpanan_sukarela'] += $ss;
			$anggota[$key]['simpanan_wajib'] += $sw;

			$totalSimpanan = $sp + $ss + $sw;

			$anggota[$key]['total_simpanan'] = $totalSimpanan;

		}

		$data['result'] = $anggota;
		
		return view('DataSimpananAnggota', $data);
	}
    //
}
