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

        $responseProduct = $client->get((new OwlixApi())->read_store_item(), [
            'headers' => [
                'Authorization' => $this->getToken()
            ],
            'query' => [
                'id_store' => $id
            ]
        ])->getBody();
        $contentProduct = json_decode($responseProduct, true);

        $totalSold = $this->countSold($contentProduct['data']['store_items']['data']);

        return view('store.detail', [
            'store' => $content['data'],
            'products' => $contentProduct['data']['store_items']['data'],
            'totalProduct' => $contentProduct['data']['store_items']['total'],
            'totalSold' => $totalSold,
        ]);
    }

    private function countSold($datas){
        $total = 0;
        foreach ($datas as $data){
            $total += $data['sold'];
        }
        return $total;
    }
}
