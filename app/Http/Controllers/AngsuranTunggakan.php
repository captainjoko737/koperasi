<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MAngsuran;
use App\MAnggota;
use App\MPinjaman;
use Carbon\Carbon;

class AngsuranTunggakan extends Controller
{
	
	public function index() {
		// return MAngsuran::all();

		$result = MAngsuran::where('status', 'belum dibayar')->get();
		

		$dataAngsuranTunggakan = [];
		$count = 0;

		foreach ($result as $key => $value) {
			$pinjaman = MPinjaman::where('id', $value['id_pinjaman'])->first();
			
			$anggota = MAnggota::where('id', $pinjaman['id_user'])->first();
			
            $date = Carbon::now();
            if($date->gt($value->tanggal_jatuh_tempo)){

                $diff = $date->diffInMonths($value->tanggal_jatuh_tempo);

                $denda = $pinjaman['jumlah_pinjaman'] * 2 / 100;
                $denda = $denda * ($diff + 1);

                $dataAngsuranTunggakan[$count]['nama'] = $anggota['nama']; 
                $dataAngsuranTunggakan[$count]['telepon'] = $anggota['telepon']; 
                $dataAngsuranTunggakan[$count]['angsuran_ke'] = $value->angsuran_ke;
                $dataAngsuranTunggakan[$count]['jatuh_tempo'] = $value->tanggal_jatuh_tempo->format('d M Y');
                $dataAngsuranTunggakan[$count]['denda'] = $denda; 
                $dataAngsuranTunggakan[$count]['total_angsuran'] = $value->total_angsuran + $denda; 
                $dataAngsuranTunggakan[$count]['status_bayar'] = false;

                $count += 1;
            }
            
            
        }

        $data['result'] = $dataAngsuranTunggakan;
        // return $data;
		return view('AngsuranTunggakan', $data);
	}
    
}
