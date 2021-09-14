<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ShipmentDetail;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ShipmentDetailController extends Controller
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
            $shipmentdetails = ShipmentDetail::get_details();

            return DataTables::of($shipmentdetails)
                ->make(true);
        }

        return view('pages.admin.shipment.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShipmentDetail  $shipmentDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ShipmentDetail $shipmentDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShipmentDetail  $shipmentDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ShipmentDetail $shipmentDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShipmentDetail  $shipmentDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShipmentDetail $shipmentDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShipmentDetail  $shipmentDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $details = ShipmentDetail::where('id',$id)->delete();

        return response()->json($details);
    }
}
