<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Base\BaseOrderController;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends BaseOrderController
{
    public function index(){
        return view('order.cart', [
            'order' => false,
            'order_process' => 1,
            'items' => $this->getItems()
        ]);
    }

    private function inputValidator(array $data){
        return Validator::make($data, [
            'quantity' => ['numeric', 'min:1', 'required'],
            'id_store_item' => ['numeric', 'required'],
            'name' => ['required']
        ]);
    }

    public function buy(Request $request){
        $validator = $this->inputValidator($request->all());

        if ($validator->fails()){
            return redirect()->route('home.item.detail', ['id' => $request->id_store_item])->with('Error', $validator->errors());
        }

        $this->checkCart(
            $request->id_store_item,
            $request->name,
            $request->quantity,
            $request->price,
            $request->city
        );

        switch ($request->submit){
            case 'buynow':
                //go to check out
                return redirect()->route('order.checkout');
            case 'cart':
            default:
                return redirect()->route('order.cart');
        }
    }

    private function checkCart($id, $name, $quantity, $price, $city){
        $or = $this->getOrder();

        if (count($or) == 1){
            $order = $or->first();
        } else {
            $order = Order::create([
                'user_id' => Auth::id()
            ]);
        }

        $item = CartItem::where('store_item_id', $id)->where('order_id', $order->id)->get();

        if (count($item) > 0){
            $item->update([
                'quantity' => $quantity
            ]);
        } else {
            CartItem::create([
                'order_id' => $order->id,
                'store_item_id' => $id,
                'quantity' => $quantity,
                'name' => $name,
                'price' => $price,
                'city_id' => $city
            ]);
        }
    }

    public function addToFavorite($id){
        return redirect()->route('order.cart');
    }

    public function removeFromCart($id){
        CartItem::find($id)->delete();
        return redirect()->route('order.cart');
    }

    public function removeAllFromCart(){
        $items = $this->getItems();
        foreach ($items as $item){ $item->delete(); }

        $order = Order::where('user_id', Auth::id());
        $order->delete();

        return redirect()->route('order.cart');
    }

    public function kodePromo(Request $request){
        $order = Order::where('user_id', Auth::id())->first();
        $order->update([
            'promo_code' => $request->code,
            'discount' => $request->total * 20 / 100
        ]);

        //TODO: take data from backend, $request->code

        return response()->json([
            'discount' => 20
        ]);
    }

    public function submitToCheckOut(Request $request){
        if (count($this->getOrder()) > 0 && count($this->getItems()) > 0){
            return redirect()->route('order.checkout');
        }
    }
}
