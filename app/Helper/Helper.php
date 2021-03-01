<?php

namespace App\Helper;

use App\Constants\Network;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Helper{
    static function privateApi($url, $params, $method){
        switch ($method) {
            case 'POST':
                $response = Http::withHeaders([
                    'Authorization' => "Bearer ".session('user')['token']
                ])->post($url, $params);
                return json_decode($response);
                break;
            case 'GET':
                $response = Http::withHeaders([
                    'Authorization' => "Bearer ".session('user')['token']
                ])->get($url, $params);
                return json_decode($response);
                break;
            case 'PATCH':
                $response = Http::withHeaders([
                    'Authorization' => "Bearer ".session('user')['token']
                ])->patch($url, $params);
                return json_decode($response);
                break;
            case 'DELETE':
                $response = Http::withHeaders([
                    'Authorization' => "Bearer ".session('user')['token']
                ])->delete($url, $params);
                return json_decode($response);
                break;
            case 'UPLOAD':
                $response = Http::withHeaders([
                    'Authorization' => "Bearer ".session('user')['token']
                ]);
                foreach ($params['images'] as $key => $image) {
                    $response->attach($key, $image, $key.'.jpg');
                }
                return $response->post($url, $params['body']);
            case 'UPLOAD_FILE':
                $response = Http::withHeaders([
                    'Authorization' => "Bearer ".session('user')['token']
                ]);
                foreach ($params['files'] as $key => $file) {
                    $response->attach($key, $file, $key.'.'.$params['ext']);
                }
                return  json_decode($response->post($url, $params['body']));
            case 'UPLOAD_PATCH':
                $response = Http::withHeaders([
                    'Authorization' => "Bearer ".session('user')['token']
                ]);
                foreach ($params['images'] as $key => $image) {
                    $response->attach($key, $image, $key.'.jpg');
                }
                return $response->patch($url, $params['body']);
            default:
                break;
        }
    }

    static function publicApi($url, $params, $method){
        switch ($method) {
            case 'POST':
                $response = Http::post($url, $params);
                return json_decode($response);
                break;
                break;
            case 'GET':
                $response = Http::get($url, $params);
                return json_decode($response);
                break;
            case 'UPLOAD':
                $response = Http::attach(
                    'image_url', $params['image'], "abc.jpg"
                )->post($url, $params['body']);
                return $response;
                break;
            default:
                # code...
                break;
        }
    }
}

?>
