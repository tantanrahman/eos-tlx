<?php

namespace App\Http\Controllers\Admin;

use Svg\Tag\Rect;
use App\Models\User;
use App\Models\Partner;
use App\Models\Customer;
use App\Models\Shipment;
use App\Models\PackageType;
use Illuminate\Http\Request;
use App\Models\ShipmentDetail;
use Illuminate\Support\Carbon;
use App\Models\TrackingShipment;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Container\RewindableGenerator;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $shipments = Shipment::get_items();

            return DataTables::of($shipments)
                    // ->addColumn('action', function($shipment){

                    //     $button =   '<div class="btn-group" role="group" aria-label="Basic example">
                    //                     <a href="shipment/'.$shipment->id.'/edit" type="button" class="btn btn-info" data-id="'.$customer->id.'" data-toggle="tooltip" data-placement="top" title="EDIT"><i class="far fa-edit"></i></a>
                    //                     <button type="button" name="delete" id="'.$shipment->id.'" class="delete btn btn-danger" data-toggle="tooltip" data-placement="top" title="HAPUS"><i class="far fa-trash-alt"></i></button>
                    //                     <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="VIEW"><i class="fas fa-search"></i></button>
                    //                 </div>';

                    //     return $button;
                    // })
                    // ->rawColumns(['action'])
                    ->make(true);
        }

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
            //Process Insert Customer to Customer
            $account_code           = $request->get('account_code');
            $name                   = $request->get('name');
            $company_name           = $request->get('company_name');
            $address                = $request->get('address');
            $city_id                = $request->get('city_id');
            $city_name              = $request->get('city_name');
            $country_id             = $request->get('country_id');
            $country_name           = $request->get('country_name');
            $phone                  = $request->get('phone');
            $postal_code            = $request->get('postal_code');
            $concatenateString  = [$name,$company_name,$address,$city_id,$country_id,$postal_code,$phone];
            $signedKey          = md5(json_encode($concatenateString));
            dd($signedKey);

            foreach($account_code as $key => $value)
            {

                

                $num_account_code           = $value;
                $num_name                   = $name[$key];
                $num_company_name           = $company_name[$key];
                $num_address                = $address[$key];
                $num_city_id                = $city_id[$key];
                $num_city_name              = $city_name[$key];
                $num_country_id             = $country_id[$key];
                $num_country_name           = $country_name[$key];
                $num_phone                  = $phone[$key];
                $num_postal_code            = $postal_code[$key];
                $num_apikey                 = md5($signedKey[$key]);
            
                $dataCustomer = Customer::Create([
                    'account_code'          => $num_account_code,
                    'name'                  => $num_name,   
                    'company_name'          => $num_company_name,
                    'address'               => $num_address,
                    'city_id'               => $num_city_id,
                    'city_name'             => $num_city_name,
                    'country_id'            => $num_country_id,
                    'country_name'          => $num_country_name,
                    'phone'                 => $num_phone,
                    'group'                 => $request->group,
                    'postal_code'           => $num_postal_code,
                    'apikey'                => $num_apikey,
                    'created_by'            => Auth::user()->name
                ]);

            }
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
        $customers = Customer::select('id',  'account_code', 'name as label' ,'company_name' ,'address', 'country_id','country_name' ,'postal_code','city_id','city_name', 'phone')
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
        $customers = Customer::select('id',  'account_code', 'name as label' ,'company_name' ,'address', 'country_id','country_name' ,'postal_code','city_id','city_name', 'phone')
            ->where('name', 'like', "%{$request->term}%")
            ->where('group','=','consignee')
            ->get();

        return response()->json($customers);
    }

    /**
     * Get Connote
     *
     * @param Request $request
     * @return void
     */
    public function getConnote(Request $request)
	{

		$connote = Shipment::get_connote($request);

		if (empty($connote))
		{
			return response()->json(['status' => false]);
		}

		return response()->json(['status' => true, 'connote' => $connote]);
	}

    /**
     * @param Request $request
     * 
     * Create Shipment Details
     */
    public function shipmentDetails(Request $request)
    {
        $input = $request->all();
        Log::info($input);

        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

}
