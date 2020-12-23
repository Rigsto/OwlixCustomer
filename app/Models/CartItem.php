<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'store_item_id', 'quantity'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function hasItem($id){
        $item = CartItem::where('user_id', Auth::id())->where('store_item_id', $id)->get();
        return count($item) > 0;
    }
}
