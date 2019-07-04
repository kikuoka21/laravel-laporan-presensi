<?php
/**
 * Created by PhpStorm.
 * User: kikuo
 * Date: 6/29/2019
 * Time: 3:13 PM
 */

namespace App\Http\Controllers;

use App\Modul\Panggilan;
use App\Modul\tool;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;

class perbulan
{
    public function __invoke(Request $request)
    {
        if ($request->session()->has('username') && $request->session()->has('token')) {

            $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $result = [
                'nama' => $request->session()->get("nama"),
                'hari_ini' => (new \App\Modul\tool)->gettanggal(),
                'bulan' => $bulan,
                'tahun' => \Carbon\Carbon::now()->format('Y'),

                'isikelas' => '1'
            ];
            return view('page.pilihbulan')->with('result', $result);
//            return redirect('/');
        } else {
            return redirect('auth/login');
        }

    }

    public function carikelas(Request $request)
    {

        $tanggal = $request->input('tahun') . '-' . $this->ubahan($request->input('bulan')) . '-01';
        $key = $request->ip();
        $type = 'www';
        $curl = new Panggilan();
        $input = $curl->SendRequest("api/admin/lihat", [
            'x1d' => $request->session()->get("username"),
            'token' => $request->session()->get("token"),
            'key' => $key,
            'tgl' => $tanggal,
            'type' => $type
        ]);

        if ($input->code == 'OK4') {
            $flag = '0';
        } else if ($input->code == 'TOKEN2' || $input->code == 'TOKEN1') {
            $request->session()
                ->flush();
            $tool = new tool();
            session()->flash('notif', $tool->pesan($input->code));
            return redirect('auth/login');
        } else {
            session()->flash('notif', $input->code);
            $flag = '1';
        }

        $result = [
            'nama' => $request->session()->get("nama"),
            'hari_ini' => (new \App\Modul\tool)->gettanggal(),
            'tanggalnya' => $tanggal,
            'isikelas' => $flag,
//            'datakelas' => json_encode($input)
            'datakelas' => $input->data
        ];

//                //tag sesuaikan
        return view('page.pilihbulan')->with('result', $result);
//            return redirect('/');

    }

    private function ubahan($isi)
    {

        if (strlen($isi) == 1)
            $isi = '0' . $isi;
        return $isi;
    }

    public function data(Request $request, $id, $tanggal)
    {
        if ($request->session()->has('username') && $request->session()->has('token')) {


            $curl = new Panggilan();
            $input = $curl->SendRequest("api/admin/laporan-bulan", [
                'x1d' => $request->session()->get("username"),
                'token' => $request->session()->get("token"),
                'key' => $request->ip(),
                'tgl' => $tanggal,
                'id_kelas' => $id,
                'type' => 'www'
            ]);
            $flag = '0';
            if ($input->code != 'OK4') {
                if ($input->code == 'TOKEN2' || $input->code == 'TOKEN1') {
                    $request->session()
                        ->flush();
                    $tool = new tool();
                    session()->flash('notif', $tool->pesan($input->code));
                    return redirect('auth/login');
                } else {
                    session()->flash('notif', $input->code);
                    $flag = '1';

                }
            }
            $result = [
                'nama' => $request->session()->get("nama"),
                'hari_ini' => (new \App\Modul\tool)->gettanggal(),
                'username' => $request->session()->get("username"),
                'head_tgl' => (new \App\Modul\tool)->geubahtanggal($tanggal),
//                'head_tgl' => $tanggal,
                'isi' => $flag,
                'data' => $input,
            ];
            return view('page.bulanan')->with('result', $result);
        } else {
            return redirect('auth/login');
        }

    }

    public function data2(Request $request, $id, $tanggal)
    {
        if ($request->session()->has('username') && $request->session()->has('token')) {


            $curl = new Panggilan();
            $input = $curl->SendRequest("api/admin/laporan-bulan", [
                'x1d' => $request->session()->get("username"),
                'token' => $request->session()->get("token"),
                'key' => $request->ip(),
                'tgl' => $tanggal,
                'id_kelas' => $id,
                'type' => 'www'
            ]);
            $flag = '0';
            if ($input->code != 'OK4') {
                if ($input->code == 'TOKEN2' || $input->code == 'TOKEN1') {
                    $request->session()
                        ->flush();
                    $tool = new tool();
                    session()->flash('notif', $tool->pesan($input->code));
                    return redirect('auth/login');
                } else {
                    session()->flash('notif', $input->code);
                    $flag = '1';

                }
            }
            $result = [
                'nama' => $request->session()->get("nama"),
                'hari_ini' => (new \App\Modul\tool)->gettanggal(),
                'username' => $request->session()->get("username"),
                'head_tgl' => (new \App\Modul\tool)->geubahtanggal($tanggal),
//                'head_tgl' => $tanggal,
                'isi' => $flag,
                'data' => $input,
            ];
            $pdf = PDF::loadView('page.bulanan', compact('result'))->setPaper('A4', 'landscape');
            return $pdf->download($id.$tanggal.'.pdf');
        } else {
            return redirect('auth/login');
        }

    }

}