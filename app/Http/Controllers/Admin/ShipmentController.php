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
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Container\RewindableGenerator;

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
        
        $api_key = Customer::get_apikey();
        
        $dataCustomer = Customer::where('account_code', '=', $request->input('account_code'))->first();

        if($dataCustomer == null)
        {
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
                'created_by'            => Auth::user()->name
			]);

        } 
        else
        {
            $dataShipment = Shipment::create([
                'shipper_id'            => Request()->shipper_id,
                'consignee_id'          => Request()->con_id,
                'packagetype_id'        => Request()->packagetype_id,
                'marketing_id'          => Request()->marketing_id,
                'partner_id'            => Request()->partner_id,
                'connote'               => Request()->connote,
                'values'                => Request()->values,
                'redoc_connote'         => Request()->redoc_connote,
                'redoc_params'          => Request()->redoc_params,
                'modal'                 => Request()->modal,
                'payment_method'        => Request()->payment_method,
                'payment_status'        => Request()->payment_status,
                'delivery_intructions'  => Request()->delivery_instruction,
                'remark'                => Request()->remark,
                'description'           => Request()->description,
                'created_by'            => Auth::user()->name
            ]);

            $shipmentId     = $dataShipment->id;
            $actual_weight  = $request->get('actual_weight');
            $length         = $request->get('length');
            $width          = $request->get('width');
            $height         = $request->get('height');
            $sum_volume     = $request->get('sum_volume');
            $sum_weight     = $request->get('sum_weight');

            foreach ($actual_weight as $key => $value) {
                
                $num_actual_weight         = $value;
                $num_length                = $length[$key];
                $num_width                 = $width[$key];
                $num_height                = $height[$key];
                $num_sum_volume            = $sum_volume[$key];
                $num_sum_weight            = $sum_weight[$key];

                $dataShipmentDetail = ShipmentDetail::create([
                    'shipment_id'           => $shipmentId,
                    'actual_weight'         => $num_actual_weight,
                    'length'                => $num_length,
                    'width'                 => $num_width,
                    'height'                => $num_height,
                    'sum_volume'            => $num_sum_volume,
                    'sum_weight'            => $num_sum_weight
                ]);

                if($dataCustomer || $dataShipment || $dataShipmentDetail)
                {
                    return redirect(route('admin.shipment.index'))->with('toast_success', 'Berhasil Menambah Shipment');
                } 
                else 
                {
                    return redirect(route('admin.shipment.index'))->with('toast_success', 'Gagal!');
                }

            }
            
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
