<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pickuplist;
use Illuminate\Http\Request;

class PickuplistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.pickuplist.index');
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
     * @param  \App\Models\Pickuplist  $pickuplist
     * @return \Illuminate\Http\Response
     */
    public function show(Pickuplist $pickuplist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pickuplist  $pickuplist
     * @return \Illuminate\Http\Response
     */
    public function edit(Pickuplist $pickuplist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pickuplist  $pickuplist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pickuplist $pickuplist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pickuplist  $pickuplist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pickuplist $pickuplist)
    {
        //
    }
}
