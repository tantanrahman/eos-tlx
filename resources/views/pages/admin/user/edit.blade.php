@extends('layouts.master')

@section('title','Edit User')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">User</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                  </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Tanda <strong>(*) bintang</strong> menandakan kolom wajib diisi.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card">
                <div class="card-header bg-secondary">
                    <i class="fas fa-plus"></i>
                    Edit User
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="resi">Username*</label>
                              <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ $user->username }}" readonly>
                              @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                            </div>
                            {{-- <div class="form-group col-md-6">
                                <label for="resi">Password*</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ $user->password }}">
                                @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div> --}}
                            <div class="form-group col-md-6">
                                <label for="name">Nama*</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autocomplete="off" value="{{ $user->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autocomplete="off" value="{{ $user->email }}">
                            </div>
                            <div class="form-group col-md-6" id="pic-marketing-user" style="display: none">
                                <label for="users_id">PIC Marketing*</label>
                                <select name="users_id" class="form-control" id="select2dropmark" data-width="100%">
                                    <option></option>
                                    @foreach($marketing as $mkt)
                                        <option value="{{ $mkt->id }}" {{ ($mkt->id == $user->pic) ? 'selected' : '' }}>{{ $mkt->name }}</option>
                                    @endforeach
                                </select>
                                @error('users_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone/Whatsapp</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" autocomplete="off" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="instagram">Instagram</label>
                                <input type="text" class="form-control @error('instagram') is-in    valid @enderror" id="instagram" name="instagram" autocomplete="off" value="{{ $user->instagram }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="officeprofile">Office Profile*</label>
                                <select name="office_id" class="form-control" id="select2userofficeprofile" data-width="100%">
                                    <option></option>
                                    @foreach($officeprofiles as $op)
                                        <option value="{{ $op->id }}" {{ ($op->id == $user->office_id) ? 'selected' : '' }}>{{ $op->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="role_id">Role*</label>
                                <select name="role_id" class="form-control" id="select2userrole" data-width="100%">
                                    <option></option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ ($role->id == $user->role_id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="float-right">
                            <button type="reset" class="btn btn-warning"><b>RESET</b></button>
                            <button type="submit" class="btn btn-primary"><b>UPDATE</b></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection