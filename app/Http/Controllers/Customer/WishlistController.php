<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\OwlixApi;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(){
        $client = new Client();
        $response = $client->get((new OwlixApi())->get_wishlist(), [
            'headers' => [
                'Authorization' => $this->getToken(),
            ],
        ])->getBody();
        $content = json_decode($response, true);

        return view('customer.wishlist', [
            'datas' => $content['data']
        ]);
    }

    public function addWishlist($id){

    }

    public function deleteWishlist($id){

    }
}
