<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\User;
use App\Models\Courier;
use App\Models\Dropship;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Exports\DropshipExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
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

       $dropships = Dropship::join('users','dropship.users_id','=','users.id')
                                ->join('courier','dropship.courier_id','=','courier.id')
                                ->join('city','dropship.city','=','city.id')
                                ->select('dropship.created_at AS time','dropship.resi as resis','dropship.name AS names','courier.name as couriers','dropship.jenis_barang as category','dropship.berat as weight','city.city as cities','users.name as users', 'dropship.photo')->get();

       if($request->ajax())
       {

           return DataTables::of($dropships)->addColumn('photo', function($dropship){
                $url = URL::asset("/storage/dropship/".$dropship->photo);
               return '<img src='.$url.' border="0" width="100" class="img-rounded" text-align="center" />';
           })->rawColumns(['photo'])->make(true);
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
        $users = User::where('role_id','=',2)->get();
        $couriers = Courier::where('active','=',1)->get();

        return view('pages.admin.dropship.create', compact('cities','users','couriers'));
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
            'resi'              => 'required',
            'name'              => 'required',
            'courier_id'        => 'required',
            'jenis_barang'      => 'required',
            'berat'             => 'required',
            'city'              => 'required',
            'users_id'          => 'required',
            'photo'             => 'required|image'
        ], [
            'resi.required'         => 'RESI WAJIB DIISI',
            'name.required'         => 'NAMA WAJIB DIISI',
            'courier_id.required'   => 'COURIER WAJIB DIISI',
            'jenis_barang.required' => 'JENIS BARANG WAJIB DIISI',
            'berat.required'        => 'BERAT WAJIB DIISI',
            'city.required'         => 'KOTA WAJIB DIISI',
            'users_id.required'     => 'MARKETING PIC WAJIB DIISI',
            'photo.required'        => 'PHOTO WAJIB DIUPLOAD'
        ]);

        //UPLOAD GAMBAR
        $photo = $request->file('photo');
        $photo->storeAs('public/dropship', $photo->hashName());

        $data = Dropship::create([
            'resi'          => Request()->resi,
            'name'          => Request()->name,
            'courier_id'    => Request()->courier_id,
            'jenis_barang'  => Request()->jenis_barang,
            'berat'         => Request()->berat,
            'city'          => Request()->city,
            'users_id'      => Request()->users_id,
            'photo'         => $photo->hashName()
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

    /**
     * Export XLS Dropship
     * 
     * 
     */

     public function export()
     {
         return Excel::download(new DropshipExport(), 'Report-Dropship-'.date("Y-m-d").'.xlsx');
     }
}
