<?php
	/**
	 * Created by PhpStorm.
	 * User: user
	 * Date: 5/27/2019
	 * Time: 1:32 PM
	 */
	
	namespace App\Modul;
	
	use App\Helper\UBLCore;
	use App\Helper\UBLCurl;
	use Illuminate\Http\Request;
	
	class Getnama
	{
		public function getprofil($token, $xuid){
			$appCore = new UBLCore();
			
			
			$key = $appCore->get_ip_addr();
//			$xuid = $request->session()->get("xuid");
//			$token = $request->session()->get('token');
			
			
			$curl = new UBLCurl();
			$hasil = $curl->SendRequest("simbl/personalia/pribadi", [
				'xnip' => $xuid,
				'xtoken' => $token,
				'xuser_key' => $key,
				'xuser_type' => '14'
			]);
			return $hasil;
		}
	}