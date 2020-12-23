<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\OwlixApi;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function homePage(){
        $client = new Client();
        $response = $client->get((new OwlixApi())->read_all_store_item())->getBody();
        $content = json_decode($response, true);


        return view('home.homepage', [
            'datas' => $content['data'],
            'categories' => []
        ]);
    }

    public function detail($id){
        return view('product.detail');
    }
}
