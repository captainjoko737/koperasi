<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MAnggota;
use App\User;
use App\MAngsuran;
use App\MSimpananPokok;
use App\MSimpananWajib;
use App\MSimpananSukarela;
use App\MPinjaman;
use App\MConfig;
use Carbon\Carbon;
use PDF;
use Auth;

class Anggota extends Controller
{
	public function index() {

		$anggota = MAnggota::where('status', '!=', 'Calon Anggota')->get();
		// return json_encode($anggota);
		foreach ($anggota as $key => $value) {
			$simpananPokok = MSimpananPokok::where('id_user', $value['id'])->first();
			$anggota[$key]['simpananPokok'] = $simpananPokok;
		}

		// return $anggota;
		$data['result'] = $anggota;
		return view('anggota', $data);
	}

	public function add() {

		$data['simpanan_pokok'] = MConfig::where('key', 'simpanan_pokok')->first();
		return view('anggota.add', $data);

	}

	public function create(request $request) {

		$anggota = new MAnggota;

		$anggota->nama = $request->nama;
		$anggota->ttl = $request->ttl;
		$anggota->jenis_kelamin = $request->jenis_kelamin;
		$anggota->alamat = $request->alamat;
		$anggota->telepon = $request->telepon;
		$anggota->email = $request->email;
		$anggota->status = $request->status;

		$anggota->save();

		$simpananPokok = new MSimpananPokok;
		$simpananPokok->id_user = $anggota->id;
		$simpananPokok->tanggal = $request->tanggal;
		$simpananPokok->jumlah = $request->jumlah;

		$simpananPokok->save();

		if (isset($request->simpanan_wajib)) {
			$simpananWajib = new MSimpananWajib;
			$simpananWajib->id_user = $anggota->id;
			$simpananWajib->tanggal = $request->tanggal;
			$simpananWajib->jumlah = $request->simpanan_wajib;

			$simpananWajib->save();
		}
		
		if (isset($request->simpanan_sukarela)) {
			$simpananSukarela = new MSimpananSukarela;
			$simpananSukarela->id_user = $anggota->id;
			$simpananSukarela->tanggal = $request->tanggal;
			$simpananSukarela->jumlah = $request->simpanan_sukarela;

			$simpananSukarela->save();
		}
		

		return redirect()->route('anggota');
	}

	public function edit(request $request) {

		// return $request->id;
		$anggota = MAnggota::where('id', $request->id)->first();
		// return $anggota;
		$data['result'] = $anggota;

		return view('anggota.edit', $data);	
	}

	public function save(request $request) {

		// return $request->id;
		$anggota = MAnggota::where('id', $request->id)->first();
		// return $anggota;
		$anggota->nama = $request->nama;
		$anggota->ttl = $request->ttl;
		$anggota->jenis_kelamin = $request->jenis_kelamin;
		$anggota->alamat = $request->alamat;
		$anggota->telepon = $request->telepon;
		$anggota->email = $request->email;
		$anggota->status = $request->status;

		$anggota->save();

		return redirect()->route('anggota');
	}

	public function drop(request $request) {

		$data = MAnggota::where('id', $request->id)->first();

		$data->delete();

		return redirect()->route('anggota');
	}

	public function keluar(request $request) {

		$data['title'] = 'Anggota Keluar';

		$danaBayar = 0;
		$danaKembali = 0;

		$simpananPokok = MSimpananPokok::where('id_user', $request->id)->sum('jumlah');
		$simpananWajib = MSimpananWajib::where('id_user', $request->id)->sum('jumlah');
		$simpananSukarela = MSimpananSukarela::where('id_user', $request->id)->sum('jumlah');
		$angsuran = MAngsuran::where('id_user', $request->id)->where('status', 'belum dibayar')->sum('angsuran_pokok');

		$totalSimpanan = (int)$simpananPokok + (int)$simpananWajib + (int)$simpananSukarela;

		if ($totalSimpanan < (int)$angsuran) {
			$danaBayar = (int)$angsuran - $totalSimpanan;
		}else{
			$danaKembali = $totalSimpanan - (int)$angsuran;
		}

		$data['admin']				= Auth::user();
		$data['date']				= Carbon::now()->format('d/m/Y');
		$data['bendahara']			= User::where('jabatan', 'Bendahara')->select('nama', 'jabatan')->first();
		$data['ketua']				= User::where('jabatan', 'Ketua')->select('nama', 'jabatan')->first();
		$data['anggota']			= MAnggota::where('id', $request->id)->first();

		$data['dana_bayar']			= $danaBayar;
		$data['dana_kembali']		= $danaKembali;
		$data['simpanan_pokok'] 	= (int)$simpananPokok;
		$data['simpanan_wajib'] 	= (int)$simpananWajib;
		$data['simpanan_sukarela'] 	= (int)$simpananSukarela;
		$data['angsuran_tunggakan'] = (int)$angsuran;

		$data['id_user']			= $request->id;

		return view('anggota.keluar', $data);		
	
	}

	public function konfirmasiKeluar(request $request) {

		$data['title'] = 'Anggota Keluar';

		$danaBayar = 0;
		$danaKembali = 0;

		$simpananPokok = MSimpananPokok::where('id_user', $request->id)->sum('jumlah');
		$simpananWajib = MSimpananWajib::where('id_user', $request->id)->sum('jumlah');
		$simpananSukarela = MSimpananSukarela::where('id_user', $request->id)->sum('jumlah');
		$angsuran = MAngsuran::where('id_user', $request->id)->where('status', 'belum dibayar')->sum('angsuran_pokok');

		$totalSimpanan = (int)$simpananPokok + (int)$simpananWajib + (int)$simpananSukarela;

		if ($totalSimpanan < (int)$angsuran) {
			$danaBayar = (int)$angsuran - $totalSimpanan;
		}else{
			$danaKembali = $totalSimpanan - (int)$angsuran;
		}

		$data['admin']				= Auth::user();
		$data['date']				= Carbon::now()->format('d/m/Y');
		$data['bendahara']			= User::where('jabatan', 'Bendahara')->select('nama', 'jabatan')->first();
		$data['ketua']				= User::where('jabatan', 'Ketua')->select('nama', 'jabatan')->first();
		$data['anggota']			= MAnggota::where('id', $request->id)->first();

		$data['dana_bayar']			= $danaBayar;
		$data['dana_kembali']		= $danaKembali;
		$data['simpanan_pokok'] 	= (int)$simpananPokok;
		$data['simpanan_wajib'] 	= (int)$simpananWajib;
		$data['simpanan_sukarela'] 	= (int)$simpananSukarela;
		$data['angsuran_tunggakan'] = (int)$angsuran;

		$data['id_user']			= $request->id;

		$json_data = json_encode($data);

		MAnggota::where('id', $request->id)
                        ->update([
                            'json_data' => $json_data,
                            'status'	=> 'Tidak Aktif'
                        ]);

        MSimpananPokok::where('id_user', $request->id)->delete();
		MSimpananWajib::where('id_user', $request->id)->delete();
		MSimpananSukarela::where('id_user', $request->id)->delete();
		MAngsuran::where('id_user', $request->id)->where('status', 'belum dibayar')->delete();
		MPinjaman::where('id_user', $request->id)->delete();

		// return view('anggota.keluar', $data);
		return redirect()->route('anggota');		
	
	}

	public function printKeluar(request $request) {

		$anggota = MAnggota::where('id', $request->id)->first();

		$data = $this->showJSON($anggota['json_data']);

        return view('anggota.print_keluar', $data);

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




    //
}
