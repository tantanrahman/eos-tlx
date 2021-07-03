<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            
            $partner = Partner::all();

            return DataTables::of($partner)
                ->addColumn('action', function($partner){
                    $button = '<a href="partner/'.$partner->id.'/edit" data-toggle="tooltip"  data-id="'.$partner->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
            
        }

        return view('pages.admin.partner.index');
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
            'name.required' => 'NAMA BAG WAJIB DIISI'
        ]);

        $data = Partner::where('reff_id', '=', $request->input('reff_id'))->first();

        if ($data === null)
        {
            $data = Partner::create([
                'reff_id' => Request()->reff_id,
                'name' => Request()->name
            ]);
            return redirect(route('admin.partner.index'))->with('toast_success', 'Berhasil menambah Data');
        } else 
        {
            return redirect(route('admin.partner.index'))->with('toast_error', 'Gagal! Reff ID Sudah Terdaftar!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('pages.admin.partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $partner->update([
            'reff_id'       => $request->reff_id,
            'name'          => $request->name,
            'active'        => $request->has('active')
        ]);

        if($partner)
        {
            return redirect(route('admin.partner.index'))->with('toast_success', 'Berhasil Mengubah Data');
        }
        else 
        {
            return redirect(route('admin.partner.index'))->with('toast_error', 'Gagal!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //
    }
}
