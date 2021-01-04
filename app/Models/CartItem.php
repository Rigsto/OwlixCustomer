<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'store_item_id', 'quantity', 'name', 'price', 'city_id'];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function city(){
        return $this->belongsTo(AddressCity::class, 'city_id', 'id');
    }
}
