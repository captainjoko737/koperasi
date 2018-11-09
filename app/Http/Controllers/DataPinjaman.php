<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\MAplikasiPinjaman;
use App\MAnggota;
use App\MPinjaman;
use App\MAngsuran;

class DataPinjaman extends Controller
{
	public function index() {

		$data['result'] = MPinjaman::join('anggota', 'anggota.id', '=', 'pinjaman.id_user')
			->select('pinjaman.*', 'anggota.nama')
			->get();
		// return $data;
		return view('DataPinjaman', $data);
	}

	public function detail(request $request) {

        // return 'GOOD';

        $data['result'] = MAngsuran::where('id_pinjaman', $request['id'])->get();
    	
		return view('pinjaman.detail', $data);

    }
    
}
