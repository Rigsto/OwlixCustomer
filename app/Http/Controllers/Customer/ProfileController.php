<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\OwlixApi;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $client = new Client();

        $responseProfile = $client->get((new OwlixApi())->detail(), [
            'headers' => [
                'Authorization' => 'Bearer '.Auth::user()->token
            ]
        ])->getBody();
        $contentProfile = json_decode($responseProfile, true);

        $responseOrder = $client->get((new OwlixApi())->read_order(), [
            'headers' => [
                'Authorization' => 'Bearer '.Auth::user()->token
            ]
        ])->getBody();
        $contentOrder = json_decode($responseOrder, true);

        return view('customer.profile', [
            'profile' => $contentProfile['data'],
            'orders' => $contentOrder['data']
        ]);
    }

    public function update(Request $request){

    }
}
