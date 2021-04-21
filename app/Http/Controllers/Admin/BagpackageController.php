<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bagpackage;
use Illuminate\Http\Request;

class BagpackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bagpackages = Bagpackage::get();

        return view('pages.admin.bagpackage.index', compact('bagpackages'));
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

        $data = Bagpackage::create([
            'name' => Request()->name
        ]);

        if($data)
        {
            return redirect(route('admin.bagpackage.index'))->with('toast_success', 'Berhasil');
        } else
        {
            return redirect(route('admin.bagpackage.index'))->with('toast_error', 'Gagal');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bagpackage  $bagpackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bagpackage $bagpackage)
    {
        //
    }
}
