<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\OwlixApi;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $client = new Client();

        $response = $client->get((new OwlixApi())->read_order(), [
            'headers' => [
                'Authorization' => $this->getToken()
            ]
        ])->getBody();
        $contentOrder = json_decode($response, true);

        return view('customer.orders', [
            'orders_new' => $contentOrder['data']['NEW'],
            'orders_paid' => $contentOrder['data']['PAID'],
            'orders_ship' => $contentOrder['data']['SHIPPING'],
            'orders_reject' => $contentOrder['data']['REJECTED'],
        ]);
    }

    public function show(Request $request){
        $client = new Client();
        $response = $client->get((new OwlixApi())->read_order(), [
            'headers' => [
                'Authorization' => $this->getToken()
            ],
            'query' => [
                'id_order' => $request->id_order
            ]
        ])->getBody();
        $content = json_decode($response, true);

        return $this->jsonModal('modal.orderdetails', [
            'data' => $content['data']
        ]);
    }

    public function jsonModal($view, $data){
        $vd = view($view, $data)->render();
        return response()->json([
            'modal' => $vd
        ]);
    }
}
