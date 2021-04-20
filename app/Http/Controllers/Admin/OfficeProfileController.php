<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfficeProfile;
use Illuminate\Http\Request;

class OfficeProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officeprofiles = OfficeProfile::get();

        return view('pages.admin.officeprofile.index', compact('officeprofiles'));
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
        $this->validate($request, [
            'name' => 'required'
        ],[
            'name.required' => 'NAMA OFFICEPROFILE WAJIB DIISI'
        ]);

        $data = OfficeProfile::create([
            'name' => Request()->name
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeProfile  $officeProfile
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeProfile $officeProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeProfile  $officeProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeProfile $officeProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OfficeProfile  $officeProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfficeProfile $officeProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeProfile  $officeProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeProfile $officeProfile)
    {
        //
    }
}