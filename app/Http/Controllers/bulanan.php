<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\MAplikasiPinjaman;
use App\MAnggota;
use App\MPinjaman;
use App\MAngsuran;
use App\MSimpananWajib;
use App\MConfig;
use Carbon\Carbon;
use PDF;

class Bulanan extends Controller
{
	public function index() {

		$anggota = MAnggota::all();

		$date = Carbon::now();

		foreach ($anggota as $key => $value) {

			$simpananWajibResult = MSimpananWajib::where('id_user', $value['id'])
				->whereMonth('tanggal' , Carbon::today()->month)
				->whereYear('tanggal' , Carbon::today()->year)
				->first();

			$simpananWajib = 0;
			if ($simpananWajibResult) {
				$simpananWajib = $simpananWajibResult['jumlah'];
				
			}

			$anggota[$key]['simpanan_wajib'] = $simpananWajib;
			
			$pinjaman = MPinjaman::where('id_user', $value['id'])->first();

			if ($pinjaman) {
				
				$angsuranResult = MAngsuran::where('id_pinjaman', $pinjaman['id'])
					->whereMonth('tanggal_jatuh_tempo' , Carbon::today()->month)
					->whereYear('tanggal_jatuh_tempo' , Carbon::today()->year)
					->orderBy('id', 'DESC')->first();

				$anggota[$key]['tenor'] = $pinjaman['tenor'];
				$anggota[$key]['angsuran'] = $angsuranResult['angsuran_pokok'];
				$anggota[$key]['jasa'] = $angsuranResult['angsuran_bunga'];
				$anggota[$key]['denda'] = $angsuranResult['denda'];
				$anggota[$key]['sisa_pinjaman'] = $angsuranResult['sisa_pinjaman'];
				$anggota[$key]['keterangan'] = $angsuranResult['angsuran_ke'];
				$anggota[$key]['jumlah'] = $angsuranResult['angsuran_pokok'] + $angsuranResult['angsuran_bunga'] + $angsuranResult['denda'] + $simpananWajib; 

			}else{
				$anggota[$key]['tenor'] = 0;
				$anggota[$key]['angsuran'] = 0;
				$anggota[$key]['jasa'] = 0;
				$anggota[$key]['denda'] = 0;
				$anggota[$key]['sisa_pinjaman'] = 0;
				$anggota[$key]['keterangan'] = 0;
				$anggota[$key]['jumlah'] = $simpananWajib; 
			}

		}

		$totalAngsuran 	 	= 0;
		$totalJasa		 	= 0;
		$totalSimpananWajib = 0;
		$totalDenda			= 0;
		$totalSisaPinjaman	= 0;
		$total 				= 0;

		foreach ($anggota as $key => $value) {
			$totalAngsuran 	 	+= $value['angsuran'];
			$totalJasa		 	+= $value['jasa'];
			$totalSimpananWajib += $value['simpanan_wajib'];
			$totalDenda			+= $value['denda'];
			$totalSisaPinjaman	+= $value['sisa_pinjaman'];
			$total 				+= $value['jumlah'];
		}

		$data['total_angsuran'] 		= $totalAngsuran;
		$data['total_jasa'] 			= $totalJasa;
		$data['total_simpanan_wajib'] 	= $totalSimpananWajib;
		$data['total_denda'] 			= $totalDenda;
		$data['total_sisa_pinjaman'] 	= $totalSisaPinjaman;
		$data['total'] 				 	= $total;

		$data['result'] = $anggota;
		$data['date']	= $date->format('F Y');

		// return $data;
		return view('bulanan', $data);
	}

	public function prints() {

		$anggota = MAnggota::all();

		$date = Carbon::now();

		foreach ($anggota as $key => $value) {

			$simpananWajibResult = MSimpananWajib::where('id_user', $value['id'])
				->whereMonth('tanggal' , Carbon::today()->month)
				->whereYear('tanggal' , Carbon::today()->year)
				->first();

			$simpananWajib = 0;
			if ($simpananWajibResult) {
				$simpananWajib = $simpananWajibResult['jumlah'];
				
			}

			$anggota[$key]['simpanan_wajib'] = $simpananWajib;
			
			$pinjaman = MPinjaman::where('id_user', $value['id'])->first();

			if ($pinjaman) {
				
				$angsuranResult = MAngsuran::where('id_pinjaman', $pinjaman['id'])
					->whereMonth('tanggal_jatuh_tempo' , Carbon::today()->month)
					->whereYear('tanggal_jatuh_tempo' , Carbon::today()->year)
					->orderBy('id', 'DESC')->first();

				$anggota[$key]['angsuran'] = $angsuranResult['angsuran_pokok'];
				$anggota[$key]['jasa'] = $angsuranResult['angsuran_bunga'];
				$anggota[$key]['denda'] = $angsuranResult['denda'];
				$anggota[$key]['sisa_pinjaman'] = $angsuranResult['sisa_pinjaman'];
				$anggota[$key]['keterangan'] = $angsuranResult['angsuran_ke'];
				$anggota[$key]['jumlah'] = $angsuranResult['angsuran_pokok'] + $angsuranResult['angsuran_bunga'] + $angsuranResult['denda'] + $simpananWajib; 

			}else{
				$anggota[$key]['angsuran'] = 0;
				$anggota[$key]['jasa'] = 0;
				$anggota[$key]['denda'] = 0;
				$anggota[$key]['sisa_pinjaman'] = 0;
				$anggota[$key]['keterangan'] = 0;
				$anggota[$key]['jumlah'] = $simpananWajib; 
			}

		}

		$totalAngsuran 	 	= 0;
		$totalJasa		 	= 0;
		$totalSimpananWajib = 0;
		$totalDenda			= 0;
		$totalSisaPinjaman	= 0;
		$total 				= 0;

		foreach ($anggota as $key => $value) {
			$totalAngsuran 	 	+= $value['angsuran'];
			$totalJasa		 	+= $value['jasa'];
			$totalSimpananWajib += $value['simpanan_wajib'];
			$totalDenda			+= $value['denda'];
			$totalSisaPinjaman	+= $value['sisa_pinjaman'];
			$total 				+= $value['jumlah'];
		}

		$data['total_angsuran'] 		= $totalAngsuran;
		$data['total_jasa'] 			= $totalJasa;
		$data['total_simpanan_wajib'] 	= $totalSimpananWajib;
		$data['total_denda'] 			= $totalDenda;
		$data['total_sisa_pinjaman'] 	= $totalSisaPinjaman;
		$data['total'] 				 	= $total;

		$data['result'] = $anggota;
		$data['date']	= $date->format('F Y');
		// return $data;
		// return view('print-bulanan', $data);

		$pdf = PDF::loadView('print-bulanan', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('bulanan.pdf');

	}
    
}
