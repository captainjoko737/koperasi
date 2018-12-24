<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\MConfig;
use Carbon\Carbon;

class Pengaturan extends Controller
{
    
    public function index() {
    	$data['result'] = MConfig::all();

    	return view('pengaturan.index', $data);
    }

    public function detail(request $request) {

    	$data['result'] = MConfig::where('id', $request['id'])->first();

    	return view('pengaturan.detail', $data);
    }

    public function save(request $request) {

		$config = MConfig::where('id', $request->id)->first();
		
		$config->value = $request->value;

		$config->save();

		return redirect()->route('pengaturan.index');
	}

}
