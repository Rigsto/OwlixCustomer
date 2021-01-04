<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseOrderController extends Controller
{
    public function getOrder(){
        return $order = Order::where('user_id', Auth::id())->get();
    }

    public function getItems()
    {
        $order = $this->getOrder();

        if (count($order) > 0) {
            return $order->first()->items;
        } else {
            return [];
        }
    }

    public function getItemsGrouped(){
        $order_id = Auth::user()->order->id;

        $items = CartItem::where('order_id', $order_id)->orderBy('city_id')->get();
        return $items;
    }

    public function getCityIds(){
        $order_id = Auth::user()->order->id;

        $cities = CartItem::select('city_id')->where('order_id', $order_id)->groupBy('city_id')->get();
        return $cities;
    }
}
