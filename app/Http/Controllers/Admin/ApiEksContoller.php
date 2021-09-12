<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Support\Facades\Http;

class ApiEksContoller extends Controller
{
    /**
     * @author Tantan
     * @description Get City Based On Postal Code from Zippopotam
     * @created 12 Sep 2021
     * @return void
     */
    public function apiPostalCode()
    {   
        $countries      = Country::first();

        $response       = Http::get('https://api.zippopotam.us/MY/53000');

        $data           = json_decode($response->body());

    }
}
