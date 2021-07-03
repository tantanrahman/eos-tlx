@extends('layouts.master')

@section('title','Edit Partner')

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
                    <li class="breadcrumb-item"><a href="{{ route('admin.partner.index') }}">Partner</a></li>
                    <li class="breadcrumb-item active">Edit Partner</li>
                  </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-secondary" style="width: 50%">
                <h6 class="card-header"><i class="fas fa-edit"></i> Edit Partner</h6>
                <div class="card-body">
                    <form action="{{ route('admin.partner.update', $partner->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            
                            <div class="form-group col-md-6">
                                <label for=""><b>Reff ID*</b></label>
                                <input type="text" class="form-control @error('reff_id') is invalid @enderror" name="reff_id"  value="{{ $partner->reff_id }}"> 
                                @error('reff_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for=""><b>Nama*</b></label>
                                <input type="text" class="form-control @error('name') is invalid @enderror" name="name"  value="{{ $partner->name }}"> 
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <br>

                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="active" name="active" value="1" {{ ($partner->active || old('active',0) === 1 ? ' checked' : '') }}>
                                <label class="custom-control-label" for="active">Active</label>
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