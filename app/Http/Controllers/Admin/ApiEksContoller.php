<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ApiEksContoller extends Controller
{
    public function getPostalCode()
    {
        $response = Http::get('https://api.zippopotam.us/', [
            
        ]);
    }
}
