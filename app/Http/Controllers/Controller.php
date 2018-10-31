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
        $hundred = substr($value, -3);

        if ($hundred == 000) {
            $result = $value;
        }else if($hundred < 499){
            $result = $value + (500 - $hundred);
        }else if($hundred < 999){
            $result = $value + (1000 - $hundred);
        }
// echo json_encode($result);
// die();
        return $result;
    }
}
