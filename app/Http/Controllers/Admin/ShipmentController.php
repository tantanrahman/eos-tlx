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

        //INPUT CUSTOMER TO DATABASE
        $acount_codes       = $request->account_code;
        $names              = $request->name;
        $company            = $request->company_name;
        $addresses          = $request->address;
        $cit_name           = $request->city_name;
        $cit_id             = $request->city_id;
        $cou_name           = $request->country_name;
        $cou_id             = $request->country_id;
        $postal             = $request->postal_code;
        $phones             = $request->phone;
        $group              = $request->group;
        $created            = json_encode($request->created_by);
        

        foreach ($acount_codes as $key => $value) {

            $concatenateString          = [$names,$company,$addresses,$cit_id,$cou_id,$postal,$phones];
            $signedKey                  = md5(json_encode($concatenateString));
            $api_key                    = json_encode([$signedKey]);

            $dataCustomers[] = Customer::create([
                'account_code'  => $value,
                'name'          => $names[$key],
                'company_name'  => $company[$key],
                'address'       => $addresses[$key],
                'city_name'     => $cit_name[$key],
                'city_id'       => $cit_id[$key],
                'country_name'  => $cou_name[$key],
                'country_id'    => $cou_id[$key],
                'postal_code'   => $postal[$key],
                'phone'         => $phones[$key],
                'group'         => $group[$key],
                'apikey'        => $api_key,
                'created_by'    => $created
            ]);
        }

        dd($dataCustomers);
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
