<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MAnggota;

class Anggota extends Controller
{
	public function index() {

		$data = MAnggota::all();
		// return $data;
		$data['result'] = $data;
		return view('anggota', $data);
	}
    //
}
