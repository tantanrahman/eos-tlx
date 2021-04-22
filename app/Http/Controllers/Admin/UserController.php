<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OfficeProfile;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();

        return view('pages.admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $officeprofiles = OfficeProfile::get();

        return view('pages.admin.user.create', compact('roles', 'officeprofiles'));
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
            'username' => 'required',
            'name' => 'required',
            'role_id' => 'required',
            'password' => 'required',
            'office_id' => 'required'
        ], [
            'username.required' => 'USERNAME WAJIB DIISI',
            'name.required' => 'NAMA WAJIB DIISI',
            'role_id.required' => 'ROLE WAJIB DIISI',
            'password.required' => 'PASSWORD WAJIB DIISI',
            'office_id.required' => 'OFFICE WAJIB DIISI'
        ]);

        $data = User::create([
            'username' => Request()->username,
            'name' => Request()->name,
            'role_id' => Request()->role_id,
            'office_id' => Request()->office_id,
            'email' => Request()->email,
            'password' => Hash::make(Request()->password)
        ]);

        if($data)
        {
            return redirect(route('admin.user.index'))->with('toast_success', 'Berhasil');
        }
        else 
        {
            return redirect(route('admin.user.index'))->with('toast_error', 'Gagal');
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
        //
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
        //
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
