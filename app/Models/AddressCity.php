<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressCity extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'province_id', 'name', 'type', 'postal_code'
    ];

    public function province(){
        return $this->belongsTo(AddressProvince::class, 'province_id', 'id');
    }
}
