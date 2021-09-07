<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CourierController extends Controller
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
            
            $courier = Courier::all();

            return DataTables::of($courier)
                ->addColumn('action', function($courier){
                    $button = '<a href="courier/'.$courier->id.'/edit" data-toggle="tooltip"  data-id="'.$courier->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
            
        }
       
       return view('pages.admin.courier.index');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.courier.create');
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
            'reff_id'   => 'required',
            'name'      => 'required'
        ], [
            'reff_id.required'  => "Code Wajib Diisi!",
            'name.required'     => "Nama Wajib Diisi!"
        ]);

        $data = Courier::create([
            'reff_id'   => Request()->code,
            'name'      => Request()->name
        ]);

        if($data)
        {
            return redirect(route('admin.courier.index'))->with('toast_success','Berhasil');
        } else
        {
            return redirect(route('admin.courier.index'))->with('toast_error','Gagal');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function show(Courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function edit(Courier $courier)
    {
        return view('pages.admin.courier.edit', compact('courier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courier $courier)
    {
        $courier->update([
            'name'      => $request->name,
            'active'    => $request->has('active')
        ]);

        if($courier)
        {
            return redirect(route('admin.courier.index'))->with('toast_success', 'Berhasil Mengubah Status');
        }
        else 
        {
            return redirect(route('admin.courier.index'))->with('toast_error', 'Gagal!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courier $courier)
    {
        //
    }

    /**
     * 
     * Get All Courier
     */
    public function autocompleteCourier(Request $request)
    {
        $couriers = Courier::select('id', 'name as label')
            ->where('name', 'like', "%{$request->term}%")
            ->where('active','=',1)
			->get();

		return response()->json($couriers);
            
    }
}
