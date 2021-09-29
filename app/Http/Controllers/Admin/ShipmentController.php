<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Country;
use App\Models\Partner;
use App\Models\Customer;
use App\Models\Shipment;
use App\Models\PackageType;
use Illuminate\Http\Request;
use App\Models\ShipmentDetail;
use App\Exports\ShipmentExport;
use App\Models\TrackingShipment;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $partners   = Partner::get();

        if ($request->ajax()) {
            $date_start = (!empty($request->get('date_start')) ? $request->get('date_start') : '');
            $date_end   = (!empty($request->get('date_end')) ? $request->get('date_end') : '');
            $partner    = (!empty($request->get('partner')) ? $request->get('partner') : '');
            $idx = [];
            $shipments  = Shipment::get_items($date_start, $date_end, $partner);

            // 

            return DataTables::of($shipments)
                ->addColumn('action', function ($shipment) {
                    if ($shipment->partner_name == "GDEX") {
                        $button =   '<div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="shipment/' . $shipment->idx . '/edit" data-toggle="tooltip"  data-id="' . $shipment->idx . '" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>
                                        <button type="button" name="delete" id="' . $shipment->idx . '" class="delete btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="HAPUS"><i class="far fa-trash-alt"></i></button>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-placement="top" data-target="#ModalPrint' . $shipment->idx . '" data-id="{{$shipment->idx}}" title="PRINT"><i class="fas fa-print"></i></button>
                                    </div>
                                    
                                    <div class="modal fade" id="ModalPrint' . $shipment->idx . '" tabindex="-1" role="dialog" aria-labelledby="ModalCourier" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLongTitle">PRINT</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                    
                                            <div class="modal-body">
                                                <a href="printConnote/' . $shipment->idx . '" target="_blank" type="button" class="btn btn-info"><i class="fas fa-barcode"></i> Connote</a>
                                                <a href="printLabel/' . $shipment->idx . '" target="_blank" type="button" class="btn btn-info"><i class="far fa-envelope"></i> Label</a>
                                                <a href="printInvoice/' . $shipment->idx . '" target="_blank" type="button" class="btn btn-info"><i class="fas fa-money-bill-alt"></i> Invoice</a>
                                                <a href="printGdex/' . $shipment->idx . '" target="_blank" type="button" class="btn btn-info"><i class="fas fa-barcode"></i> Print GDEX</a>
                                            </div>
                                            
                                        </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="ModalShow' . $shipment->idx . '" tabindex="-1" role="dialog" aria-labelledby="ModalShow" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLongTitle">VIEW</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                    
                                            <div class="modal-body">
                                                <a href="shipment/' . $shipment->idx . '" target="_blank" type="button" class="btn btn-info"><i class="fas fa-barcode"></i> Connote</a>
                                            </div>
                                            
                                        </div>
                                        </div>
                                    </div>
                                    ';
                    } else {
                        $button = '<div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="shipment/' . $shipment->idx . '/edit" data-toggle="tooltip"  data-id="' . $shipment->idx . '" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>
                                        <button type="button" name="delete" id="' . $shipment->idx . '" class="delete btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="HAPUS"><i class="far fa-trash-alt"></i></button>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-placement="top" data-target="#ModalPrint' . $shipment->idx . '" data-id="{{$shipment->idx}}" title="PRINT"><i class="fas fa-print"></i></button>
                                    </div>
                                    
                                    <div class="modal fade" id="ModalPrint' . $shipment->idx . '" tabindex="-1" role="dialog" aria-labelledby="ModalCourier" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLongTitle">PRINT</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                    
                                            <div class="modal-body">
                                                <a href="printConnote/' . $shipment->idx . '" target="_blank" type="button" class="btn btn-info"><i class="fas fa-barcode"></i> Connote</a>
                                                <a href="printLabel/' . $shipment->idx . '" target="_blank" type="button" class="btn btn-info"><i class="far fa-envelope"></i> Label</a>
                                                <a href="printInvoice/' . $shipment->idx . '" target="_blank" type="button" class="btn btn-info"><i class="fas fa-money-bill-alt"></i> Invoice</a>
                                            </div>
                                            
                                        </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="ModalShow' . $shipment->idx . '" tabindex="-1" role="dialog" aria-labelledby="ModalShow" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLongTitle">VIEW</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                    
                                            <div class="modal-body">
                                                <a href="shipment/' . $shipment->idx . '" target="_blank" type="button" class="btn btn-info"><i class="fas fa-barcode"></i> Connote</a>
                                            </div>
                                            
                                        </div>
                                        </div>
                                    </div>
                                    ';
                    }

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.admin.shipment.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users          = User::where('role_id', '=', 2)->get();
        $packagetypes   = PackageType::all();
        $partners       = Partner::all();
        $nextId         = Customer::next_id();
        $apikey         = Customer::get_apikey();
        $dateRan        = sha1(date("Y-m-d H:i:s"));
        $countries      = Country::all();

        return view('pages.admin.shipment.create', compact('packagetypes', 'partners', 'users', 'nextId', 'apikey', 'dateRan', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = Customer::where('account_code', '=', $request->input('account_code'))->first();

        if ($validateData === null) {
            //Input Customer for Shipment
            $acount_codes       = $request->account_code;
            $idx                = $request->id;
            $names              = $request->name;
            $company            = $request->company_name;
            $addresses          = $request->address;
            $cit_name           = $request->city_name;
            $cit_id             = $request->city_id;
            $cou_id             = $request->country_id;
            $postal             = $request->postal_code;
            $phones             = $request->phone;
            $group              = $request->group;
            $apikey             = $request->apikey;

            foreach ($acount_codes as $key => $value) {

                $dataCustomers[] = Customer::create([
                    'account_code'  => $value,
                    'id'            => $idx[$key],
                    'name'          => $names[$key],
                    'company_name'  => $company[$key],
                    'address'       => $addresses[$key],
                    'city_name'     => $cit_name[$key],
                    'city_id'       => $cit_id[$key],
                    'country_id'    => $cou_id[$key],
                    'postal_code'   => $postal[$key],
                    'phone'         => $phones[$key],
                    'group'         => $group[$key],
                    'apikey'        => md5($apikey[$key]),
                    'created_by'    => Auth::user()->id
                ]);
            }

            //Input Shipment to Database
            $dataShipment = Shipment::create([
                'packagetype_id'        => $request->packagetype_id,
                'shipper_id'            => $request->id[0],
                'consignee_id'          => $request->id[1],
                'marketing_id'          => $request->marketing_id,
                'partner_id'            => $request->partner_id,
                'connote'               => $request->connote,
                'values'                => $request->values,
                'redoc_connote'         => $request->redoc_connote,
                'redoc_params'          => $request->redoc_params,
                'modal'                 => $request->modal,
                'payment_method'        => $request->payment_method,
                'payment_status'        => $request->payment_status,
                'delivery_intructions'  => $request->delivery_intructions,
                'remark'                => $request->remark,
                'description'           => $request->description,
                'created_by'            => Auth::user()->id
            ]);

            $shipmentId         = $dataShipment->id;
            $actual_weights     = $request->actual_weight;
            $lengths            = $request->length;
            $widths             = $request->width;
            $heights            = $request->height;
            $sum_volumes        = $request->sum_volume;
            $sum_weights        = $request->sum_weight;

            foreach ($actual_weights as $key => $value) {

                //Input Shipment Details (Volume)
                $dataShipmentDetail[] = ShipmentDetail::create([
                    'shipment_id'           => $shipmentId,
                    'actual_weight'         => $value,
                    'length'                => $lengths[$key],
                    'width'                 => $widths[$key],
                    'height'                => $heights[$key],
                    'sum_volume'            => $sum_volumes[$key],
                    'sum_weight'            => $sum_weights[$key]
                ]);
            }

            $currentDate    = date('Y-m-d H:i:s');
            $apiKey         = TrackingShipment::get_apikey();

            //Input Data Tracking
            $dataTracking = TrackingShipment::create([
                'shipment_id'       => $shipmentId,
                'track_time'        => $currentDate,
                'status_eng'        => Request()->status_eng,
                'status_ind'        => Request()->status_ind,
                'apikey'            => md5($apiKey)
            ]);
        } else {

            //Input Shipment to Database
            $dataShipment = Shipment::create([
                'packagetype_id'        => $request->packagetype_id,
                'shipper_id'            => $request->id[0],
                'consignee_id'          => $request->id[1],
                'marketing_id'          => $request->marketing_id,
                'partner_id'            => $request->partner_id,
                'connote'               => $request->connote,
                'values'                => $request->values,
                'redoc_connote'         => $request->redoc_connote,
                'redoc_params'          => $request->redoc_params,
                'modal'                 => $request->modal,
                'payment_method'        => $request->payment_method,
                'payment_status'        => $request->payment_status,
                'delivery_intructions'  => $request->delivery_intructions,
                'remark'                => $request->remark,
                'description'           => $request->description,
                'created_by'            => Auth::user()->id
            ]);

            $shipmentId         = $dataShipment->id;
            $actual_weights     = $request->actual_weight;
            $lengths            = $request->length;
            $widths             = $request->width;
            $heights            = $request->height;
            $sum_volumes        = $request->sum_volume;
            $sum_weights        = $request->sum_weight;

            foreach ($actual_weights as $key => $value) {

                //Input Shipment Details (Volume)
                $dataShipmentDetail[] = ShipmentDetail::create([
                    'shipment_id'           => $shipmentId,
                    'actual_weight'         => $value,
                    'length'                => $lengths[$key],
                    'width'                 => $widths[$key],
                    'height'                => $heights[$key],
                    'sum_volume'            => $sum_volumes[$key],
                    'sum_weight'            => $sum_weights[$key]
                ]);
            }

            $currentDate    = date('Y-m-d H:i:s');
            $apiKey         = TrackingShipment::get_apikey();

            //Input Data Tracking
            $dataTracking = TrackingShipment::create([
                'shipment_id'       => $shipmentId,
                'track_time'        => $currentDate,
                'status_eng'        => Request()->status_eng,
                'status_ind'        => Request()->status_ind,
                'apikey'            => md5($apiKey)
            ]);
        }


        if ($dataShipment) {
            return redirect(route('admin.shipment.edit', $dataShipment->id))->with('toast_success', 'Berhasil menambah Data');
        } else {
            return redirect(route('admin.shipment.create'))->with('toast_error', 'Gagal!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function show(Shipment $shipment, User $users)
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
        $users              = User::where('role_id', '=', 2)->get();
        $packagetypes       = PackageType::where('active', '=', 1)->get();
        $partners           = Partner::where('active', '=', 1)->get();
        $shipper            = Customer::where('id', $shipment->shipper_id)->first();
        $consignee          = Customer::where('id', $shipment->consignee_id)->first();
        $countries          = Country::all();
        $shipmentdetails    = ShipmentDetail::where('shipment_id', $shipment->id)->get();

        return view('pages.admin.shipment.edit', compact('shipment', 'users', 'packagetypes', 'partners', 'shipper', 'consignee', 'countries', 'shipmentdetails'));
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

        $shipper    = Customer::findOrFail($shipment->shipper_id);
        $consignee  = Customer::findOrFail($shipment->consignee_id);

        $shipper->update([
            'account_code'  => $request->account_code[0],
            'name'          => $request->name[0],
            'company_name'  => $request->company_name[0],
            'address'       => $request->address[0],
            'city_name'     => $request->city_name[0],
            'city_id'       => $request->city_id[0],
            'country_id'    => $request->country_id[0],
            'postal_code'   => $request->postal_code[0],
            'phone'         => $request->phone[0],
        ]);

        $consignee->update([
            'account_code'  => $request->account_code[1],
            'name'          => $request->name[1],
            'company_name'  => $request->company_name[1],
            'address'       => $request->address[1],
            'city_name'     => $request->city_name[1],
            'city_id'       => $request->city_id[1],
            'country_id'    => $request->country_id[1],
            'postal_code'   => $request->postal_code[1],
            'phone'         => $request->phone[1],
        ]);

        $dataShipment = Shipment::findOrFail($shipment->id);

        //Input Shipment to Database
        $dataShipment->update([
            'packagetype_id'        => $request->packagetype_id,
            'marketing_id'          => $request->marketing_id,
            'partner_id'            => $request->partner_id,
            'connote'               => $request->connote,
            'values'                => $request->values,
            'redoc_connote'         => $request->redoc_connote,
            'redoc_params'          => $request->redoc_params,
            'modal'                 => $request->modal,
            'payment_method'        => $request->payment_method,
            'payment_status'        => $request->payment_status,
            'delivery_intructions'  => $request->delivery_intructions,
            'remark'                => $request->remark,
            'description'           => $request->description,
            'created_by'            => Auth::user()->id
        ]);

        $shipmentId         = $dataShipment->id;
        $actual_weights     = $request->actual_weight;
        $lengths            = $request->length;
        $widths             = $request->width;
        $heights            = $request->height;
        $sum_volumes        = $request->sum_volume;
        $sum_weights        = $request->sum_weight;

        $details = ShipmentDetail::get_details();

        foreach ($actual_weights ?: [] as $key => $value) {

            $details->updateOrCreate([
                'id'                    => $value,
                'shipment_id'           => $shipmentId,
                'actual_weight'         => $actual_weights[$key],
                'length'                => $lengths[$key],
                'width'                 => $widths[$key],
                'height'                => $heights[$key],
                'sum_volume'            => $sum_volumes[$key],
                'sum_weight'            => $sum_weights[$key]
            ]);
        }

        if ($dataShipment) {
            return redirect(route('admin.shipment.edit', $dataShipment->id))->with('toast_success', 'Berhasil Mengubah Data');
        } else {
            return redirect(route('admin.shipment.create'))->with('toast_error', 'Gagal! Edit Data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipment = Shipment::where('id', $id)->delete();

        return response()->json($shipment);
    }

    /**
     * @author Tantan
     * @description Export Shipment XLSX
     * @created 10 Sep 2021
     */

    public function exportShipment()
    {
        return Excel::download(new ShipmentExport(), date("His_Ymd") .'_shipment .xlsx');
    }

    /**
     * @author Tantan
     * Get Autocomplete From Shipper
     */

    public function autocompleteShipmentShipper(Request $request)
    {
        $customers = Customer::select('id',  'account_code', 'name as label', 'company_name', 'address', 'country_id', 'country_name', 'postal_code', 'city_id', 'city_name', 'phone')
            ->where('name', 'like', "%{$request->term}%")
            ->where('group', '=', 'shipper')
            ->get();

        return response()->json($customers);
    }

    /**
     * @author Tantan
     * Get Autocomplete From Consignee
     */

    public function autocompleteShipmentConsignee(Request $request)
    {
        $customers = Customer::select('id',  'account_code', 'name as label', 'company_name', 'address', 'country_id', 'country_name', 'postal_code', 'city_id', 'city_name', 'phone')
            ->where('name', 'like', "%{$request->term}%")
            ->where('group', '=', 'consignee')
            ->get();

        return response()->json($customers);
    }

    /**
     * @author Tantan
     * @decription generate connote
     * @param Request $request
     * @return void
     */
    public function getConnote(Request $request)
    {

        $connote = Shipment::get_connote($request);

        if (empty($connote)) {
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

        return response()->json(['success' => 'Got Simple Ajax Request.']);
    }
}
