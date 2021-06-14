<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BagShipment;
use Illuminate\Http\Request;

class BagShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bagshipments = BagShipment::get();
        
        return view('pages.admin.bagshipment.index', compact('bagshipments'));

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
     * @param  \App\Models\BagShipment  $bagShipment
     * @return \Illuminate\Http\Response
     */
    public function show(BagShipment $bagShipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BagShipment  $bagShipment
     * @return \Illuminate\Http\Response
     */
    public function edit(BagShipment $bagShipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BagShipment  $bagShipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BagShipment $bagShipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BagShipment  $bagShipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BagShipment $bagShipment)
    {
        //
    }
}
