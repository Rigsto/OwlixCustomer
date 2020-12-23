<?php

namespace App\Http\Controllers;
use App\Helper\Helper;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Echo_;

class HomeController extends Controller{
    public function allProducts(){
        $url = 'https://production.owlix-id.com/api/customer/customer_read_all_store_item';
        $response = Helper::privateApi($url, array(), "GET");
        
        $categories = 'https://production.owlix-id.com/api/store/read_item_categories';
        $categoryResponse = Helper::privateApi($categories, array(), "GET");

        $data = [
            "data" => $response,
            "categories" => $categoryResponse
        ];
        
        if ($response['status'] == "success"){
            return view('index', $data);
        } else{
            return view('index', $data);
        }
    }
    
}