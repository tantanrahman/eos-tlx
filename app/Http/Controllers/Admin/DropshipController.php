<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\User;
use App\Models\Dropship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class DropshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       //$dropship = Dropship::join('users AS u','u.id','=','dropship.users_id')->select('dropship.name','u.name');

       $dropship = Dropship::get();

       if($request->ajax())
       {
           return DataTables::of($dropship)->make(true);
       }
       
       return view('pages.admin.dropship.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $users = User::where('role_id','=',8)->get();

        return view('pages.admin.dropship.create', compact('cities','users'));
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
            'resi' => 'required',
            'name' => 'required',
            'jenis_barang' => 'required',
            'berat' => 'required',
            'city' => 'required',
            'users_id' => 'required'
        ], [
            'resi.required' => 'RESI WAJIB DIISI',
            'name.required' => 'NAMA WAJIB DIISI',
            'jenis_barang.required' => 'JENIS BARANG WAJIB DIISI',
            'berat.required' => 'BERAT WAJIB DIISI',
            'city.required' => 'KOTA WAJIB DIISI',
            'users_id.required' => 'MARKETING PIC WAJIB DIISI',
        ]);

        $data = Dropship::create([
            'resi' => Request()->resi,
            'name' => Request()->name,
            'jenis_barang' => Request()->jenis_barang,
            'berat' => Request()->berat,
            'city' => Request()->city,
            'users_id' => Request()->users_id,
        ]);

        if($data)
        {
            return redirect(route('admin.dropship.index'))->with('toast_success', 'Berhasil');
        }
        else 
        {
            return redirect(route('admin.dropship.index'))->with('toast_error', 'Gagal');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dropship  $dropship
     * @return \Illuminate\Http\Response
     */
    public function show(Dropship $dropship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dropship  $dropship
     * @return \Illuminate\Http\Response
     */
    public function edit(Dropship $dropship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dropship  $dropship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dropship $dropship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dropship  $dropship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dropship $dropship)
    {
        //
    }
}
