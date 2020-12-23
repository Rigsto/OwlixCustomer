<?php

namespace App\Http\Controllers;
use App\Helper\Helper;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Echo_;

class OrderController extends Controller
{
    public function cart(){
        $params = [
            "status" => "NEW"
        ];
        $url = 'https://production.owlix-id.com/api/customer/read_orders';
        $response = Helper::privateApi($url, $params, "GET");

        $data = ['data' => $response];
        if ($response['status'] == "success"){
            foreach ((array) $data as $item){
                foreach($item['data'] as $value){
                    if ($value['id'] == session()->get('user.')){
                        $product_data = $value;
                    }
                }
                }
            return view('Cart', $data);
        }else{
            return redirect('login');
        }
    }

    public function addToCart(){
        $params = [
            'body' => [
                "id_partner_item" => $request->input('product_id'),
                "name" => $request->input('product_name'),
                "id_item_category" => $request->input('category_id'),
                "store_item_description" => $request->input('product_desc'),
                "store_item_price" => $request->input('product_price'),
                "store_item_weight" => $request->input('product_weight')
            ],
            "images" => []
        ]; 

    }

    public function checkout(){
        $params = [
            "status" => "NEW"
        ];
        $url = 'https://production.owlix-id.com/api/customer/read_orders';
        $response = Helper::privateApi($url, $params, "GET");

        $data = ['data' => $response];
        if ($response['status'] == "success"){
            return view('Checkout', $data);
        }else{
            return redirect('login');
        }
    }

}