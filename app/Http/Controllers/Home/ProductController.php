<?php

namespace App\Http\Controllers\Home;

use App\Helper\Helper;
use App\Http\Controllers\Base\BaseHomeController;
use App\Models\OwlixApi;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class ProductController extends BaseHomeController
{
    public function homePage(){
        $home = true;

        try {
            $client = new Client();
            $response = $client->get((new OwlixApi())->read_store_item())->getBody();
            $content = json_decode($response, true)['data']['store_items']['data'];

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

    public function get_all_product(Request $request){

        $params = [
            "paginate" => 5,
            "name" => $request->product_name,
            "id_item_category" => $request->category_id
        ];
        $products = Helper::publicApi((new OwlixApi())->read_store_item(), $params, 'GET');
        $total_page = ceil($products->data->store_items->total/$products->data->store_items->per_page);
        $data = [
            'current_page' => $request->current_page,
            'total_page' => $total_page,
            'search_query' => $request->product_name,
            'products' => $products->data->store_items->data,
            'categories' => $this->readAllCategories()
        ];

        if ($request->category_id){
            $data['category_id'] = $request->category_id;
        }

        return view('products', $data);
    }

    public function searchName($name){

    }

    public function searchCategory($cat){
        $home = false;

        $client = new Client();
        $categories = $this->readAllCategories();

        if ($cat == 0){
            $response = $client->get((new OwlixApi())->read_store_item())->getBody();
            $content = json_decode($response, true)['data']['store_items']['data'];

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
            $content = json_decode($response, true)['data']['store_items']['data'];

            $categories = $this->readAllCategories();

            return view('home.product_list', [
                'items' => $content,
                'categories' => $categories,
                'is_home' => $home,
                'title' => $this->getCategoryName($categories, $cat)
            ]);
        }
    }

    public function detail($id){
        $client = new Client();
        $response = $client->get((new OwlixApi())->read_store_item(), [
            'query' => [
                'id_store_item' => $id
            ]
        ])->getBody();
        $content = json_decode($response);

        $categories = $this->readAllCategories();
        $isWishlist = $this->isWishlist($id);   
        $params = [
            "id_item_category" => $content->data->id_item_category
        ];
        $related_product = Helper::privateApi((new OwlixApi())->read_store_item(), $params, 'GET');
        $reviews = Helper::publicApi((new OwlixApi())->read_review(), [
            'paginate' => 5,
            'id_store_item' => $id
        ], 'GET');

        return view('product.detail', [
            'data' => $content->data,
            'related_products' => $related_product->data->store_items->data,
            'category_id' => $content->data->id_item_category,
            'category_name' => $this->getCategoryName($categories, $content->data->id_item_category),
            'wishlist' => $isWishlist,
            'reviews' => $reviews->data->data
        ]);
    }
}
