<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(
    ['namespace' => 'Home', 'as' => 'home.'],
    function(){
        Route::get('/', [ProductController::class, 'homePage'])->name('home');
    }
);

Route::group(
    ['namespace' => 'Auth', 'as' => 'auth.'],
    function (){
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLogin');
        Route::post('login', [LoginController::class, 'login'])->name('login');
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    }
);

Route::group(
    ['namespace' => 'Customer', 'as' => 'customer.', 'middleware' => 'auth', 'prefix' => 'my'],
    function (){

    }
);

//Route::get('profil', [UserAuthController::class, 'profile']);
//Route::get('edit', [UserAuthController::class, 'EditProfile']);
//Route::get('product_detail', [ProductController::class, 'productDetail']);
//Route::get('checkout', [OrderController::class, 'checkout']);
//Route::get('Cart', [OrderController::class, 'cart']);
//Route::get('Checkout', [OrderController::class, 'checkout']);


