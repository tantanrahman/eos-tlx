@extends('layouts.master')

@section('title','Edit Pickup User')

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
                    <li class="breadcrumb-item"><a href="{{ route('admin.pickupuser.index') }}">Pickup User</a></li>
                    <li class="breadcrumb-item active">Edit Pickup User</li>
                  </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-secondary" style="width: 50%">
                <h6 class="card-header"><i class="fas fa-edit"></i> Edit Pickup User</h6>
                <div class="card-body">
                    <form action="{{ route('admin.pickupuser.update', $pickupuser->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            
                            <div class="form-group col-md-6">
                                <label for=""><b>Nama*</b></label>
                                <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control @error('name') is invalid @enderror" name="name" value="{{ $pickupuser->name }}"> 
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for=""><b>Jalur</b></label>
                                <select class="custom-select" name="jalur">
                                    <option value="" {{ $pickupuser->jalur =="" ? 'selected' : '' }} disabled>-- Pilih Jalur --</option>
                                    <option value="UTARA" {{ $pickupuser->jalur =="UTARA" ? 'selected' : '' }}>UTARA</option>
                                    <option value="SELATAN" {{ $pickupuser->jalur =="SELATAN" ? 'selected' : '' }}>SELATAN</option>
                                    <option value="BARAT" {{ $pickupuser->jalur =="BARAT" ? 'selected' : '' }}>BARAT</option>
                                    <option value="TIMUR" {{ $pickupuser->jalur =="TIMUR" ? 'selected' : '' }}>TIMUR</option>
                                </select>
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <br>

                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="active" name="active" value="1" {{ ($pickupuser->active || old('active',0) === 1 ? ' checked' : '') }}>
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