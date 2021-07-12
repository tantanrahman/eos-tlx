<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ongkir;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Customer;
use App\Models\PackageType;
use Yajra\DataTables\Facades\DataTables;

class OngkirController extends Controller
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
            
            $ongkir = Ongkir::get_items();

            return DataTables::of($ongkir)
                ->addColumn('action', function($ongkir){
                    $button = '<a href="ongkir/'.$ongkir->idx.'/edit" data-toggle="tooltip"  data-id="'.$ongkir->idx.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
            
        }

        return view('pages.admin.ongkir.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packagetype    = PackageType::where('active','=',1)->get();
        $countries      = Country::all();
        $customers      = Customer::all();

        return view('pages.admin.ongkir.create', compact('packagetype','countries','customers'));
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
            'packagetype_id'    => 'required',
            'country_id'        => 'required',
            'price'             => 'required'
        ],[
            'packagetype_id.required'   => 'Package Type Wajib Diisi!',
            'country_id.required'       => 'Country Wajib Diisi!',
            'price.required'            => 'Harga Wajib Diisi!'
        ]);

        $data = Ongkir::create([
            'packagetype_id'    => Request()->packagetype_id,
            'country_id'        => Request()->country_id,
            'price'             => Request()->price,

        ]);

        if ($data)
        {
            return redirect(route('admin.ongkir.index'))->with('toast_success', 'Berhasil menambah Data');
        } 
            else 
        {
            return redirect(route('admin.ongkir.index'))->with('toast_error', 'Gagal!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ongkir  $ongkir
     * @return \Illuminate\Http\Response
     */
    public function show(Ongkir $ongkir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ongkir  $ongkir
     * @return \Illuminate\Http\Response
     */
    public function edit(Ongkir $ongkir)
    {

        $packagetype    = PackageType::where('active','=',1)->get();
        $customer       = Customer::all();
        $items          = Ongkir::get_items();

        return view('pages.admin.ongkir.edit', compact('ongkir', 'packagetype','customer','items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ongkir  $ongkir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ongkir $ongkir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ongkir  $ongkir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ongkir $ongkir)
    {
        //
    }
}
