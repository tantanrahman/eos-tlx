<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\User;
use App\Models\Courier;
use App\Models\Dropship;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Exports\DropshipExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
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

       if($request->ajax())
       {
            $dropships = Dropship::join('users','dropship.users_id','=','users.id')
                        ->join('courier','dropship.courier_id','=','courier.id')
                        ->join('city','dropship.city','=','city.id')
                        ->select('dropship.id as idx','dropship.created_at AS time','dropship.resi as resis','dropship.name AS names','courier.name as couriers','dropship.jenis_barang as category','dropship.berat as weight','city.city as cities','users.name as users', 'dropship.photo')->get();

           return DataTables::of($dropships)
                        ->addColumn('photo', function($dropship){
                            $url = URL::asset("/storage/dropship/".$dropship->photo);
                            return '<img src='.$url.' border="0" height="60" width="100" class="img-rounded" text-align="center" />';
                        })
                        ->addColumn('action', function($dropship){
                            $button = '<a href="dropship/'.$dropship->idx.'/edit" data-toggle="tooltip"  data-id="'.$dropship->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$dropship->idx.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';     
                            return $button;
                        })
                        ->rawColumns(['photo','action'])
                        ->make(true);
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
            return redirect(route('admin.dropship.index'))->with('toast_success', 'Berhasil Tambah Data');
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

        $cities = City::all();
        $users = User::where('role_id','=',2)->get();
        $couriers = Courier::where('active','=',1)->get();

        return view('pages.admin.dropship.edit', compact('dropship', 'cities', 'users', 'couriers'));
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
        $dropship = Dropship::findOrFail($dropship->id);

        if($request->file('photo') == "")
        {
            $dropship->update([
                'resi'              => $request->resi,
                'name'              => $request->name,
                'courier_id'        => $request->courier_id,
                'jenis_barang'      => $request->jenis_barang,
                'berat'             => $request->berat,
                'city'              => $request->city,
                'users_id'          => $request->users_id,    
            ]);
        } 
        else
        {
            //Delete Old Image
            Storage::disk('local')->delete('public/dropship'.$dropship->photo);

            //Upload New Image
            $photo = $request->file('photo');
            $photo->storeAs('public/dropship', $photo->hashName());

            $dropship->update([
                'resi'              => $request->resi,
                'name'              => $request->name,
                'courier_id'        => $request->courier_id,
                'jenis_barang'      => $request->jenis_barang,
                'berat'             => $request->berat,
                'city'              => $request->city,
                'users_id'          => $request->users_id,
                'photo'             => $photo->hashName()
            ]);
        }

        if($dropship)
        {
            return redirect(route('admin.dropship.index'))->with('toast_success', 'Berhasil Update Data');
        }
        else 
        {
            return redirect(route('admin.dropship.index'))->with('toast_error', 'Gagal');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dropship  $dropship
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dropship = Dropship::findOrFail($id);
        Storage::disk('local')->delete('public/dropship'.$dropship->photo);
        $dropship->delete();

        if($dropship)
        {
            return redirect(route('admin.dropship.index'))->with('toast_success', 'Berhasil Hapus Data');
        }
        else 
        {
            return redirect(route('admin.dropship.index'))->with('toast_error', 'Gagal');
        }

    }

    /**
     * Export XLS Dropship
     */

     public function export()
     {
         return Excel::download(new DropshipExport(), 'Report-Dropship-'.date("Y-m-d").'.xlsx');
     }

    /**
     * Download and Print PDF
    */

    public function pdf()
    {
        $dropships = Dropship::join('users','dropship.users_id','=','users.id')
                                        ->join('courier','dropship.courier_id','=','courier.id')
                                         ->join('city','dropship.city','=','city.id')
                                         ->select('dropship.created_at AS time','dropship.resi','courier.name as courier','dropship.name AS dname','dropship.jenis_barang','dropship.berat','city.city as cities','users.name as marketing')->whereDate('dropship.created_at', Carbon::today())->get();

        $pdf = PDF::loadView('pages.admin.dropship.export', compact('dropships'))->setPaper('a4', 'landscape');
        return $pdf->download('Report-Dropship-'.date("Y-m-d").'.pdf');
    }
}
