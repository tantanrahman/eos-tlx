<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Customer;
use Illuminate\Support\Facades\Http;

class ApiEksContoller extends Controller
{
    /**
     * @author Tantan
     * @description Get City Based On Postal Code from Zippopotam
     * @created 12 Sep 2021
     * @return void
     */
    public function getCityAction(Request $request)
    {
        $country = Country::where('id', $request->id)->first();
        $response = Http::get('https://api.zippopotam.us/' . $country->alpha2code . '/' . $request->postal_code . '');
        $response = json_decode($response->body());
        if (isset($response->places)) {
            $response = ['place' => $response->places[0]->{'place name'} . ', ' . $response->places[0]->state];
        } else {
            $city = Customer::where('country_id', $country->id)->where('postal_code', $request->postal_code)->first();

            if ($city != false) {
                $response = [
                    'place' => $city->city_name
                ];
            } else {
                $response = [];
            }
        }

        return response($response);
    }
    
}