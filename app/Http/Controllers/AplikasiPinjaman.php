<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\MAplikasiPinjaman;
use App\MAnggota;
use App\MPinjaman;
use App\MAngsuran;

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

        $tenor = [];
        for ($i=1; $i <= 60; $i++) { 
            array_push($tenor, $i);
        }
        $data['tenor'] = $tenor;

        $calculate = $this->calculate($request['id']);
    	$data['result'] = $calculate['result'];
        $data['aplikasi_pinjaman'] = $calculate['aplikasi_pinjaman'];
    	
		return view('aplikasiPinjaman.detail', $data);

    }

    public function calculate($id) {

        $aplikasiPinjaman = MAplikasiPinjaman::where('aplikasi_pinjaman.id', $id)
            ->join('anggota', 'anggota.id', '=', 'aplikasi_pinjaman.id_user')
            ->select('aplikasi_pinjaman.*', 'anggota.nama')
            ->first();

        if ($aplikasiPinjaman['jumlah_disetujui'] == 0) {
            $jumlahPinjaman = $aplikasiPinjaman['jumlah_diajukan'];
        }else{
            $jumlahPinjaman = $aplikasiPinjaman['jumlah_disetujui'];
        }

        if ($aplikasiPinjaman['bulan_cicilan_disetujui'] == NULL) {
            $bulanCicilan = $aplikasiPinjaman['bulan_cicilan_diajukan'];
        }else{
            $bulanCicilan = $aplikasiPinjaman['bulan_cicilan_disetujui'];
        }
        
        $sisaPinjaman = $jumlahPinjaman;

        $result = [];
        for ($i=0; $i <= $bulanCicilan; $i++) { 

            if ($i != 0) {

                $angsuranBunga = $sisaPinjaman * 0.3 * 0.0833;

                $sisaPinjaman = $sisaPinjaman - $jumlahPinjaman / $bulanCicilan;

                $total_angsuran = $jumlahPinjaman / $bulanCicilan + $this->rounding($angsuranBunga);

                $bulanan = [
                    'bulan'          => $i,
                    'angsuran_bunga' => $this->rounding($angsuranBunga),
                    'angsuran_pokok' => $jumlahPinjaman / $bulanCicilan,
                    'total_angsuran' => $total_angsuran,
                    'sisa_pinjaman'  => $sisaPinjaman
                ];
                
            }else{
                $bulanan = [
                    'bulan'          => $i,
                    'angsuran_bunga' => 0,
                    'angsuran_pokok' => 0,
                    'total_angsuran' => 0,
                    'sisa_pinjaman'  => $jumlahPinjaman
                ];
            }
            

            array_push($result, $bulanan);
        }

        $totalAngsuranBunga = 0;

        foreach ($result as $key => $value) {
            $totalAngsuranBunga += $value['angsuran_bunga'];
        }

        $sum = [
            'bulan'          => 'Total',
            'angsuran_bunga' => $totalAngsuranBunga,
            'angsuran_pokok' => $jumlahPinjaman,
            'total_angsuran' => $jumlahPinjaman + $totalAngsuranBunga,
            'sisa_pinjaman'  => 0
        ];

        array_push($result, $sum);

        return ['result' => $result, 'aplikasi_pinjaman' => $aplikasiPinjaman];
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

        session()->flash('status', 'Aplikasi pinjaman berhasil dibuat.');
        return redirect()->route('aplikasi_pinjaman');
    }

    public function tangani(request $request) {

        $aplikasiPinjaman = MAplikasiPinjaman::find($request->id);

        if ($request->status == 'disetujui') {
            $aplikasiPinjaman->jumlah_disetujui = $request->jumlah_disetujui;
            $aplikasiPinjaman->bulan_cicilan_disetujui = $request->bulan_cicilan_disetujui;
            $aplikasiPinjaman->status = 'disetujui';

            $aplikasiPinjaman->save();
            session()->flash('status', 'Aplikasi pinjaman berhasil disetujui.');
        }else{
            $aplikasiPinjaman->status = 'tidak disetujui';

            $aplikasiPinjaman->save();
            session()->flash('status', 'Aplikasi pinjaman tidak disetujui.');
        }

        return redirect()->route('aplikasi_pinjaman');
    }

    public function prosesPinjaman(request $request) {

        if ($request['status'] == 'setuju') {
            // Create new data in table pinjaman
            $calculate = $this->calculate($request['id']);

            $dataPinjaman = new MPinjaman;
            $dataPinjaman->id_user           =  $calculate['aplikasi_pinjaman']['id_user'];
            $dataPinjaman->jumlah_pinjaman   =  $calculate['aplikasi_pinjaman']['jumlah_disetujui'];
            $dataPinjaman->tenor             =  $calculate['aplikasi_pinjaman']['bulan_cicilan_disetujui'];
            $dataPinjaman->angsuran_ke       =  0;
            $dataPinjaman->sisa_pinjaman     =  $calculate['aplikasi_pinjaman']['jumlah_disetujui'];
            $dataPinjaman->save();

            $dataAngsuran = [];

            foreach ($calculate['result'] as $key => $value) {
                $param = [
                    'id_pinjaman'       =>  $dataPinjaman->id,
                    'angsuran_ke'       =>  (int)$value['bulan'],
                    'angsuran_bunga'    =>  (int)$value['angsuran_bunga'],
                    'angsuran_pokok'    =>  (int)$value['angsuran_pokok'],
                    'total_angsuran'    =>  (int)$value['total_angsuran'],
                    'sisa_pinjaman'     =>  (int)$value['sisa_pinjaman'],
                    'jumlah'            =>  0,
                    'denda'             =>  0,
                    'status'            =>  'belum dibayar'
                ];

                array_push($dataAngsuran, $param);
            }

            MAngsuran::insert($dataAngsuran);

            // delete data di aplikasi pinjaman

            $delete = MAplikasiPinjaman::find($request['id'])->delete();

            session()->flash('status', 'Aplikasi pinjaman telah berhasil di proses. untuk rincian silahkan cek di halaman pinjaman');
            return redirect()->route('aplikasi_pinjaman');

        }else{
            $aplikasiPinjaman = MAplikasiPinjaman::find($request['id']);
            $aplikasiPinjaman->status = 'tidak disetujui';
            $aplikasiPinjaman->save();

            session()->flash('status', 'Aplikasi pinjaman tidak disetujui.');
            return redirect()->route('aplikasi_pinjaman');
        }

        
    }

    public function drops(request $request) {

        // return $request->all();


        $data = MAplikasiPinjaman::where('id', $request->id)->first();

        // return $data;

        $data->delete();

        return redirect()->route('aplikasi_pinjaman');
    }



}


























