<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Partner;
use App\Models\Customer;
use App\Models\Shipment;
use App\Models\PackageType;
use Illuminate\Http\Request;
use App\Models\ShipmentDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Svg\Tag\Rect;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.shipment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users          = User::where('role_id','=',2)->get();
        $packagetypes   = PackageType::all();
        $partners       = Partner::all();

        return view('pages.admin.shipment.create', compact('packagetypes','partners','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd($request);

        $api_key = Customer::get_apikey();
        // $dataCustomer   = Customer::where('account_code', '=', $request->input('account_code'))->first();
        $dataCustomer = Customer::create([
            'account_code'          => Request()->account_code,
            'name'                  => Request()->name,
            'company_name'          => Request()->company_name,
            'address'               => Request()->address,
            'city_id'               => Request()->city_id,
            'city_name'             => Request()->city_name,
            'country_id'            => Request()->country_id,
            'country_name'          => Request()->country_name,
            'phone'                 => Request()->phone,
            'group'                 => Request()->group,
            'postal_code'           => Request()->postal_code,
            'apikey'                => md5($api_key),
        ]);


        // if($dataCustomer == null)
        // {
        //     $dataCustomer = Customer::create([
		// 		'account_code'          => Request()->account_code,
		// 		'name'                  => Request()->name,
		// 		'company_name'          => Request()->company_name,
		// 		'address'               => Request()->address,
		// 		'city_id'               => Request()->city_id,
        //         'city_name'             => Request()->city_name,
		// 		'country_id'            => Request()->country_id,
        //         'country_name'          => Request()->country_name,
		// 		'phone'                 => Request()->phone,
		// 		'group'                 => Request()->group,
		// 		'postal_code'           => Request()->postal_code,
        //         'apikey'                => md5($api_key),
		// 	]);

        //     // dd($dataCustomer);
        // } 
        // else
        // {
        //     // dd($dataCustomer);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function show(Shipment $shipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipment $shipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipment $shipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipment $shipment)
    {
        //
    }

    /**
     * 
     * Get Autocomplete From Shipper
     */

    public function autocompleteShipmentShipper(Request $request)
    {
        $customers = Customer::select('id', 'account_code','name as label' ,'company_name' ,'address', 'postal_code','city_name', 'phone')
            ->where('name', 'like', "%{$request->term}%")
            ->where('group','=','shipper')
            ->get();

        return response()->json($customers);
    }

    /**
     * 
     * Get Autocomplete From Consignee
     */

    public function autocompleteShipmentConsignee(Request $request)
    {
        $customers = Customer::select('id',  'account_code', 'name as label' ,'company_name' ,'address', 'country_name' ,'postal_code','city_name', 'phone')
            ->where('name', 'like', "%{$request->term}%")
            ->where('group','=','consignee')
            ->get();

        return response()->json($customers);
    }
}
