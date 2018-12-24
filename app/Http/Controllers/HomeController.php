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
use Carbon\Carbon;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data['simpanan_pokok']     = (int)MSimpananPokok::sum('jumlah');
        $data['simpanan_wajib']     = (int)MSimpananWajib::sum('jumlah');
        $data['simpanan_sukarela']  = (int)MSimpananSukarela::sum('jumlah');
        $data['jasa']               = (int)MAngsuran::where('status', 'lunas')->sum('angsuran_bunga');
        $data['denda']              = (int)MAngsuran::where('status', 'lunas')->sum('denda');
        $data['dana_pinjaman']      = (int)MAngsuran::where('status', 'belum dibayar')->sum('angsuran_pokok');  
        $totalAngsuran              = (int)MAngsuran::where('status', 'lunas')->sum('total_angsuran');   
        $data['kas']                = $data['simpanan_pokok'] + $data['simpanan_wajib'] + $data['simpanan_sukarela'] + $data['jasa'] + $data['denda'] + $totalAngsuran;

        // return $data;

        // return Auth::user();
        return view('welcome', $data);
    }
}
