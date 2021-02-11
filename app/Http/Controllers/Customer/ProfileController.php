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

        $provinces = AddressProvince::pluck('name', 'id');
        $cities = AddressCity::pluck('name', 'id');

        return view('customer.profile', [
            'profile' => $contentProfile['data'],
            'address' => $contentAddress['data'],
            'provinces' => $provinces,
            'cities' => $cities
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

        return view('customer.editprofile', [
            'profile' => $content['data'],
        ]);
    }

    //update profile
    public function update(Request $request){
        $client = new Client();
        $response = $client->patch((new OwlixApi())->update_profile(), [
            'headers' => [
                'Authorization' => $this->getToken(),
            ],
            'query' => [
                'name' => $request->inputName,
                'email' => $request->inputEmail,
                'phone_number' => $request->inputTelp
            ]
        ])->getBody();
        $content = json_decode($response, true);

        if ($content['status'] == 'success'){
            return redirect()->route('customer.profile')->with('Success', 'Profile updated');
        } else {
            return redirect()->route('customer.profile')->with('Fail', 'Profile fail to update');
        }
    }

    //add address
    public function store(Request $request){
        $client = new Client();
        $response = $client->post((new OwlixApi())->create_address(), [
            'headers' => [
                'Authorization' => $this->getToken(),
            ],
            'form_params' => [
                'fullname' => $request->name,
                'phone_number' => $request->phone,
                'address' => $request->address,
                'province_id' => $request->state,
                'city_id' => $request->city,
                'postal_code' => $request->zip
            ]
        ])->getBody();
        $content = json_decode($response, true);
        $address_id = $content['data']['id_customer'];

        if ($request->hasDefaultAddress == null){
            return redirect()->route('customer.profile.address.default', $address_id);
        }

        return redirect()->route('customer.profile');
    }

    //update address
    public function updateAddress(Request $request, $id){

    }

    //delete address
    public function deleteAddress($id){
        $client = new Client();
        $response = $client->delete((new OwlixApi())->delete_address(), [
            'headers' => [
                'Authorization' => $this->getToken(),
            ],
            'query' => [
                'id_customer_address' => $id,
            ]
        ])->getBody();
        $content = json_decode($response, true);

        return redirect()->route('customer.profile');
    }

    //set default address
    public function setDefault($id){
        $client = new Client();
        $response = $client->patch((new OwlixApi())->set_default_address(), [
            'headers' => [
                'Authorization' => $this->getToken(),
            ],
            'query' => [
                'id_default_address' => $id
            ]
        ])->getBody();
        $content = json_decode($response, true);

        return redirect()->route('customer.profile');
    }
}
