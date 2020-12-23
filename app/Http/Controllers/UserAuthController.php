<?php

namespace App\Http\Controllers;
use App\Helper\Helper;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Echo_;

class UserAuthController extends Controller
{
public function login(Request $request){        

        switch ($request->method()) {
            case 'POST':
                $email = $request->input('email');
                $password = $request->input('password');

                $url = 'https://production.owlix-id.com/api/customer/login';
                $params = array(
                    "email" => $email,
                    "password" => $password
                );
                $response = Http::post($url, $params);
                
                if ($response['status'] == 'success'){
                    session()->put('user.token', $response["data"]["token"]);

                    $url = 'https://production.owlix-id.com/api/customer/detail';
                    $response = Helper::privateApi($url, array(), "GET");

                    if ($response['status'] == 'success'){
                        session()->put('user.data', $response["data"]);
                        return redirect('/');
                    }else{
                        return view('login', array($response));
                    }

                } else{
                    $data = array(
                        "data" => $response
                    );
                    return view('login', $data);
                }

                break;
            default:
                if (session()->get('user.token') != null){
                    return redirect('/');
                }else{
                    // $data = array(
                    //     "data" => $response
                    // );
                    return view('login', array());
                }
                break;
        }      
    }
    
    public function logout()
    {
        $url = 'https://production.owlix-id.com/api/customer/logout';
        $response = Helper::privateApi($url, array(), "GET");
        session()->forget('user');
        return redirect('/');
    }

    public function EditProfile(){
        if (session()->get('user.token') != null){
            return view('EditProfil');
        }else{
            return view('login', array());
        }
    }


    public function profile(){
        if (session()->get('user.token') != null){
            $params = [
                "status" => "NEW",
            ];
            $url = 'https://production.owlix-id.com/api/customer/read_orders';
            $response = Helper::privateApi($url, $params, "GET");
    
            $data = ['data' => $response];
            if ($response['status'] == "success"){
                return view('Profil', $data);
                
            }else{
                return redirect('login');
            }
        }else{
            return view('login', array());
        }
    }
}