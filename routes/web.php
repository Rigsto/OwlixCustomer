<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\WishlistController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ProductController;
use App\Http\Controllers\Home\StoreController;
use App\Http\Controllers\Order\CartController;
use App\Http\Controllers\Order\CheckOutController;
use App\Http\Controllers\Order\PaymentController;
use Illuminate\Support\Facades\Route;

Route::group(
    ['namespace' => 'Home', 'as' => 'home.'],
    function(){
        Route::get('/', [ProductController::class, 'homePage'])->name('home');

        Route::get('category/{cat}', [ProductController::class, 'searchCategory'])->name('search.category');
        Route::get('search/{name}', [ProductController::class, 'searchName'])->name('search.name');

        Route::get('item/{id}/detail', [ProductController::class, 'detail'])->name('item.detail');

        Route::get('store/{id}/detail', [StoreController::class, 'detail'])->name('store.detail');

        Route::get('tentang', [HomeController::class, 'about'])->name('about');
        Route::get('kebijakanpengguna', [HomeController::class, 'privacy'])->name('privacy');
        Route::get('syaratketentuan', [HomeController::class, 'terms'])->name('terms');
    }
);

Route::group(
    ['namespace' => 'Order', 'as' => 'order.', 'middleware' => 'auth'],
    function (){
        Route::post('buy', [CartController::class, 'buy'])->name('buy');

        Route::get('cart', [CartController::class, 'index'])->name('cart');
        Route::get('cart/{id}/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
        Route::get('cart/remove', [CartController::class, 'removeAllFromCart'])->name('cart.remove.all');
        Route::post('cart/checkout', [CartController::class, 'submitToCheckOut'])->name('cart.checkout');
        Route::get('cart/promo', [CartController::class, 'kodePromo'])->name('cart.promo');

        Route::get('checkout', [CheckOutController::class, 'index'])->name('checkout');
        Route::post('checkout/payment', [CheckOutController::class, 'checkout'])->name('checkout.payment');
        Route::get('checkout/success', [CheckOutController::class, 'success'])->name('checkout.success');
    }
);

Route::group(
    ['namespace' => 'Auth', 'as' => 'auth.'],
    function (){
        Route::get('register', [LoginController::class, 'showRegisterForm'])->name('showRegister');
        Route::post('register', [LoginController::class, 'register'])->name('register');
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLogin');
        Route::post('login', [LoginController::class, 'login'])->name('login');
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    }
);

Route::group(
    ['namespace' => 'Customer', 'as' => 'customer.', 'middleware' => 'auth', 'prefix' => 'my'],
    function (){
        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('orders', [OrderController::class, 'index'])->name('order');
        Route::get('order/items', [OrderController::class, 'show'])->name('order.items');

        Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist');
        Route::get('wishlist/{id}/{from}/add', [WishlistController::class, 'addWishlist'])->name('wishlist.add');
        Route::get('wishlist/{id}/{from}/delete', [WishlistController::class, 'deleteWishlist'])->name('wishlist.delete');
    }
);


