<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ProductController;
use App\Http\Controllers\Home\StoreController;
use Illuminate\Support\Facades\Route;

Route::group(
    ['namespace' => 'Home', 'as' => 'home.'],
    function(){
        Route::get('/', [ProductController::class, 'homePage'])->name('home');

        Route::get('item/{id}/detail', [ProductController::class, 'detail'])->name('item.detail');

        Route::get('store/{id}/detail', [StoreController::class, 'detail'])->name('store.detail');

        Route::get('tentang', [HomeController::class, 'about'])->name('about');
        Route::get('kebijakanpengguna', [HomeController::class, 'privacy'])->name('privacy');
        Route::get('syaratketentuan', [HomeController::class, 'terms'])->name('terms');
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
        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::patch('profile', [ProfileController::class, 'update'])->name('profile.edit');

        Route::get('orders', [OrderController::class, 'index'])->name('order');

        Route::post('item/{id}/add', [OrderController::class, 'addToCart'])->name('cart.add');
        Route::post('item/{id}/remove', [OrderController::class, 'removeFromCart'])->name('cart.remove');

        Route::get('cart', [OrderController::class, 'cart'])->name('cart');
        Route::get('checkout', [OrderController::class, 'checkout'])->name('checkout');
    }
);

//Route::get('profil', [UserAuthController::class, 'profile']);
//Route::get('edit', [UserAuthController::class, 'EditProfile']);
//Route::get('product_detail', [ProductController::class, 'productDetail']);
//Route::get('checkout', [OrderController::class, 'checkout']);
//Route::get('Cart', [OrderController::class, 'cart']);
//Route::get('Checkout', [OrderController::class, 'checkout']);


