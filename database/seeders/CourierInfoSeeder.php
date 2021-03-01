<?php

namespace Database\Seeders;

use App\Models\CourierInfo;
use Illuminate\Database\Seeder;

class CourierInfoSeeder extends Seeder
{
    public function run()
    {
        $ci = new CourierInfo();
        $ci->name = "JNE Layanan Reguler";
        $ci->code = "JNE";
        $ci->service = "REG";
        $ci->save();

        $ci = new CourierInfo();
        $ci->name = "JNE Ongkos Kirim Ekonomis";
        $ci->code = "JNE";
        $ci->service = "OKE";
        $ci->save();

        $ci = new CourierInfo();
        $ci->name = "JNE Yakin Esok Sampai";
        $ci->code = "JNE";
        $ci->service = "YES";
        $ci->save();

        $ci = new CourierInfo();
        $ci->name = "Pos Indonesia Paket Kilat Khusus";
        $ci->code = "POS";
        $ci->service = "REG";
        $ci->save();

        $ci = new CourierInfo();
        $ci->name = "TIKI Ecomomy Service";
        $ci->code = "TIKI";
        $ci->service = "ECO";
        $ci->save();

        $ci = new CourierInfo();
        $ci->name = "TIKI Regular Service";
        $ci->code = "TIKI";
        $ci->service = "REG";
        $ci->save();

        $ci = new CourierInfo();
        $ci->name = "TIKI Over Night Service";
        $ci->code = "TIKI";
        $ci->service = "ONS";
        $ci->save();
    }
}
