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
use App\MSimpananPokok;
use App\MSimpananSukarela;
use App\MConfig;
use App\User;
use Carbon\Carbon;
use PDF;

class tahunan extends Controller
{
	public function index() {
		return view('tahunan');
	}

	public function search(request $request) {
// return $request->state;
		$data['request'] = $request->all();
		$data['data'] = '';

		$dateFrom 	= Carbon::parse($request->date_from);
		$dateTo		= Carbon::parse($request->date_to);

		$data['from'] 	= $dateFrom->format('F Y');
		$data['to'] 	= $dateTo->format('F Y');

		$anggota = MAnggota::where('status', '!=', 'Calon Anggota')->get();

		foreach ($anggota as $key => $value) {

			# SIMPANAN POKOK

			$sp = MSimpananPokok::where('id_user', $value['id'])
				->whereBetween('tanggal', [$dateFrom, $dateTo])
				->first();
			if ($sp) {
				$anggota[$key]['simpanan_pokok'] = $sp['jumlah'];
			}else{
				$anggota[$key]['simpanan_pokok'] = 0;
			}

			# SIMPANAN WAJIB

			$sw = MSimpananWajib::where('id_user', $value['id'])
				->whereBetween('tanggal', [$dateFrom, $dateTo])
				->sum('jumlah');

			if ($sw) {
				$anggota[$key]['simpanan_wajib'] = (int)$sw;
			}else{
				$anggota[$key]['simpanan_wajib'] = 0;
			}

			# SIMPANAN SUKARELA

			$ss = MSimpananSukarela::where('id_user', $value['id'])
				->whereBetween('tanggal', [$dateFrom, $dateTo])
				->sum('jumlah');

			if ($ss) {
				$anggota[$key]['simpanan_sukarela'] = (int)$ss;
			}else{
				$anggota[$key]['simpanan_sukarela'] = 0;
			}

			# SP + SW + SS

			$anggota[$key]['sp_sw_ss'] = $anggota[$key]['simpanan_pokok'] + $anggota[$key]['simpanan_wajib'] + $anggota[$key]['simpanan_sukarela'];
			
			# SISA PINJAMAN

			$pinjaman = MPinjaman::where('id_user', $value['id'])
				->where('sisa_pinjaman', '!=', 0)
				->whereBetween('created_at', [$dateFrom, $dateTo])
				->first();

			if ($pinjaman) {
				$anggota[$key]['sisa_pinjaman'] = (int)$pinjaman['sisa_pinjaman'];
			}else{
				$anggota[$key]['sisa_pinjaman'] = 0;
			}

			# ANGSURAN

			$angsuran = MAngsuran::where('id_user', $value['id'])
				->where('status', 'lunas')
				->whereBetween('created_at', [$dateFrom, $dateTo])
				->sum('angsuran_pokok');

			if ($angsuran) {
				// return $angsuran;
				$anggota[$key]['angsuran'] = (int)$angsuran;
			}else{
				$anggota[$key]['angsuran'] = 0;
			}

			# JASA

			$jasa = MAngsuran::where('id_user', $value['id'])
				->where('status', 'lunas')
				->whereBetween('created_at', [$dateFrom, $dateTo])
				->sum('angsuran_bunga');

			if ($jasa) {
				// return $angsuran;
				$anggota[$key]['jasa'] = (int)$jasa;
			}else{
				$anggota[$key]['jasa'] = 0;
			}

			# B J S

			$bjs = $request->bjs;

			$ssSeluruhNasabah = MSimpananSukarela::whereBetween('tanggal', [$dateFrom, $dateTo])
				->sum('jumlah');

			$ssNasabah = MSimpananSukarela::where('id_user', $value['id'])
				->whereBetween('tanggal', [$dateFrom, $dateTo])
				->sum('jumlah');

				# ( SP + SW + SS Nasabah in Range * BJP (Input) ) / Total SP + SW + SS Seluruh Nasabah in Range
			
			$totalBjsSebelumDikali = $anggota[$key]['simpanan_pokok'] + $anggota[$key]['simpanan_wajib'] + $ssNasabah;
			 
			$totalBjsSesudahDikali = ($totalBjsSebelumDikali * $bjs);

			if ($totalBjsSesudahDikali != 0 && $ssSeluruhNasabah != 0) {
				$anggota[$key]['bjs'] = floor($totalBjsSesudahDikali / $ssSeluruhNasabah);
			}else{
				$anggota[$key]['bjs'] = 0;
			}

			 # B J P

			$bjp = $request->bjp;

			$jasaSeluruhNasabah = MAngsuran::where('status', 'lunas')
				->whereBetween('created_at', [$dateFrom, $dateTo])
				->sum('angsuran_bunga');

			$jasaNasabah = MAngsuran::where('id_user', $value['id'])
				->where('status', 'lunas')
				->whereBetween('created_at', [$dateFrom, $dateTo])
				->sum('angsuran_bunga');

				# ( Jasa Nasabah in Range * BJS (Input) ) / Total SP + SW + SS Seluruh Nasabah in Range
			
			$totalBjp = $jasaNasabah * $bjp;
				

			if ($totalBjp != 0 && $jasaSeluruhNasabah != 0) {
				$anggota[$key]['bjp'] = floor($totalBjp / $jasaSeluruhNasabah);
			}else{
				$anggota[$key]['bjp'] = 0;
			}

			 # BJS + BJP

			 $anggota[$key]['bjs_bjp'] = $anggota[$key]['bjs'] + $anggota[$key]['bjp'];

			 # SUKARELA

			 $round = $this->roundingTail($anggota[$key]['bjs_bjp']);

			 $anggota[$key]['sukarela'] = $round['tail'];

			 $anggota[$key]['bjs_bjp_sukarela'] = $round['value'];

		}

		$data['result'] = $anggota;

		$simpanan_pokok 	= 0;
		$simpanan_wajib		= 0;
		$simpanan_sukarela	= 0;
		$sp_sw_ss			= 0;
		$sisa_pinjaman		= 0;
		$angsuran			= 0;
		$jasa				= 0;
		$bjs				= 0;
		$bjp				= 0;
		$bjs_bjp			= 0;
		$sukarela			= 0;
		$bjs_bjp_sukarela	= 0;

		foreach ($anggota as $key => $value) {
			$simpanan_pokok 	+= $value['simpanan_pokok'];
			$simpanan_wajib		+= $value['simpanan_wajib'];
			$simpanan_sukarela	+= $value['simpanan_sukarela'];
			$sp_sw_ss			+= $value['sp_sw_ss'];
			$sisa_pinjaman		+= $value['sisa_pinjaman'];
			$angsuran			+= $value['angsuran'];
			$jasa				+= $value['jasa'];
			$bjs				+= $value['bjs'];
			$bjp				+= $value['bjp'];
			$bjs_bjp			+= $value['bjs_bjp'];
			$sukarela			+= $value['sukarela'];
			$bjs_bjp_sukarela	+= $value['bjs_bjp_sukarela'];
		}

		$data['simpanan_pokok'] 	= $simpanan_pokok;
		$data['simpanan_wajib'] 	= $simpanan_wajib;
		$data['simpanan_sukarela'] 	= $simpanan_sukarela;
		$data['sp_sw_ss'] 			= $sp_sw_ss;
		$data['sisa_pinjaman'] 		= $sisa_pinjaman;
		$data['angsuran'] 			= $angsuran;
		$data['jasa'] 				= $jasa;
		$data['bjs'] 				= $bjs;
		$data['bjp'] 				= $bjp;
		$data['bjs_bjp'] 			= $bjs_bjp;
		$data['sukarela'] 			= $sukarela;
		$data['bjs_bjp_sukarela'] 	= $bjs_bjp_sukarela;

// return $data;
		if ($request->state == 'search') {
			return view('tahunan', $data);
		}else{
			
			$data['tanggal'] = Carbon::now()->format('d F Y');

			$ketua = User::where('jabatan','Ketua')->first();
			$bendahara = User::where('jabatan','Bendahara')->first();
			$sekertaris = User::where('jabatan','Sekertaris')->first();

			$data['ketua'] = $ketua ? $ketua['nama'] : 'Tidak Ada';
			$data['bendahara'] = $bendahara ? $bendahara['nama'] : 'Tidak Ada';
			$data['sekertaris'] = $sekertaris ? $sekertaris['nama'] : 'Tidak Ada';
			
			$pdf = PDF::loadView('tahunan-print', $data);
	        $pdf->setPaper('A4', 'landscape');
	        return $pdf->stream('tahunan.pdf');
		}
		
	}

	public function roundingTail($value)
    {
        $hundred = substr($value, -3);

        if($hundred > 000){

        	$result = [
        		'tail' => (int)$hundred,
        		'value' => $value - $hundred
        	];
            
        }else{
        	$result = [
        		'tail' => 0,
        		'value' => $result = $value
        	];
            
        }

        return $result;
    }
    


}
