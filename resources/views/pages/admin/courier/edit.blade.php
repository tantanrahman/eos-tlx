@extends('layouts.master')

@section('title','Edit Courier')

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
                    <li class="breadcrumb-item"><a href="{{ route('admin.courier.index') }}">Courier</a></li>
                    <li class="breadcrumb-item active">Edit Courier</li>
                  </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-secondary">
                <h6 class="card-header"><i class="fas fa-edit"></i> Edit Courier Status</h6>
                <div class="card-body">
                    <form action="{{ route('admin.courier.update', $courier->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            
                            <div class="form-group col-md-6">
                                <label for="code"><b>Code*</b></label>
                                <input type="text" class="form-control @error('code') is invalid @enderror" name="code" readonly value="{{ $courier->code }}"> 
                                @error('code')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="code_dua"><b>Code 2</b></label>
                                <input type="text" class="form-control @error('code_dua') is invalid @enderror" name="code_dua" readonly value="{{ $courier->code_dua }}"> 
                                @error('code_dua')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name"><b>Name*</b></label>
                                <input type="text" class="form-control @error('name') is invalid @enderror" name="name" value="{{ $courier->name }}"> 
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="website"><b>Website</b></label>
                                <input type="text" class="form-control @error('website') is invalid @enderror" name="website" value="{{ $courier->website }}"> 
                                <small class="form-text text-muted">
                                    <i>ex: https://sicepat.com</i>
                                </small>
                                @error('website')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <br>

                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="active" name="active" value="1" {{ ($courier->active || old('active',0) === 1 ? ' checked' : '') }}>
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