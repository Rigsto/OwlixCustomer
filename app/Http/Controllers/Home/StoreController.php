<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\OwlixApi;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function detail($id){
        $client = new Client();
        $response = $client->get((new OwlixApi())->read_store(), [
            'headers' => [
                'Authorization' => $this->getToken()
            ],
            'query' => [
                'id_store' => $id
            ]
        ])->getBody();
        $content = json_decode($response, true);

        return view('store.detail', [
            'store' => $content['data']
        ]);
    }
}
