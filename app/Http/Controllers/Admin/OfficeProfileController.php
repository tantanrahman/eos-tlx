<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\OfficeProfile;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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

        if($request->ajax())
        {
            $officeprofile = OfficeProfile::get();
        
            return DataTables::of($officeprofile)
                ->addColumn('photo', function($officeprofile){
                    $url = URL::asset("/storage/officeprofile/".$officeprofile->photo);
                    return '<img src='.$url.' border="0" height="60" width="100" class="img-rounded" text-align="center" />';
                })
                ->addColumn('action', function($officeprofile){
                    $button = '<a href="officeprofile/'.$officeprofile->id.'/edit" data-toggle="tooltip"  data-id="'.$officeprofile->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    return $button;
                })
                ->rawColumns(['photo','action'])
                ->make(true);
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

        //UPLOAD GAMBAR
        $photo = $request->file('photo');
        $photo->storeAs('public/officeprofile', $photo->hashName());
        
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
            'photo'         => $photo->hashName()
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
    public function edit(OfficeProfile $officeprofile)
    {
        return view('pages.admin.officeprofile.edit', compact('officeprofile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OfficeProfile  $officeProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfficeProfile $officeprofile)
    {
        $officeprofile = OfficeProfile::findOrFail($officeprofile->id);

        if($request->file('photo') == "")
        {
            $officeprofile->update([
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
        }
        else
        {
            //Delete Old Image
            Storage::disk('local')->delete('public/officeprofile'.$officeprofile->photo);

            //Upload New Image  
            $photo = $request->file('photo');
            $photo->storeAs('public/officeprofile', $photo->hashName());

            $officeprofile->update([
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
                'photo'         => $photo->hashName()
            ]);
        }

        if($officeprofile)
        {
            return redirect(route('admin.officeprofile.index'))->with('toast_success', 'Berhasil Update Data');
        }
        else 
        {
            return redirect(route('admin.officeprofile.index'))->with('toast_error', 'Gagal');
        }
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