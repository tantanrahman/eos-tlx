<?php

namespace App\Http\Controllers\Admin;

use App\Models\PickupUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PickupUserController extends Controller
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
            
            $pickupuser = PickupUser::all();

            return DataTables::of($pickupuser)
                ->addColumn('action', function($pickupuser){
                    $button = '<a href="pickupuser/'.$pickupuser->id.'/edit" data-toggle="tooltip"  data-id="'.$pickupuser->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
            
        }

        return view('pages.admin.pickupuser.index');
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
            'name'      => 'required',
        ],[
            'name.required' => 'USER WAJIB DIISI'
        ]);

        $data = PickupUser::where('name', '=', $request->input('name'))->first();

        if ($data === null)
        {
            $data = PickupUser::create([
                'name'  => Request()->name,
                'jalur' => Request()->jalur
            ]);
            return redirect(route('admin.pickupuser.index'))->with('toast_success', 'Berhasil Menambah Data');
        } 
            else 
        {
            return redirect(route('admin.pickupuser.index'))->with('toast_error', 'Gagal!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PickupUser  $pickupUser
     * @return \Illuminate\Http\Response
     */
    public function show(PickupUser $pickupUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PickupUser  $pickupUser
     * @return \Illuminate\Http\Response
     */
    public function edit(PickupUser $pickupuser)
    {
        return view('pages.admin.pickupuser.edit', compact('pickupuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PickupUser  $pickupUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PickupUser $pickupuser)
    {
        $pickupuser->update([
            'name'      => $request->name,
            'jalur'     => $request->jalur,
            'active'    => $request->has('active')
        ]);

        if($pickupuser)
        {
            return redirect(route('admin.pickupuser.index'))->with('toast_success', 'Berhasil Mengubah Data');
        }
        else 
        {
            return redirect(route('admin.pickupuser.index'))->with('toast_error', 'Gagal!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PickupUser  $pickupUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(PickupUser $pickupUser)
    {
        //
    }
}
