<?php

namespace App\Helper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helper\Helper;

class Helper{
    static function privateApi($url, $params, $method){
        switch ($method) {
            case 'POST':
                // $request = array(
                //     "headers" => array(
                //         "Authorization" => "Bearer".session('user.token'),
                //         "content_type" => "multipart/form-data"
                //     ),
                //     "form_params" => $params
                // );
                // $response = Http::post($url, $params);
                // Http::post()
                // return $response;
                break;
            case 'GET':
                $response = Http::withHeaders([
                    'Authorization' => "Bearer ".session('user')['token']
                ])->get($url, $params);
                return $response;
                break;
            default:
                # code...
                break;
        }
        // Http::
    }
}

?>
