<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        return view('order.payment', [
            'order' => false,
            'order_process' => 3
        ]);
    }

    public function success(){
        return view('order.payment_status', [
            'order' => false,
            'order_process' => 4
        ]);
    }
}
