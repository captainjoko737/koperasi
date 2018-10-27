<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\MAplikasiPinjaman;
use App\MAnggota;

class AplikasiPinjaman extends Controller
{
    
    public function index() {

    	$aplikasiPinjaman = MAplikasiPinjaman::all();

    	foreach ($aplikasiPinjaman as $key => $value) {
    		$anggota = MAnggota::where('id', $value['id_user'])->first();
    		$aplikasiPinjaman[$key]['nama'] = $anggota['nama'];
    	}

		$data['result'] = $aplikasiPinjaman;

		return view('aplikasiPinjaman.index', $data);

    }

    public function detail(request $request) {

    	$aplikasiPinjaman = MAplikasiPinjaman::where('id', $request['id'])->first();

    	$jumlahPinjaman = $aplikasiPinjaman['jumlah_diajukan'];
    	$bulanCicilanDiajukan = $aplikasiPinjaman['bulan_cicilan_diajukan'];

    	$sisaPinjaman = $jumlahPinjaman;

    	$result = [];
    	for ($i=0; $i <= $bulanCicilanDiajukan; $i++) { 

    		if ($i != 0) {

    			$angsuranBunga = $sisaPinjaman * 0.3 * 0.0833;

    			$sisaPinjaman = $sisaPinjaman - $jumlahPinjaman / $bulanCicilanDiajukan;

    			$total_angsuran = $jumlahPinjaman / $bulanCicilanDiajukan + $this->rounding($angsuranBunga);

    			$bulanan = [
	    			'bulan' 		 => $i,
	    			'angsuran_bunga' => $this->rounding($angsuranBunga),
	    			'angsuran_pokok' => $jumlahPinjaman / $bulanCicilanDiajukan,
	    			'total_angsuran' => $total_angsuran,
	    			'sisa_pinjaman'	 => $sisaPinjaman
	    		];
    		}else{
    			$bulanan = [
	    			'bulan' 		 => $i,
	    			'angsuran_bunga' => 0,
	    			'angsuran_pokok' => 0,
	    			'total_angsuran' => 0,
	    			'sisa_pinjaman'	 => $jumlahPinjaman
	    		];
    		}
    		

    		array_push($result, $bulanan);
    	}

    	$totalAngsuranBunga = 0;

		foreach ($result as $key => $value) {
		  	$totalAngsuranBunga += $value['angsuran_bunga'];
		}

		$sum = [
			'bulan' 		 => 'Total',
			'angsuran_bunga' => $totalAngsuranBunga,
			'angsuran_pokok' => $jumlahPinjaman,
			'total_angsuran' => $jumlahPinjaman + $totalAngsuranBunga,
			'sisa_pinjaman'	 => 0
		];

		array_push($result, $sum);

    	$data['result'] = $result;
    	
		return view('aplikasiPinjaman.detail', $data);

    }
}
