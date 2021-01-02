<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'store_item_id', 'quantity', 'name', 'price'];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
