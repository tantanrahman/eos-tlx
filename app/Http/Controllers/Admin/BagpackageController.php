<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bagpackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class BagpackageController extends Controller
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
            
            $bagpackage = Bagpackage::all();

            return DataTables::of($bagpackage)
                ->addColumn('action', function($bagpackage){
                    $button = '<a href="bagpackage/'.$bagpackage->id.'/edit" data-toggle="tooltip"  data-id="'.$bagpackage->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
            
        }
        
        return view('pages.admin.bagpackage.index');
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

        $data = Bagpackage::where('name', '=', $request->input('name'))->first();

        if ($data === null)
        {
            $data = Bagpackage::create([
                'name' => Request()->name
            ]);
            return redirect(route('admin.bagpackage.index'))->with('toast_success', 'Berhasil menambah Data');
        } 
            else 
        {
            return redirect(route('admin.bagpackage.index'))->with('toast_error', 'Gagal! Bag Number Sudah Terdaftar!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bagpackage  $bagpackage
     * @return \Illuminate\Http\Response
     */
    public function show(Bagpackage $bagpackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bagpackage  $bagpackage
     * @return \Illuminate\Http\Response
     */
    public function edit(Bagpackage $bagpackage)
    {
        return view('pages.admin.bagpackage.edit', compact('bagpackage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bagpackage  $bagpackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bagpackage $bagpackage)
    {
        $bagpackage->update([
            'active'  => $request->has('active')
        ]);

        if($bagpackage)
        {
            return redirect(route('admin.bagpackage.index'))->with('toast_success', 'Berhasil Mengubah Status');
        }
        else 
        {
            return redirect(route('admin.bagpackage.index'))->with('toast_error', 'Gagal!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bagpackage  $bagpackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bagpackage $bagpackage)
    {
        
    }
}
