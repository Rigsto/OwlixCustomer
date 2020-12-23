<?php

namespace App\Http\Controllers;
use App\Helper\Helper;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Echo_;

class ProductController extends Controller{


    public function productDetail(Request $request){
        $productId = $request->input("product_id");

        $url = 'https://production.owlix-id.com/api/customer/customer_read_all_store_item';
        $response = Helper::privateApi($url, array(), "GET");
        
        $data = ['data' => $response, $productId];
        return view('ProductDetail', $data);
        
    }
    
}