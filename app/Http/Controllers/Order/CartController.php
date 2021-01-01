<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Base\BaseOrderController;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends BaseOrderController
{
    public function index(){
        return view('order.cart', [
            'order' => false,
            'order_process' => 1,
            'items' => $this->getAllItem()
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

        $this->checkCart($request->id_store_item, $request->name, $request->quantity);

        switch ($request->submit){
            case 'buynow':
                //go to check out
                return redirect()->route('order.checkout');
            case 'cart':
            default:
                return redirect()->route('order.cart');
        }
    }

    private function checkCart($id, $name, $quantity){
        $item = CartItem::where('store_item_id', $id)->where('user_id', Auth::id())->get();

        if (count($item) > 0){
            $item->update([
                'quantity' => $quantity
            ]);
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'store_item_id' => $id,
                'quantity' => $quantity,
                'name' => $name
            ]);
        }
    }

    private function getAllItem(){
        return CartItem::where('user_id', Auth::id())->get();
    }

    public function addToFavorite($id){
        return redirect()->route('order.cart');
    }

    public function removeFromCart($id){
        CartItem::find($id)->delete();
        return redirect()->route('order.cart');
    }

    public function submitToCheckOut(Request $request){

    }
}
