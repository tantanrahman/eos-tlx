<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Imports\ImportTracking;
use App\Models\TrackingShipment;
use App\Http\Controllers\Controller;
use App\Models\TrackingStatus;
use Maatwebsite\Excel\Facades\Excel;

class TrackingShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $connotes       = TrackingShipment::get_connote();
        $track_status   = TrackingStatus::where('active','=',1)->get();

        return view('pages.admin.tracking_shipment.index', compact('connotes', 'track_status'));
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
        
        $request->validate([
            "shipment_id" => "required",
            "track_time" => "required",
            "status_eng" => "required",
        ]);

        $shipment_ids   = $request->shipment_id;
        $apiKey         = TrackingShipment::get_apikey();

        foreach ($shipment_ids as $key => $value) {
            $dataTracking = TrackingShipment::create([
                'shipment_id'       => $value,
                'track_time'        => $request->track_time,
                'status_eng'        => $request->status_eng,
            ]);
        }

        if ($dataTracking) {
            return redirect(route('admin.tracking_shipment.index'))->with('toast_success', 'Berhasil menambah Data');
        } else {
            return redirect(route('admin.tracking_shipment.index'))->with('toast_error', 'Gagal!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrackingShipment  $trackingShipment
     * @return \Illuminate\Http\Response
     */
    public function show(TrackingShipment $trackingShipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrackingShipment  $trackingShipment
     * @return \Illuminate\Http\Response
     */
    public function edit(TrackingShipment $trackingShipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrackingShipment  $trackingShipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrackingShipment $trackingShipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrackingShipment  $trackingShipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrackingShipment $trackingShipment)
    {
        //
    }

    /**
     * @author Tantan
     * @description Import Tracking Shipment
     * @created 18 Sep 2021
     */
    public function importTracking(Request $request)
    {

        Excel::import(new ImportTracking, request()->file('file'));

        dd($request->file('file'));

        return redirect()->route('admin.tracking_shipment.index')->with(['success' => 'Data Berhasil Diupload!']);
    }
}