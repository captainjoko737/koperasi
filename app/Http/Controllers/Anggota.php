<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MAnggota;

class Anggota extends Controller
{
	public function index() {

		$anggota = MAnggota::all();
		// return $data;
		$data['result'] = $anggota;
		return view('anggota', $data);
	}
    //
}
