<?php

namespace App\Http\Controllers;

use App\Modul\Panggilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    //
    public $result;

    public function __invoke(Request $request)
    {
        if ($request->session()->has('username') && $request->session()->has('token')) {
            return redirect('/');
        } else {
            return view('login');
        }

    }

    public function StartLogin(Request $request)
    {

        $check = Validator::make($request->input(), [
//			'_token' => 'required',
            'xuid' => 'required',
            'xpassword' => 'required'
        ]);
        //class metodh
        $Jparse = new Panggilan();


        $key = $request->ip();
        $type = 'www';
        $xuid = $request->input('xuid');
        $xpass = $Jparse->genPassword($request->input('xpassword'));

        if (!$check->fails()) {
            $curl = new Panggilan();
            $input = $curl->SendRequest("api/auth/login", [
                'x1d' => $xuid,
                'xp455' => $xpass,
                'key' => $key,
                'type' => $type
            ]);
//        return json_encode($input);
//            dd($input);
            if ($input->code == 'OK4') {
                if ($input->data->status == '1') {
                    $token = $input->data->token;

                    $request->session()->put([
                        'username' => trim($xuid),
                        'token' => trim($token),
                        'nama' => trim($input->data->data_pribadi->nama)
                    ]);
//                //tag sesuaikan
////				return redirect('app/home');
                    return redirect('/');
//                    return 'berhasil login';
                } else {
                    session()->flash('notif', 'Siswa Tidak Berhak mengakses web ini');
                    return view('login');
                }


            } else {
//                //tag sesuaikan
                session()->flash('notif', $input->code);
                return view('login');
//
            }


        } else {
//            return 'gklolos';
            session()->flash('notif', 'Form tidak boleh kosong');
            return view('login');

        }


    }

}
