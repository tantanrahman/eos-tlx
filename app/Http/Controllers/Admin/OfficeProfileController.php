<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\OfficeProfile;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class OfficeProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $officeprofile = OfficeProfile::get();

        if($request->ajax())
        {
           return DataTables::of($officeprofile)->make(true);
        }

        return view('pages.admin.officeprofile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.officeprofile.create');
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
            'name'      => 'required',
            'address'   => 'required'
        ],[
            'name.required'     => 'NAMA ROFILE WAJIB DIISI',
            'address.required'  => 'ADDRESS WAJIB DIISI'
        ]);

        $data = OfficeProfile::create([
            'name'          => Request()->name,
            'about'         => Request()->about,
            'address'       => Request()->address,
            'embed_gmap'    => Request()->embed_gmap,
            'facebook'      => Request()->facebook,
            'whatsapp'      => Request()->whatsapp,
            'instagram'     => Request()->instagram,
            'youtube'       => Request()->youtube,
            'twitter'       => Request()->twitter,
            'tiktok'        => Request()->tiktok,
        ]);

        if($data)
        {
            return redirect(route('admin.officeprofile.index'))->with('toast_success', 'Berhasil');
        }
        else 
        {
            return redirect(route('admin.officeprofile.index'))->with('toast_error', 'Gagal');
        }
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