<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\OwlixApi;
use GuzzleHttp\Client;

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
        // echo json_encode($content);

        return view('customer.wishlist', [
            'datas' => $content['data']['data']
        ]);
    }

    public function addWishlist($id, $from){
        $client = new Client();
        $response = $client->post((new OwlixApi())->create_wishlist(), [
            'headers' => [
                'Authorization' => $this->getToken()
            ],
            'query' => [
                'id_store_item' => $id
            ]
        ])->getBody();
        $content = json_decode($response, true);

        if ($from == "c"){
            return redirect()->route('order.cart');
        } else if ($from == "d"){
            return redirect()->route('home.item.detail', $id);
        }
    }

    public function deleteWishlist($id, $from){
        $client = new Client();
        $response = $client->delete((new OwlixApi())->delete_wishlist(), [
            'headers' => [
                'Authorization' => $this->getToken()
            ],
            'query' => [
                'id_store_item' => $id
            ]
        ])->getBody();
        $content = json_decode($response, true);

        if ($from == "c"){
            return redirect()->route('order.cart');
        } else if ($from == "d"){
            return redirect()->route('home.item.detail', $id);
        }
    }
}
