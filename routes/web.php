<?php

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'allProducts']);
Route::get('profil', [UserAuthController::class, 'profile']);
Route::get('edit', [UserAuthController::class, 'EditProfile']);
Route::any('login', [UserAuthController::class, 'login']);
Route::any('logout', [UserAuthController::class, 'logout']);
Route::get('product_detail', [ProductController::class, 'productDetail']);
Route::get('checkout', [OrderController::class, 'checkout']);
Route::get('Cart', [OrderController::class, 'cart']);
Route::get('Checkout', [OrderController::class, 'checkout']);


