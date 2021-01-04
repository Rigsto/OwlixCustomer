<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Base\BaseOrderController;
use App\Http\Controllers\Controller;
use App\Models\OwlixApi;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CheckOutController extends BaseOrderController
{
    public function index(){
        $client = new Client();
        $responseAddress = $client->get((new OwlixApi())->read_address(), [
            'headers' => [
                'Authorization' => $this->getToken()
            ]
        ])->getBody();
        $contentAddress = json_decode($responseAddress, true);

        return view('order.checkout', [
            'order' => false,
            'order_process' => 2,
            'address' => $contentAddress['data'][0],
            'items' => $this->getItemsGrouped(),
            'item_cities' => $this->getCityIds(),
        ]);
    }

    public function payment(Request $request){

    }
}
