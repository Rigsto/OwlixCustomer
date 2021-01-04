<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Models\OwlixApi;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BaseHomeController extends Controller
{
    public $dummy = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMGYzZDcyOTM3NzJhODNhN2IyNjFjMjA2YTMzYzVhMDQ2N2JiMGFhNTQyNmE0YTFjYzZmMzY4NjJmODZhYjM3ZTM3Njc3OGNmMjI0MDYwMjMiLCJpYXQiOjE2MDg3NTcxMTksIm5iZiI6MTYwODc1NzExOSwiZXhwIjoxNjQwMjkzMTE5LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.YKYhF2zoexsB2Cu014Vur9N5e7FT_JLQ-nqT46P-3I_jKYGwbOuHAZkGYyfyjgukabl09Gjp8ZG93AhR_aenz7zgr29Z838cRhXvj_jUV2wm1OctYwBfB9cjZWi81q-hjwxXPL8FUL47WAPA8_PFPkVOLS__6NhFCfF5EDCjXsnf90_euTHvlQhua83ptF9jC5FllJz_gvqiJRuQZSIRxkLfYSCIidPBiCU-OkNR6WvbyjwOMebqmvj429_PYVkLpxcmNTdnDBO_Fpb3a6kh-znd5EqaMaMHkDxyxDA93bz8eDZyBuNeEnuP7G2fATbT2nEsyOsn6FaDvSPnk8YM87gnh6C-lmLfmDz7rfYP0kp47ByprgK2PLjjKUueusZFc341k7eBVeXGwchcTIxkS1Hi6Oqy9zPpYQqUzCuMx03ZRQdy9R8AGRXiaiv1kdYio0Ruj3GOnQ5G28xQg2Ey7jtjp0VvKyUv31oorpzGI74OhucJ0CZY9UPRI6kEBnS2EvZPJ8k6khM77KeOPkLDSLelMLnyK6TwAkZXVYH2pi8cVOpjAPKy5rQS6xhkNMmvvFe3kE_Gi3TBP1K0mvo2k4S0SYDRoCQrmqtmpp9jCaL2vTlBwVe-sB4mgYuTCzWXCf5T7__dCSq9fjor7xFvU6o7TNK2lzu8qTrj5aVBbLk";

    public function readAllCategories(){
        $client = new Client();

        try {
            $response = $client->get((new OwlixApi())->get_all_categories())->getBody();
            return json_decode($response, true)['data'];
        } catch (GuzzleException $exception){
            return [];
        }
    }

    public function getCategoryName($categories, $id){
        foreach ($categories as $cat){
            if ($cat['id'] == $id){
                return $cat['name'];
            }
        }
        return "";
    }
}
