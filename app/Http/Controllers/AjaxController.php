<?php

namespace App\Http\Controllers;

use App\Models\AddressCity;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getCityByProvinceId(Request $request)
    {
        $cities = AddressCity::where('province_id', $request->id)->pluck('name', 'id');
        $name = "Kota";

        $data = view('inc.options_list', [
            'xs' => $cities,
            'name' => $name
        ])->render();

        return response()->json(['options' => $data]);
    }
}
