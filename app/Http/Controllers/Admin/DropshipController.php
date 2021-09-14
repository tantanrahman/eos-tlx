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
			$date_start = ( ! empty($request->get('date_start')) ? $request->get('date_start') : '');
			$date_end = ( ! empty($request->get('date_end')) ? $request->get('date_end') : '');

			$dropships = Dropship::get_items($date_start, $date_end,'');

            return DataTables::of($dropships)
                        ->addColumn('photo', function($dropship){
                            $url = URL::asset("/storage/dropship/".$dropship->photo);
                            return '<img src='.$url.' border="0" height="60" width="100" class="img-rounded" text-align="center" />';
                        })
                        
                        ->addColumn('action', function($dropship){
                            // $button = '<a href="dropship/'.$dropship->idx.'/edit" data-toggle="tooltip"  data-id="'.$dropship->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
                            // $button .= '&nbsp;&nbsp;';
                            // $button .= '<button type="button" name="delete" id="'.$dropship->idx.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';     
                            // return $button;

                            $button =   '<div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="dropship/'.$dropship->idx.'/edit" type="button" class="btn btn-info" data-id="'.$dropship->id.'" data-toggle="tooltip" data-placement="top" title="EDIT"><i class="far fa-edit"></i></a>
                                            <button type="button" name="delete" id="'.$dropship->idx.'" class="delete btn btn-danger" data-toggle="tooltip" data-placement="top" title="HAPUS"><i class="far fa-trash-alt"></i></button>
                                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="VIEW"><i class="fas fa-search"></i></button>
                                        </div>';

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
    protected function create()
    {
        $cities     = City::all();
        $users      = User::where('role_id','=',2)->get();
        $couriers   = Courier::where('active','=',1)->get();

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

        // dd($request);

        $this->validate($request, [
            'resi'              => 'required',
            'name'              => 'required',
            'courier_id'        => 'required',
            'jenis_barang'      => 'required',
            'berat'             => 'required',
            'city_name'         => 'required',
            'users_id'          => 'required',
            'photo'             => 'required|image|mimes:jpeg,jpg,png'
        ], [
            'resi.required'         => 'RESI WAJIB DIISI',
            'name.required'         => 'NAMA WAJIB DIISI',
            'courier_id.required'   => 'COURIER WAJIB DIISI',
            'jenis_barang.required' => 'JENIS BARANG WAJIB DIISI',
            'berat.required'        => 'BERAT WAJIB DIISI',
            'city_name.required'    => 'KOTA WAJIB DIISI',
            'users_id.required'     => 'MARKETING PIC WAJIB DIISI',
            'photo.required'        => 'PHOTO WAJIB DIUPLOAD'
        ]);

        //UPLOAD GAMBAR
        $photo = $request->file('photo');
        $photo->storeAs('public/dropship', $photo->hashName());

        $data = Dropship::where('resi', '=', $request->input('resi'))->first();

        if($data === null)
        {
            $data = Dropship::create([
                'resi'          => Request()->resi,
                'name'          => Request()->name,
                'courier_id'    => Request()->courier_id,
                'jenis_barang'  => Request()->jenis_barang,
                'berat'         => Request()->berat,
                'city_name'     => Request()->city_name,
                'city_id'       => Request()->city_id,
                'users_id'      => Request()->users_id,
                'photo'         => $photo->hashName()
            ]);

            return redirect(route('admin.dropship.index'))->with('toast_success', 'Berhasil Tambah Data');
        }
        else
        {
            return redirect(route('admin.dropship.index'))->with('toast_error', 'Gagal! Resi Sudah Terdaftar!');
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
        $get_courier    = true;
        $edit           = Dropship::get_items_name($dropship->id);
        $users          = User::where('role_id','=',2)->get();
        $kurir          = Dropship::get_items('', '', $get_courier);

        return view('pages.admin.dropship.edit', compact('dropship', 'edit', 'users', 'kurir'));
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
                'city_name'         => $request->city_name,
                'city_id'           => $request->city_id,
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
                'city_name'         => $request->city_name,
                'city_id'           => $request->city_id,
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
        $dropship = Dropship::where('id',$id)->delete();

        return response()->json($dropship);
    }

    /**
     * @author Tantan
     * @description Export Dropship XLSX
     * @created 7 Sep 2021
     */

    public function export()
    {
        return Excel::download(new DropshipExport(), 'Report Dropship '.date("Y-m-d").'.xlsx');

    }

    /**
     * @author Tantan
     * @description Export Dropship PDF
     * @created 7 Sep 2021
     */

    public function pdf(Request $request)
    {
		$date_start = ( ! empty($request->get('date_start')) ? $request->get('date_start') : '');
		$date_end = ( ! empty($request->get('date_end')) ? $request->get('date_end') : '');

		$dropships = Dropship::get_items($date_start, $date_end, '');

        $pdf = PDF::loadView('pages.admin.dropship.export', compact('dropships'))->setPaper('a4', 'landscape');
        return $pdf->download('Report Dropship '.date("Y-m-d").'.pdf');
    }

    
}
