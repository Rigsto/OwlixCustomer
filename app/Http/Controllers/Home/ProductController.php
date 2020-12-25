<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Base\BaseHomeController;
use App\Models\OwlixApi;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ProductController extends BaseHomeController
{
    public function homePage(){
        $home = true;

        try {
            $client = new Client();
            $response = $client->get((new OwlixApi())->read_all_store_item())->getBody();
            $content = json_decode($response, true)['data'];

        } catch (GuzzleException $e) {
            $content = [];
        }

        return view('home.product_list', [
            'items' => $content,
            'categories' => $this->readAllCategories(),
            'is_home' => $home,
            'title' => 'Semua Produk'
        ]);
    }

    public function searchName($name){

    }

    public function searchCategory($cat){
        $home = false;

        $client = new Client();
        $categories = $this->readAllCategories();

        if ($cat == 0){
            $response = $client->get((new OwlixApi())->read_all_store_item())->getBody();
            $content = json_decode($response, true)['data'];

            return view('home.product_list', [
                'items' => $content,
                'categories' => $categories,
                'is_home' => $home,
                'title' => 'Semua Produk'
            ]);

        } else {
            $response = $client->get((new OwlixApi())->read_store_item(), [
                'query' => [
                    'id_item_category' => $cat
                ]
            ])->getBody();
            $content = json_decode($response, true)['data']['data'];

            $categories = $this->readAllCategories();

            return view('home.product_list', [
                'items' => $content,
                'categories' => $categories,
                'is_home' => $home,
                'title' => $categories[$cat-1]['name']
            ]);
        }
    }

    public function detail($id){
        return view('product.detail');
    }
}
