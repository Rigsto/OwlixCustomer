<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\AddressCity;
use App\Models\AddressProvince;
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
                'Authorization' => $this->getToken()
            ]
        ])->getBody();
        $contentProfile = json_decode($responseProfile, true);

        $responseAddress = $client->get((new OwlixApi())->read_address(), [
            'headers' => [
                'Authorization' => $this->getToken()
            ]
        ])->getBody();
        $contentAddress = json_decode($responseAddress, true);

        return view('customer.profile', [
            'profile' => $contentProfile['data'],
            'address' => $contentAddress['data'],
        ]);
    }

    //edit profile
    public function edit(){
        $client = new Client();

        $response = $client->get((new OwlixApi())->detail(), [
            'headers' => [
                'Authorization' => $this->getToken()
            ]
        ])->getBody();
        $content = json_decode($response, true);

        $provinces = AddressProvince::pluck('name', 'id');
        $cities = AddressCity::where('province_id', $content['data']['province_id'])->pluck('name', 'id');

        return view('customer.editprofile', [
            'profile' => $content['data'],
            'provinces' => $provinces,
            'cities' => $cities,
        ]);
    }

    public function update(Request $request){

    }
}
