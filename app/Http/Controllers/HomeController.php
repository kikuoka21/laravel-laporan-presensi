<?php

namespace App\Http\Controllers;

use App\Modul\Getnama;
use Illuminate\Http\Request;
use App\Helper\UBLCore;
use App\Helper\UBLCurl;
use App\Helper\UBLSecurity;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {


        $result = [
						'nama' => $request->session()->get("nama"),
            'hari_ini' => (new \App\Modul\tool)->gettanggal()
        ];
        return view('page.profile')->with('result', $result);


    }


}
