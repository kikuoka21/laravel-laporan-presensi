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

class persemester
{
	public function __invoke(Request $request)
	{
		if ($request->session()->has('username') && $request->session()->has('token')) {

			$result = [
				'nama' => $request->session()->get("nama"),
				'hari_ini' => (new \App\Modul\tool)->gettanggal(),
				'tahun' => \Carbon\Carbon::now()->format('Y') ,
				'flag' => '1'
			];
			return view('page.pilihsemester')->with('result', $result);
//            return redirect('/');
		} else {
			return redirect('auth/login');
		}

	}

	public function carikelas(Request $request)
	{

		if ($request->session()->has('username') && $request->session()->has('token')) {
			$tanggal = $request->input('tahun_ajar');
			$tanggal = $tanggal . ($tanggal + 1);
			$key = $request->ip();
			$type = 'www';
			$curl = new Panggilan();
			$input = $curl->SendRequest("api/admin/master/kelas/list", [
				'x1d' => $request->session()->get("username"),
				'token' => $request->session()->get("token"),
				'key' => $key,
				'thn_ajar' => $tanggal,
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
				'smes'=>  $request->input('semester'),
				'flag' => $flag,
//            'datakelas' => json_encode($input)
				'datakelas' => $input->data
			];

//                //tag sesuaikan
			return view('page.pilihsemester')->with('result', $result);
		} else {
			return redirect('auth/login');
		}

	}

	public function data(Request $request, $id, $smes)
	{
		if ($request->session()->has('username') && $request->session()->has('token')) {


			$curl = new Panggilan();
			$input = $curl->SendRequest("api/admin/laporan-smes", [
				'x1d' => $request->session()->get("username"),
				'token' => $request->session()->get("token"),
				'key' => $request->ip(),
				'smes' => $smes,
				'id_kelas' => $id,
				'type' => 'www'
			]);
			$flag = '0';

			$awal = Carbon::now()->toDateString();
			$akhir = Carbon::now()->toDateString();
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
			}else{
				$awal= $input->periode->awal;
				$akhir= $input->periode->akhir;
			}
			$result = [
				'nama' => $request->session()->get("nama"),
				'hari_ini' => (new \App\Modul\tool)->gettanggal(),
				'username' => $request->session()->get("username"),
				'awal' => (new \App\Modul\tool)->geubahtanggalbln($awal),
				'akhir' => (new \App\Modul\tool)->geubahtanggalbln($akhir),
//                'head_tgl' => $tanggal,
				'isi' => $flag,
				'data' => $input,
			];
//			return json_encode($result);
			return view('page.semesteran')->with('result', $result);
		} else {
			return redirect('auth/login');
		}

	}

}