<?php

namespace App\Http\Controllers\Admin;

use App\Models\PackageType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PackageTypeController extends Controller
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
            
            $packagetype = PackageType::all();

            return DataTables::of($packagetype)
                ->addColumn('action', function($packagetype){
                    $button = '<a href="packagetype/'.$packagetype->id.'/edit" data-toggle="tooltip"  data-id="'.$packagetype->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
            
        }

        return view('pages.admin.packagetype.index');
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
            'name.required' => 'NAMA PACKAGE WAJIB DIISI'
        ]);

        $data = PackageType::where('name', '=', $request->input('name'))->first();

        if ($data === null)
        {
            $data = PackageType::create([
                'name' => Request()->name
            ]);
            return redirect(route('admin.packagetype.index'))->with('toast_success', 'Berhasil menambah Data');
        } else 
        {
            return redirect(route('admin.packagetype.index'))->with('toast_error', 'Gagal! Nama Sudah Terdaftar!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackageType  $packageType
     * @return \Illuminate\Http\Response
     */
    public function show(PackageType $packageType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageType  $packageType
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageType $packagetype)
    {
        return view('pages.admin.packagetype.edit', compact('packagetype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackageType  $packageType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackageType $packagetype)
    {
        $packagetype->update([
            'name'      => $request->name,
            'active'    => $request->has('active')
        ]);

        if($packagetype)
        {
            return redirect(route('admin.packagetype.index'))->with('toast_success', 'Berhasil Mengubah Data');
        }
        else 
        {
            return redirect(route('admin.packagetype.index'))->with('toast_error', 'Gagal!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageType  $packageType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageType $packageType)
    {
        //
    }
}
