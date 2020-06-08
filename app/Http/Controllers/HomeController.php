<?php

namespace App\Http\Controllers;

use App\Modul\Getnama;
use App\Modul\Panggilan;
use App\Modul\tool;
use Illuminate\Http\Request;
use App\Helper\UBLCore;
use App\Helper\UBLCurl;
use App\Helper\UBLSecurity;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->session()->has('username') && $request->session()->has('token')) {

            $curl = new Panggilan();
            $key = $request->ip();
            $type = 'www';
            $input = $curl->SendRequest("api/admin/dashboard", [
                'x1d' => $request->session()->get("username"),
                'token' => $request->session()->get("token"),
                'key' => $key,
                'type' => $type
            ]);

            if ($input->code == 'OK4') {

                $listkelas = [];
                $i =0;
                foreach ($input->statistik->list_kelas as $datasiswa){
                    if($datasiswa->alpha>0){
                        $listkelas[$i]  = [
                            'name'=> $datasiswa->kelas,
                            'y'=> $datasiswa->alpha
                        ];
                            $i ++;
                    }
                }
                unset($input->statistik->list_kelas );


                $result = [
                    'nama' => $request->session()->get("nama"),
                    'hari_ini' => (new tool)->gettanggal(),

                    'data' => $input->statistik,
                    'listkelas' => $listkelas
                ];
            } else if ($input->code == 'TOKEN2' || $input->code == 'TOKEN1') {
                $request->session()
                    ->flush();
                $tool = new tool();
                session()->flash('notif', $tool->pesan($input->code));
                return redirect('auth/login');

            } else {

                session()->flash('notif', $input->code);
                $result = [
                    'nama' => $request->session()->get("nama"),
                    'hari_ini' => (new tool)->gettanggal(),

                    'data' => []
                ];
            }

            return view('page.profile')->with('result', $result);
        } else {
            return redirect('auth/login');
        }

    }


}
