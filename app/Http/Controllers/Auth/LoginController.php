<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\OwlixApi;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function showRegisterForm(){
        return view('auth.register');
    }

    private function registerValidator(array $data){
        return Validator::make($data, [
            'full_name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'password' => ['required'],
            'confirm_password' => ['required'],
        ]);
    }

    public function register(Request $request){
        $validator = $this->registerValidator($request->all());

        if ($validator->fails()){
            return redirect()->route('auth.showRegister')->with('Error', $validator->errors());
        }

        if ($request->password != $request->confirm_password){
            return redirect()->route('auth.showRegister')->with('Error', 'Password tidak sama');
        }

        $client = new Client();
        $response = $client->post((new OwlixApi())->register(), [
            'form_params' => [
                'name' => $request->full_name,
                'email' => $request->email,
                'password' => $request->password,
                'c_password' => $request->c_password
            ]
        ])->getBody();
        $content = json_decode($response, true);

        if ($content['status'] == 'success'){
            $this->updateToken($content['data']['token'], $request->email, $request->full_name);

            return redirect()->route('home.home');
        } else {
            return redirect()->route('auth.showRegister')->with('Fail', $content['message']);
        }
    }

    private function loginValidator(array $data){
        return Validator::make($data, [
            'email' => ['required'],
            'password' => ['required']
        ]);
    }

    public function login(Request $request){
        $validator = $this->loginValidator($request->all());

        if ($validator->fails()){
            return redirect()->route('auth.showLogin')->with('Error', $validator->errors());
        }

        $client = new Client();
        $response = $client->post((new OwlixApi())->login(), [
            'form_params' => [
                'email' => $request->email,
                'password' => $request->password
            ]
        ])->getBody();
        $content = json_decode($response, true);

        if ($content['status'] == 'success'){
            $this->updateToken($content['data']['token'], $request->email, $content['data']['user']['name']);

            return redirect()->route('home.home');
        } else if ($content['status'] == 'failed') {
            return redirect()->route('auth.showLogin')->with('Fail', $content['message']);
        }

        return redirect()->route('auth.showLogin')->with('Fail', 'Wrong Email or Password');
    }

    private function updateToken($token, $email, $name){
        $users = User::where('email', $email)->get();

        if (count($users) == 1){
            $user = $users->first();
            $user->update([
                'token' => $token,
                'name' => $name
            ]);

        } else {
            $user = User::create([
                'email' => $email,
                'token' => $token,
                'name' => $name
            ]);
        }

        Auth::loginUsingId($user->id);
    }

    public function logout(Request $request){
        if (Auth::check()){
            $client = new Client();
            $response = $client->get((new OwlixApi())->logout(), [
                'headers' => [
                    'Authorization' => 'Bearer '.Auth::user()->token
                ]
            ]);

            $content = json_decode($response->getBody(), true);

            if ($content['status'] == 'success'){
                Auth::user()->update([
                    'token' => ''
                ]);
            }

            Auth::logout();
        }
        return redirect()->route('home.home');
    }
}
