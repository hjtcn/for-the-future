<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getIpInfoByApi(Request $request)
    {
        $key = "BenBird";
        $ckey = $request->get('key', '');
        $ip = '192.168.62.74';
        if ($ckey != $key) {
            die('此处不允许访问');
        }

        $curl = curl_init();
        $url = "http://ip.taobao.com/service/getIpInfo.php?ip=" . $ip;
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            throw new \Exception($err);
        }
        $data = json_decode($response, true);
        return $data;
    }
}
