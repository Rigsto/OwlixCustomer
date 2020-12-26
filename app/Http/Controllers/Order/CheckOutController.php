<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Base\BaseOrderController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends BaseOrderController
{
    public function index(){
        return view('order.checkout', [
            'order' => false,
            'order_process' => 2
        ]);
    }
}
