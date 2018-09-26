<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MAnggota;

class CalonAnggota extends Controller
{
	public function index() {
		$CalonAnggota = MAnggota::all();
		// return $anggota;
		$data['result'] = $CalonAnggota;
		return view('CalonAnggota', $data);
	}
    //
}
