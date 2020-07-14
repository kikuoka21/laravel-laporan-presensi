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
use http\Exception;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class Panggilan
{

    public function SendRequest($url, $data)
    {
        $api = 'http://192.168.1.3:8000/';
//        $api = 'http://192.168.0.17:8000/';
//        $api = 'http://192.168.0.18:8000/';
//        $api = 'http://192.168.12.17:8000/';
//        $api = 'http://192.168.12.33:8000/';
//        $api = 'http://192.168.43.242:8000/';
        try {
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_URL => $api . $url,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => [
                    'parsing' => json_encode($data)
                ]
            ]);

            $resp = curl_exec($curl);

            $resultStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);;
            if ($resultStatus==200) {

                curl_close($curl);
                $json = json_decode($resp);

                return $json;
            } else {
                curl_close($curl);
                return json_decode('{"code":"Telah Terjadi kesalahan pada http request kepada API"}');
            }


        } catch (Exception $e) {
//            return $e;
            $json = [
                'code' => 'Telah Terjadi kesalahan pada http request kepada API'
            ];

            return json_decode($json);
        }
    }

    public function genPassword($pass)
    {

        return md5('%' . md5($pass) . ' secret keynya ad@l@h al-kamal!');
    }


}