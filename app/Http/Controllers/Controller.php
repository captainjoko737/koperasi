<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $user;
    private $signed_in;

    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            view()->share('status_user', $this->user->status_user);

            return $next($request);
        });

    }

    public function rounding($value)
    {
        $hundred = substr($value, -2);

        if($hundred > 00){
            $result = $value + (100 - $hundred);
        }else{
            $result = $value;
        }

        return $result;
    }

    public function roundings($value)
    {
        $hundred = substr($value, -2);

        if($hundred > 00){
            $result = $value - $hundred;
        }else{
            $result = $value;
        }

        return $result;
    }
}
