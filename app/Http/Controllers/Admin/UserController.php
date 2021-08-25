<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\OfficeProfile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Svg\Tag\Rect;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
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
            $users = DB::table('users')
                    ->join('roles','users.role_id','=','roles.id')
                    ->select('users.id','users.username','users.name','roles.name AS rolename');
            
            return DataTables::of($users)
                    ->addColumn('action', function($user){
                        $button = '<a href="user/'.$user->id.'/edit" data-toggle="tooltip" data-id="'.$user->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('pages.admin.user.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles      = Role::get();
        $users      = User::where('role_id','=',2)->get();
        $officeprofiles = OfficeProfile::get();

        return view('pages.admin.user.create', compact('roles', 'officeprofiles', 'users'));
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
            'username'      => 'required',
            'name'          => 'required',
            'role_id'       => 'required',
            'password'      => 'required',
            'office_id'     => 'required',
        ], [
            'username.required'     => 'USERNAME WAJIB DIISI',
            'name.required'         => 'NAMA WAJIB DIISI',
            'role_id.required'      => 'ROLE WAJIB DIISI',
            'password.required'     => 'PASSWORD WAJIB DIISI',
            'office_id.required'    => 'OFFICE WAJIB DIISI'
        ]);

        $data = User::where('username', '=', $request->input('username'))->first();

        if($data == null)
        {
            $data = User::create([
                'username'  => Request()->username,
                'name'      => Request()->name,
                'role_id'   => Request()->role_id,
                'office_id' => Request()->office_id,
                'email'     => Request()->email,
                'password'  => Hash::make(Request()->password),
                'pic'       => Request()->pic,
                'phone'     => Request()->phone,
                'instagram' => Request()->instagram,
            ]);

            return redirect(route('admin.user.index'))->with('toast_success', 'Berhasil Menambah User');
        }
            else
        {
            return redirect(route('admin.user.index'))->with('toast_error', 'Gagal! Username Sudah Ada');
        }

    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $marketing          = User::where('role_id','=',2)->get();
        $roles              = Role::get();
        $officeprofiles     = OfficeProfile::get();

        return view('pages.admin.user.edit', compact('user','marketing','roles','officeprofiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->update([
            'name'      => $request->name,
            'role_id'   => $request->role_id,
            'office_id' => $request->office_id,
            'email'     => $request->email,
            'pic'       => $request->pic,
            'phone'     => $request->phone,
            'instagram' => $request->instagram,
        ]);

        if($user)
        {
            return redirect(route('admin.user.index'))->with('toast_success', 'Berhasil');
        }
        else 
        {
            return redirect(route('admin.user.index'))->with('toast_error', 'Gagal');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
