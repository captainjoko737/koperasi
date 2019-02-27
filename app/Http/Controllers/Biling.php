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

class Biling extends Controller
{
    
    public function index() {

    	// return 'GOOD';
		return view('biling');
	}

	public function search(request $request) {

		$data['request'] = $request->all();
		$data['data'] = '';


		$resultFinal = [];

		$anggota = MAnggota::where('status', 'Aktif')->get();

		$date 	= Carbon::parse($request->date_from);

		$data['from'] 	= $date->format('F Y');

		$month = $date->format('m');
		$year  = $date->format('Y');

		$simpananWajib = MConfig::where('key', 'simpanan_wajib')->first()->value;

		foreach ($anggota as $key => $value) {
			
			$result = MSimpananWajib::whereMonth('tanggal', $date->format('m'))
				->whereYear('tanggal', $date->format('Y'))
				->where('id_user', $value['id'])
				->first();

			$angsuran = $this->findAngsuran($value['id'], $month, $year);

			if ($angsuran) {
				// ADA ANGSURAN
// return $angsuran;
				$anggota[$key]['total_angsuran'] = $angsuran['total_angsuran'] + $angsuran['denda'];
				$anggota[$key]['id_angsuran']    = $angsuran['id'];

				if (!$result) {
					$anggota[$key]['simpanan_wajib'] = $simpananWajib;
				}else{
					$anggota[$key]['simpanan_wajib'] = '-';
				}

				$anggota[$key]['bulan'] = $date->format('F Y');

				// $tunggakan = 
				// return $angsuran;
				array_push($resultFinal, $value);

			}else{
				// TIDAK ADA ANGSURAN
				if (!$result) {
					$anggota[$key]['simpanan_wajib'] = $simpananWajib;
					$anggota[$key]['bulan'] = $date->format('F Y');
					$anggota[$key]['total_angsuran'] = '-';
					array_push($resultFinal, $value);
				}
			}
			
		}

		// return $resultFinal;

		$data['result'] = $resultFinal;

		if ($request->state == 'search') {
			return view('biling', $data);
		}else{
			
			// $data['tanggal'] = Carbon::now()->format('d F Y');

			// $ketua = User::where('jabatan','Ketua')->first();
			// $bendahara = User::where('jabatan','Bendahara')->first();
			// $sekertaris = User::where('jabatan','Sekertaris')->first();

			// $data['ketua'] = $ketua ? $ketua['nama'] : 'Tidak Ada';
			// $data['bendahara'] = $bendahara ? $bendahara['nama'] : 'Tidak Ada';
			// $data['sekertaris'] = $sekertaris ? $sekertaris['nama'] : 'Tidak Ada';
			
			// $pdf = PDF::loadView('tahunan-print', $data);
	  //       $pdf->setPaper('A4', 'landscape');
	  //       return $pdf->stream('tahunan.pdf');
		}
		
	}

	private function findAngsuran($id_user, $month, $year) {

		$result = MAngsuran::where('id_user', $id_user)
				->where('status', 'belum dibayar')
				->whereMonth('tanggal_jatuh_tempo', $month)
				->whereYear('tanggal_jatuh_tempo', $year)
				->first();

		return $result;

	}

	public function post(request $request) {

		if ($request->simpanan_wajib) {
			$paramSW = [
				'id_user' => $request['id'],
				'jumlah'  => (int)$request['simpanan_wajib'],
				'tanggal' => $request['date']
			];
			MSimpananWajib::create($paramSW);
		}

		if ($request->total_angsuran) {

			$angsuran = MAngsuran::where('id', $request['id_angsuran'])->first();

			// return $angsuran;

			$angsuran->jumlah 			  = (int)$request['total_angsuran'];
			$angsuran->tanggal_pembayaran = Carbon::now()->format('Y-m-d');
			$angsuran->status 			  = 'lunas';

			$pinjaman = MPinjaman::where('id', $angsuran['id_pinjaman'])->first();

			$pinjaman->angsuran_ke = $angsuran['angsuran_ke'];
			$pinjaman->sisa_pinjaman = $angsuran['sisa_pinjaman'];


			// $pinjaman = MPinjaman::where('id', $angsuran['id_pinjaman'])->first();

			return $pinjaman;

			// $pinjaman->save();
			// $angsuran->save();



		}


		return redirect('biling/search?date_from='.$request['date'].'&state=search');
		
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


// {
// 	"date":"26\/02\/2019",
// 	"angsuran_ke":3,
// 	"sisa_pinjaman":8500000,
// 	"total_angsuran_pokok":500000,
// 	"total_bunga":225000,
// 	"total_denda":0,
// 	"total_bayar":725000,
// 	"result":[{
// 		"id":85,
// 		"id_user":59,
// 		"id_pinjaman":6,
// 		"angsuran_ke":3,
// 		"angsuran_bunga":225000,
// 		"angsuran_pokok":500000,
// 		"total_angsuran":725000,
// 		"sisa_pinjaman":8500000,
// 		"jumlah":0,
// 		"denda":0,
// 		"status":"belum dibayar",
// 		"tanggal_jatuh_tempo":"2019-05-05 00:00:00",
// 		"tanggal_pembayaran":null,
// 		"json_data":null,
// 		"created_at":"2019-01-23 19:55:48",
// 		"updated_at":null
// 	}],
// 	"admin":{
// 		"id":4,
// 		"email":"accounting@fkip-uninus.ac.id",
// 		"nama":"Luki Luqmanul Hakim, M.Pd.",
// 		"ttl":"Sumedang, 19 Februari 1986",
// 		"jenis_kelamin":"Laki-laki",
// 		"telepon":"08112030302",
// 		"status_user":"accounting",
// 		"status":"Karyawan",
// 		"jabatan":"Bendahara",
// 		"created_at":"2018-12-26 01:58:06",
// 		"updated_at":"2018-12-28 05:30:39"
// 	},
// 	"pinjaman":{
// 		"id":59,
// 		"id_user":59,
// 		"jumlah_pinjaman":10000000,
// 		"tenor":"20",
// 		"angsuran_ke":2,
// 		"sisa_pinjaman":9000000,
// 		"bunga":2.5,
// 		"denda":1,
// 		"created_at":"2019-01-21 10:41:57",
// 		"updated_at":"2019-01-21 10:41:57",
// 		"nama":"Hamdan Hidayat, S.Pd., M.M.Pd.",
// 		"ttl":"Bandung",
// 		"jenis_kelamin":"Laki-laki",
// 		"alamat":"Bandung",
// 		"telepon":"-",
// 		"email":"anggota@fkip-uninus.ac.id",
// 		"status":"Aktif",
// 		"json_data":null
// 	},
// 	"id":"85",
// 	"id_pinjaman":"6"
// }
