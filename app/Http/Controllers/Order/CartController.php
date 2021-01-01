<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Base\BaseOrderController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends BaseOrderController
{
    public function index(){
        return view('order.cart', [
            'order' => false,
            'order_process' => 1
        ]);
    }

    private function inputValidator(array $data){
        return Validator::make($data, [
            'quantity' => ['numeric', 'min:1']
        ]);
    }

    public function buy(Request $request){
        $validator = $this->inputValidator($request->all());

        if ($validator->fails()){
            return redirect()->route('home.item.detail', ['id' => $request->id_store_item])->with('Error', $validator->errors());
        }

        switch ($request->submit){
            case 'buynow':

                break;
            case 'cart':
                break;
        }
    }

    public function addToCart(Request $request){

    }

    public function removeFromCart(Request $request){

    }
}
