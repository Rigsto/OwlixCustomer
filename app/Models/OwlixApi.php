<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwlixApi
{
    private $base_url;
    private $url;

    public function __construct(){
        $this->base_url = "https://production.owlix-id.com/api/customer/";
        $this->url = "https://production.owlix-id.com/api/";
    }

    //--------------------------------------------------------------------------
    //authentication
    public function register(){
        return $this->base_url."register";
    }

    public function login(){
        return $this->base_url."login";
    }

    public function detail(){
        return $this->base_url."detail";
    }

    public function logout(){
        return $this->base_url."logout";
    }

    public function login_by_provider(){
        return $this->base_url."auth/facebook";
    }

    //--------------------------------------------------------------------------
    //store item
    public function read_store_item(){
        return $this->base_url."customer_read_store_item";
    }

    //--------------------------------------------------------------------------
    //order
    public function create_order(){
        return $this->base_url."create_order";
    }

    public function read_order(){
        return $this->base_url."read_orders";
    }

    //--------------------------------------------------------------------------
    //payment
    public function create_payment_with_ovo(){
        return $this->base_url."create_payment_with_ovo";
    }

    public function get_payment_status_ovo(){
        return $this->base_url."get_payment_status_ovo";
    }

    public function create_payment_with_dana(){
        return $this->base_url."create_payment_with_dana";
    }

    //--------------------------------------------------------------------------
    //courier
    public function read_courier(){
        return $this->url."read_ongkir";
    }

    //--------------------------------------------------------------------------
    //rating
    public function create_rating(){
        return $this->base_url."create_rating";
    }

    //--------------------------------------------------------------------------
    //visitor
    public function add_visitor(){
        return $this->base_url."add_visitor";
    }

    //--------------------------------------------------------------------------
    //address
    public function create_address(){
        return $this->base_url."create_customer_address";
    }

    public function read_address(){
        return $this->base_url."read_customer_address";
    }

    public function update_address(){
        return $this->base_url."update_customer_address";
    }

    public function delete_address(){
        return $this->base_url."delete_customer_address";
    }

    //--------------------------------------------------------------------------
    //voucher
    public function read_voucher(){
        return $this->base_url."read_voucher";
    }

    //--------------------------------------------------------------------------
    //item category
    public function get_all_categories(){
        return $this->base_url."get_all_item_categories";
    }

    //--------------------------------------------------------------------------
    //wishlist
    public function create_wishlist(){
        return $this->base_url."create_wishlist";
    }

    public function get_wishlist(){
        return $this->base_url."read_wishlist";
    }

    public function delete_wishlist(){
        return $this->base_url."delete_wishlist";
    }

    //--------------------------------------------------------------------------
    //store
    public function read_store(){
        return $this->base_url."read_store";
    }

    //--------------------------------------------------------------------------
    //ongkir
    public function read_ongkir(){
        return $this->base_url."read_ongkir";
    }
}
