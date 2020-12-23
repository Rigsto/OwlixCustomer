<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function about(){
        return view('home.aboutus');
    }

    public function privacy(){
        return view('home.privacypolicy');
    }

    public function terms(){
        return view('home.termsandconditions');
    }
}
