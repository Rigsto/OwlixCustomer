<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\CourierInfo;
use App\Models\Order;
use App\Models\OwlixApi;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseOrderController extends Controller
{
    // CART SYSTEM ====================================================================================================
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

    // CHECKOUT SYSTEM ================================================================================================
    public function getFullData($cityTo){
        $this->checkSystemOrder();
        $stores = $this->getStores();
        $full_data = [];

        foreach ($stores as $store){
            $weight = 0;
            $items = [];

            $store_info['id'] = $store['id'];
            $store_info['name'] = $store['name'];
            $store_info['city_id'] = $store['city_id'];

            $all_items = $this->getAllItems($store['id']);

            foreach ($all_items as $item){
                $item_info = $item->item();

                $item_data['id'] = $item_info['id'];
                $item_data['name'] = $item_info['name'];
                $item_data['price'] = $item_info['store_item_price'];
                $item_data['weight'] = $item_info['partner_item']['weight'] ?? 0;
                $item_data['quantity'] = $item->quantity;

                array_push($items, $item_data);
                $weight += $item_data['weight'];
            }

            if ($cityTo == null){
                $ongkir = null;
            } else {
                $ongkir = $this->readAllOngkir($store['id'], $cityTo, $weight);
            }

            $data['store'] = $store_info;
            $data['items'] = $items;
            $data['total_weight'] = $weight;

            $data['ongkir'] = $ongkir;
            array_push($full_data, $data);
        }

        return $full_data;
    }

    private function checkSystemOrder(){
        if (Auth::user()->order == null){
            return redirect()->route('order.cart');
        }
    }

    public function getAddress(){
        $client = new Client();
        $responseDefaultAddress = $client->get((new OwlixApi())->detail(), [
            'headers' => [
                'Authorization' => $this->getToken()
            ],
        ])->getBody();
        $contentDefaultAddress = json_decode($responseDefaultAddress, true);
        $defaultAddress = $contentDefaultAddress['data']['id_default_address'];

        if ($defaultAddress == null){
            return null;
        }

        $responseAddress = $client->get((new OwlixApi())->read_address(), [
            'headers' => [
                'Authorization' => $this->getToken()
            ],
            'query' => [
                'id_customer_address' => $defaultAddress
            ]
        ])->getBody();
        $contentAddress = json_decode($responseAddress, true);
        return $contentAddress['data'];
    }

    private function getAllItems($store_id){
        $order_id = Auth::user()->order->id;

        $items = CartItem::where('order_id', $order_id)->where('store_id', $store_id)->get();
        return $items;
    }

    private function getStores()
    {
        $order_id = Auth::user()->order->id;

        $store_ids = CartItem::select('store_id')->where('order_id', $order_id)->groupBy('store_id')->get();
        $stores = [];

        if (count($store_ids) > 1){
            foreach ($store_ids as $stid){
                array_push($stores, $this->searchStoreDetails($stid->store_id));
            }
        } else if (count($store_ids) == 1) {
            array_push($stores, $this->searchStoreDetails($store_ids[0]['store_id']));
        }
        return $stores;
    }

    private function searchStoreDetails($id){
        $client = new Client();
        $response = $client->get((new OwlixApi())->read_store(), [
            'headers' => [
                'Authorization' => $this->getToken(),
            ],
            'query' => [
                'id_store' => $id
            ]
        ])->getBody();
        $content = json_decode($response, true);

        return $content['data'];
    }

    public function readAllOngkir($origin, $destination, $weight){
        $couriers = ['JNE', 'POS', 'TIKI'];
        $ongkir = [];

        foreach ($couriers as $courier){
            $costs = $this->readOngkirFromSystem($origin, $destination, $weight, $courier);

            foreach ($costs as $cost){
                if ($courier == 'POS'){
                    $codeServer = "REG";
                } else {
                    $codeServer = $cost['service'];
                }
                $cour = CourierInfo::where('code', $courier)->where('service', $codeServer)->get()[0];

                $data['id'] = $cour->id;
                $data['name'] = $cour->name;
                $data['est'] = explode(" ", $cost['cost'][0]['etd'])[0];
                $data['price'] = $cost['cost'][0]['value'];

                array_push($ongkir, $data);
            }
        }

        return $ongkir;
    }

    private function readOngkirFromSystem($origin, $destination, $weight, $courier){
        $client = new Client();
        $response = $client->get((new OwlixApi())->read_ongkir(), [
            'headers' => [
                'Authorization' => $this->getToken(),
            ],
            'query' => [
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => strtolower($courier)
            ]
        ])->getBody();
        $content = json_decode($response, true);

        return $content['data']['rajaongkir']['results'][0]['costs'];
    }

    // PAYMENT SYSTEM =================================================================================================
    public function orderAll($data){
        $order_id = Auth::user()->order->id;
        $store_ids = CartItem::select('store_id')->where('order_id', $order_id)->groupBy('store_id')->get();

        if (count($store_ids) > 1){
            foreach ($store_ids as $sid){
                $this->decodeDataPerStoreId($sid->store_id, $data);
            }
        } else if (count($store_ids) == 1) {
            $this->decodeDataPerStoreId($store_ids[0]['store_id'], $data);
        }

        return true;
    }

    private function decodeDataPerStoreId($store_id, $data){
        $courCode = "cour".$store_id;
        $noteCode = "note".$store_id;

        $courData = explode("-", $data->input($courCode));
        $courId = $courData[0];
        $courExpense = $courData[1];

        $this->orderPerStore($store_id, $courId, $courExpense, $data->input($noteCode));
    }

    private function orderPerStore($store_id, $courier_id, $delivery_expense, $note){
        $order_id = Auth::user()->order->id;
        $item_database = CartItem::where('order_id', $order_id)->where('store_id', $store_id)->get();

        $item_json = [];
        foreach ($item_database as $item){
            $item_data['id_store_item'] = $item->store_item_id;
            $item_data['quantity'] = $item->quantity;

            array_push($item_json, $item_data);
        }

        $courier = CourierInfo::find($courier_id);

        $client = new Client();
        $responseDefaultAddress = $client->get((new OwlixApi())->detail(), [
            'headers' => [
                'Authorization' => $this->getToken()
            ],
        ])->getBody();
        $contentDefaultAddress = json_decode($responseDefaultAddress, true);
        $defaultAddress = $contentDefaultAddress['data']['id_default_address'];

        $client = new Client();
        $response = $client->post((new OwlixApi())->create_order(), [
            'headers' => [
                'Authorization' => $this->getToken(),
            ],
            'form_params' => [
                'note' => $note,
                'courier_code' => $courier->code,
                'courier_service' => $courier->service,
                'delivery_expense' => $delivery_expense,
                'id_customer_address' => $defaultAddress,
                'order_item' => $item_json,
            ]
        ])->getBody();
        $content = json_decode($response, true);

        if ($content['status'] == 'success'){
            $this->deleteCartItem($store_id);
        }
    }

    private function deleteCartItem($store_id){
        $order_id = Auth::user()->order->id;
        CartItem::where('order_id', $order_id)->where('store_id', $store_id)->delete();
    }

    public function deleteOrder(){
        $order_id = Auth::user()->order->id;
        Order::where('id', $order_id)->delete();
    }
}
