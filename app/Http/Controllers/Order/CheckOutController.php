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
        $address = $this->getAddress();
        return view('order.checkout', [
            'order' => false,
            'order_process' => 2,
            'address' => $address,
            'datas' => $this->getFullData($address['city_id']),
        ]);
    }

    public function checkout(Request $request){
        $done = $this->orderAll($request);
        if ($done){
            $this->deleteOrder();
        }
        return redirect()->route('order.checkout.success');
    }

    public function success(){
        return view('order.order_success', [
            'order' => false,
            'order_process' => 3,
        ]);
    }
}
