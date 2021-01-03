<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseOrderController extends Controller
{
    public function getOrder(){
        return $order = Order::where('user_id', Auth::id())->get();
    }

    public function getItems() {
        $order = $this->getOrder();

        if (count($order) > 0){
            return $order->first()->items;
        } else {
            return [];
        }
    }
}
