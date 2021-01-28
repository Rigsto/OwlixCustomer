<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'store_item_id', 'quantity', 'store_id'];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function item(): array {
        $id = $this->store_item_id;

        $client = new Client();
        $response = $client->get((new OwlixApi())->read_store_item(), [
            'headers' => [
                'Authorization' => 'Bearer '.Auth::user()->token,
            ],
            'query' => [
                'id_store_item' => $id
            ]
        ])->getBody();
        $content = json_decode($response, true);

        return $content['data'];
    }

    public function store(){
        $id = $this->store_id;

        $client = new Client();
        $response = $client->get((new OwlixApi())->read_store(), [
            'headers' => [
                'Authorization' => 'Bearer '.Auth::user()
            ],
            'query' => [
                'id_store' => $id
            ]
        ])->getBody();
        $content = json_decode($response, true);

        return $content['data'];
    }

    public function isWishlist(){
        $id = $this->store_item_id;

        $client = new Client();
        $response = $client->get((new OwlixApi())->get_wishlist(), [
            'headers' => [
                'Authorization' => 'Bearer '.Auth::user()->token,
            ],
            'query' => [
                'id_store_item' => $id
            ]
        ])->getBody();
        $content = json_decode($response, true);

        if (count($content['data']['data']) > 0){
            return true;
        }
        return false;
    }
}
