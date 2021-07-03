@extends('layouts.master')

@section('title','Edit Bag Number')

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
                    <li class="breadcrumb-item"><a href="{{ route('admin.bagpackage.index') }}">Bag Number</a></li>
                    <li class="breadcrumb-item active">Create Bag Number</li>
                  </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-secondary" style="width: 50%">
                <h6 class="card-header"><i class="fas fa-edit"></i> Edit BAG Status</h6>
                <div class="card-body">
                    <form action="{{ route('admin.bagpackage.update', $bagpackage->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label for=""><b>Nama Bag *</b></label>
                                <input type="text" class="form-control @error('name') is invalid @enderror" name="name" placeholder="BAG1/BAG2/BAG3/dst" readonly value="{{ $bagpackage->name }}"> 
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <br>

                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="active" name="active" value="1" {{ ($bagpackage->active || old('active',0) === 1 ? ' checked' : '') }}>
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