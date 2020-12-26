<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Base\BaseOrderController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends BaseOrderController
{
    public function index(){
        return view('order.cart', [
            'order' => false,
            'order_process' => 1
        ]);
    }

    public function addToCart(Request $request){

    }

    public function removeFromCart(Request $request){

    }
}
