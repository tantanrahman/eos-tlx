<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Models\TrackingStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TrackingStatusController extends Controller
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
            
            $tracking   = TrackingStatus::get_items_name();

            return DataTables::of($tracking)
                ->addColumn('action', function($tracking){
                    $button = '<a href="tracking_status/'.$tracking->id.'/edit" data-toggle="tooltip"  data-id="'.$tracking->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
            
        }

        $partners           = Partner::where('active','=',1)->get();
        
        return view('pages.admin.tracking_status.index', compact('partners'));
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
            'partner_id'    => 'required',
            'status'        => 'required'
        ],[
            'partner_id.required'   => 'Nama Partner Wajib Diisi!',
            'status.required'       => 'Status Wajib Diisi!',
        ]);
        
        $data = TrackingStatus::create([
            'partner_id'    => Request()->partner_id,
            'status'        => Request()->status,
            'created_by'    => Auth::user()->id
        ]);

        if ($data)
        {
            return redirect(route('admin.tracking_status.index'))->with('toast_success', 'Berhasil menambah Data');
        } 
            else 
        {
            return redirect(route('admin.tracking_status.index'))->with('toast_error', 'Gagal! Bag Number Sudah Terdaftar!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrackingStatus  $trackingStatus
     * @return \Illuminate\Http\Response
     */
    public function show(TrackingStatus $trackingStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrackingStatus  $trackingStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(TrackingStatus $trackingStatus)
    {
        $partners = Partner::all();

        return view('pages.admin.tracking_status.edit', compact('trackingStatus','partners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrackingStatus  $trackingStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrackingStatus $trackingStatus)
    {
        $trackingStatus->update([
            'partner_id'    => $request->partner_id,
            'status'        => $request->status,
            'active'        => $request->has('active')
        ]);

        if($trackingStatus)
        {
            return redirect(route('admin.tracking_status.index'))->with('toast_success', 'Berhasil Mengubah Data');
        }
        else 
        {
            return redirect(route('admin.tracking_status.index'))->with('toast_error', 'Gagal!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrackingStatus  $trackingStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrackingStatus $trackingStatus)
    {
        //
    }
}
