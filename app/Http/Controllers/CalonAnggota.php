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
    //
}
