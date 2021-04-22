@extends('layouts.master')

@section('title','Create User')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    {{-- <button class="btn btn-info" data-toggle="modal" data-target="#ModalCourier">
                        <i class="nav-icon fas fa-upload"></i>
                    </button> --}}
                    <a href="#" class="btn bg-danger"><i class="nav-icon fas fa-plus"></i></a>
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
                    Create User
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.user.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="username">Username*</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Nama*</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="role_id">Role*</label>
                                <select name="role_id" class="form-control" id="select2userrole" data-width="100%">
                                    <option></option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password*</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="phone">Phone/Whatsapp</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="instagram">Instagram</label>
                                <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="officeprofile">Office Profile*</label>
                                <select name="office_id" class="form-control" id="select2userofficeprofile" data-width="100%">
                                    <option></option>
                                    @foreach($officeprofiles as $op)
                                        <option value="{{ $op->id }}">{{ $op->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="float-right">
                            <button type="reset" class="btn btn-warning"><b>RESET</b></button>
                            <button type="submit" class="btn btn-primary"><b>SIMPAN</b></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection