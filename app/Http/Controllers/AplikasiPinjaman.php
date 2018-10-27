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

    	$aplikasiPinjaman = MAplikasiPinjaman::where('aplikasi_pinjaman.id', $request['id'])
            ->join('anggota', 'anggota.id', '=', 'aplikasi_pinjaman.id_user')
            ->select('aplikasi_pinjaman.*', 'anggota.nama')
            ->first();

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

        $tenor = [];
        for ($i=1; $i <= 60; $i++) { 
            array_push($tenor, $i);
        }
        $data['tenor'] = $tenor;

    	$data['result'] = $result;
        $data['aplikasi_pinjaman'] = $aplikasiPinjaman;
    	
		return view('aplikasiPinjaman.detail', $data);

    }

    public function add() {

        $data['anggota'] = MAnggota::where('status', '=', 'aktif')->get();

        $tenor = [];
        for ($i=1; $i <= 60; $i++) { 
            array_push($tenor, $i);
        }
        $data['tenor'] = $tenor;
        
        return view('aplikasiPinjaman.add', $data);

    }

    public function create(request $request) {

        // return $request->all();
        $aplikasiPinjaman = new MAplikasiPinjaman;

        $aplikasiPinjaman->id_user = $request->id_user;
        $aplikasiPinjaman->jumlah_diajukan = $request->jumlah_diajukan;
        $aplikasiPinjaman->bulan_cicilan_diajukan = $request->bulan_cicilan_diajukan;
        $aplikasiPinjaman->status = 'sedang di proses';

        $aplikasiPinjaman->save();

        return redirect()->route('aplikasi_pinjaman');
    }

    public function tangani(request $request) {

        $aplikasiPinjaman = MAplikasiPinjaman::find($request->id);

        if ($request->status == 'disetujui') {
            $aplikasiPinjaman->jumlah_disetujui = $request->jumlah_disetujui;
            $aplikasiPinjaman->bulan_cicilan_disetujui = $request->bulan_cicilan_disetujui;
            $aplikasiPinjaman->status = 'disetujui';

            $aplikasiPinjaman->save();
        }else{
            $aplikasiPinjaman->status = 'tidak disetujui';

            $aplikasiPinjaman->save();
        }

        

        return redirect()->route('aplikasi_pinjaman');
    }

}
