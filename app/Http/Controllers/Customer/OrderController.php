<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\OwlixApi;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $client = new Client();

        $response = $client->get((new OwlixApi())->read_order(), [
            'headers' => [
                'Authorization' => $this->getToken()
            ]
        ])->getBody();
        $contentOrder = json_decode($response, true);

        return view('customer.orders', [
            'orders_new' => $contentOrder['data']['NEW'],
            'orders_paid' => $contentOrder['data']['PAID'],
            'orders_ship' => $contentOrder['data']['SHIPPING'],
            'orders_reject' => $contentOrder['data']['REJECTED'],
            'orders_completed' => $contentOrder['data']['COMPLETED']
        ]);
    }

    public function show(Request $request){
        $client = new Client();
        $response = $client->get((new OwlixApi())->read_order(), [
            'headers' => [
                'Authorization' => $this->getToken()
            ],
            'query' => [
                'id_order' => $request->id_order
            ]
        ])->getBody();
        $content = json_decode($response, true);

        return $this->jsonModal('modal.orderdetails', [
            'data' => $content['data']
        ]);
    }

    public function rating(Request $request){
        $client = new Client();
        $response = $client->get((new OwlixApi())->read_order(), [
            'headers' => [
                'Authorization' => $this->getToken()
            ],
            'query' => [
                'id_order' => $request->id_order
            ]
        ])->getBody();
        $content = json_decode($response, true);

        return $this->jsonModal('modal.rating', [
            'data' => $content['data']
        ]);
    }

    public function giveRating(Request $request){
        $client = new Client();
        $response = $client->get((new OwlixApi())->read_order(), [
            'headers' => [
                'Authorization' => $this->getToken()
            ],
            'query' => [
                'id_order' => $request->orderId
            ]
        ])->getBody();
        $data = json_decode($response, true)['data'];

        foreach ($data['order_items'] as $item){
            $id_store_item = $item['store_item']['id'];

            $ratingAndId = 'rating'.$id_store_item;
            $descAndId = 'desc'.$id_store_item;

            $client = new Client();
            $response = $client->post((new OwlixApi())->create_rating(), [
                'headers' => [
                    'Authorization' => $this->getToken()
                ],
                'form_params' => [
                    'id_store_item' => $id_store_item,
                    'rate' => $request->$ratingAndId,
                    'description' => $request->$descAndId,
                ]
            ])->getBody();
            $content = json_decode($response, true);
        }

        $client = new Client();
        $response = $client->patch((new OwlixApi())->rate_order(), [
            'headers' => [
                'Authorization' => $this->getToken()
            ],
            'query' => [
                'id_order' => $request->orderId
            ]
        ])->getBody();
        $content = json_decode($response, true);

        return redirect()->route('customer.order');
    }

    private function jsonModal($view, $data){
        $vd = view($view, $data)->render();
        return response()->json([
            'modal' => $vd
        ]);
    }
}
