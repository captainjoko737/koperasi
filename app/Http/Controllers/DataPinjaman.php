<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\MAplikasiPinjaman;
use App\MAnggota;
use App\MPinjaman;
use App\MAngsuran;
use App\MConfig;
use Carbon\Carbon;
use PDF;

class DataPinjaman extends Controller
{
	public function index() {

		$data['result'] = MPinjaman::join('anggota', 'anggota.id', '=', 'pinjaman.id_user')
			->select('pinjaman.*', 'anggota.nama')
			->get();

		return view('DataPinjaman', $data);
	}

	public function detail(request $request) {

        $pinjamanTotal = MPinjaman::where('id', $request['id'])->first();
 
        $result = MAngsuran::where('id_pinjaman', $request['id'])->get();

        $totalPinjaman = $pinjamanTotal['jumlah_pinjaman'];
        foreach ($result as $key => $value) {

            if ($key != 0) {
                
                $date = Carbon::now();

                if($date->gt($value->tanggal_jatuh_tempo) && $value['status'] != 'lunas'){

                    $diff = $date->diffInMonths($value->tanggal_jatuh_tempo);

                    $bunga = $pinjamanTotal['bunga'];
                    $denda = $value['angsuran_pokok'] * $bunga / 100;
                    $denda = $denda * ($diff + 1);
                    $denda = $this->rounding($denda);

                    if ($pinjamanTotal['denda'] != 0) {

                        $pinjaman = MAngsuran::where('id', $value->id)
                                  ->update(['denda' => $denda]);

                        $result[$key]['denda'] = $denda; 
                        $result[$key]['total_angsuran'] = $value->total_angsuran + $denda; 
                        $result[$key]['status_bayar'] = false;
                    }else{
                        $result[$key]['status_bayar'] = true;
                    }
                    
                }else{
                    $result[$key]['status_bayar'] = true;
                }
            }
            
        }
        
        $data['result'] = $result;
        
		return view('pinjaman.detail', $data);

    }

    public function bayar(request $request) {

        $result = MAngsuran::where('id_pinjaman', $request->id_pinjaman)
            ->where('id', '<=', $request->id)
            ->where('status', 'belum dibayar')
            ->get();

     
        $totalAngsuranPokok = 0;
        $totalBunga = 0;
        $totalDenda = 0;
        $totalBayar = 0;

        foreach ($result as $key => $value) {
            $totalAngsuranPokok += $value['angsuran_pokok'];
            $totalBunga += $value['angsuran_bunga'];
            $totalDenda += $value['denda'];
            $totalBayar += $value['total_angsuran'];
        }

        $data['date'] = Carbon::now()->format('d/m/Y');
        $data['angsuran_ke'] = $result->last()->angsuran_ke;
        $data['sisa_pinjaman'] = $result->last()->sisa_pinjaman;
        $data['total_angsuran_pokok'] = $totalAngsuranPokok;
        $data['total_bunga'] = $totalBunga;
        $data['total_denda'] = $totalDenda;
        $data['total_bayar'] = $totalBayar;

        $data['result'] = $result;
        $data['admin'] = Auth::user();
        $data['pinjaman'] = MPinjaman::join('anggota', 'anggota.id', '=', 'pinjaman.id_user')->where('pinjaman.id', $request->id_pinjaman)->first();
        $data['id'] = $request->id;
        $data['id_pinjaman'] = $request->id_pinjaman;
        // return $data;
        return view('pinjaman.bayar', $data);
    	
    }

    public function konfirmasi(request $request) {

        $tanggalPembayaran = Carbon::now()->format('Y-m-d');

        $result = MAngsuran::where('id_pinjaman', $request->id_pinjaman)
            ->where('id', '<=', $request->id)
            ->where('status', 'belum dibayar')
            ->get();

     
        $totalAngsuranPokok = 0;
        $totalBunga = 0;
        $totalDenda = 0;
        $totalBayar = 0;

        foreach ($result as $key => $value) {
            $totalAngsuranPokok += $value['angsuran_pokok'];
            $totalBunga += $value['angsuran_bunga'];
            $totalDenda += $value['denda'];
            $totalBayar += $value['total_angsuran'];

            MAngsuran::where('id', $value->id)
                        ->update([
                            'status' => 'lunas', 
                            'tanggal_pembayaran' => $tanggalPembayaran
                        ]);

        }

        $data['date'] = Carbon::now()->format('d/m/Y');
        $data['angsuran_ke'] = $result->last()->angsuran_ke;
        $data['sisa_pinjaman'] = $result->last()->sisa_pinjaman;
        $data['total_angsuran_pokok'] = $totalAngsuranPokok;
        $data['total_bunga'] = $totalBunga;
        $data['total_denda'] = $totalDenda;
        $data['total_bayar'] = $totalBayar;

        $data['result'] = $result;
        $data['admin'] = Auth::user();
        $data['pinjaman'] = MPinjaman::join('anggota', 'anggota.id', '=', 'pinjaman.id_user')->where('pinjaman.id', $request->id_pinjaman)->first();
        $data['id'] = $request->id;
        $data['id_pinjaman'] = $request->id_pinjaman;

        $json_data = json_encode($data);

        MAngsuran::where('id', $result->last()->id)
                        ->update([
                            'jumlah' => $totalBayar, 
                            'json_data' => $json_data
                        ]);

        MPinjaman::where('id', $result->last()->id_pinjaman)
                        ->update([
                            'angsuran_ke' => $result->last()->angsuran_ke,
                            'sisa_pinjaman' => $result->last()->sisa_pinjaman
                        ]);

        return redirect()->route('pinjaman.detail', ['id' => $data['id_pinjaman']]);

    }

    public function prints(request $request) {
        
        $result = MAngsuran::where('id_pinjaman', $request->id_pinjaman)
            ->where('id', '<=', $request->id)
            ->where('status', 'belum dibayar')
            ->get();

     
        $totalAngsuranPokok = 0;
        $totalBunga = 0;
        $totalDenda = 0;
        $totalBayar = 0;

        foreach ($result as $key => $value) {
            $totalAngsuranPokok += $value['angsuran_pokok'];
            $totalBunga += $value['angsuran_bunga'];
            $totalDenda += $value['denda'];
            $totalBayar += $value['total_angsuran'];
        }

        $data['date'] = Carbon::now()->format('d/m/Y');
        $data['angsuran_ke'] = $result->last()->angsuran_ke;
        $data['sisa_pinjaman'] = $result->last()->sisa_pinjaman;
        $data['total_angsuran_pokok'] = $totalAngsuranPokok;
        $data['total_bunga'] = $totalBunga;
        $data['total_denda'] = $totalDenda;
        $data['total_bayar'] = $totalBayar;

        $data['result'] = $result;
        $data['admin'] = Auth::user();
        $data['pinjaman'] = MPinjaman::join('anggota', 'anggota.id', '=', 'pinjaman.id_user')->where('pinjaman.id', $request->id_pinjaman)->first();
        $data['id'] = $request->id;
        $data['id_pinjaman'] = $request->id_pinjaman;
        
        return view('pinjaman.print', $data);
    }

    public function cetak(request $request) {
        
        $result = MAngsuran::where('id_pinjaman', $request->id_pinjaman)
            ->where('id', $request->id)
            ->first();

        // return $this->showJSON($result['json_data']);
        $data = $this->showJSON($result['json_data']);

        foreach ($data['result'] as $key => $value) {
            $data['result'][$key]['tanggal_jatuh_tempo'] = Carbon::parse($value['tanggal_jatuh_tempo']);
        }

        // return $data;
        // return $data;
        return view('pinjaman.print', $data);
    }

    public function detailPrint(request $request) {
        
        $result = MAngsuran::where('id_pinjaman', $request->id)->get();

        $pinjaman = MPinjaman::where('pinjaman.id', $request->id)->join('anggota', 'anggota.id', '=', 'pinjaman.id_user')->first();

        $config = MConfig::where('key', 'provisi')->first();
        $provisi = (double)$config['value'];
        $provisi = $pinjaman['jumlah_pinjaman'] * $provisi / 100;

        $pinjaman['provisi'] = (double)$config['value'];
        $pinjaman['dana_cair'] = $pinjaman['jumlah_pinjaman'] - $provisi;

        foreach ($result as $key => $value) {
            $result[$key]['tanggal_jatuh_tempo'] = Carbon::parse($value['tanggal_jatuh_tempo']);
        }

        $total = [
            'angsuran_bunga'       => (int)MAngsuran::where('id_pinjaman', $request->id)->sum('angsuran_bunga'),
            'angsuran_pokok'       => (int)MAngsuran::where('id_pinjaman', $request->id)->sum('angsuran_pokok'),
            'total_angsuran'       => (int)MAngsuran::where('id_pinjaman', $request->id)->sum('total_angsuran'),
            'sisa_pinjaman'        => (int)MAngsuran::where('id_pinjaman', $request->id)->sum('sisa_pinjaman'),
            'tanggal_jatuh_tempo'  => '',
            'bulan'                => 'JUMLAH'
        ];

        $result->push($total);

        $data['result'] = $result;
        $data['pinjaman'] = $pinjaman;

        $pdf = PDF::loadView('pinjaman.detail-print', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('good.pdf');
        
    }

    public function showJSON($body)
    {
        $json = json_decode($body, true);
        if ($json != null) {
            return $json;
        } else {
            $hasil = preg_replace("/\":\s*([a-zA-Z0-9_]+)/", "\":\"$1\"", $body);
            $json = json_decode($hasil, true);
            return $json;
        }
    }

    public function hapus(request $request) {

        $pinjaman = MPinjaman::find($request->id);
        $pinjaman->delete();
        return redirect()->route('DataPinjaman');
    }
    
}
