@extends('layouts.master')

@section('title','Edit Tracking Status')

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
                    <li class="breadcrumb-item"><a href="{{ route('admin.tracking_status.index') }}">Tracking Status</a></li>
                    <li class="breadcrumb-item active">Edit Tracking Status</li>
                  </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-secondary">
                <h6 class="card-header"><i class="fas fa-edit"></i> Edit Tracking Status</h6>
                <div class="card-body">
                    <form action="{{ route('admin.tracking_status.update', $trackingStatus->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            
                            <div class="form-group col-md-6">
                                <label for=""><b>Partner</b></label>
                                <select name="partner_id" class="form-control @error('partner_id') is-invalid @enderror" id="select2partnertracking" data-width="100%">
                                    <option></option>
                                    @foreach($partners as $partner)
                                        <option value="{{ $partner->id }}" {{ ($partner->id == $trackingStatus->partner_id) ? 'selected' : '' }}>{{ $partner->name }}</option>
                                    @endforeach
                                </select>
                                @error('partner_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                           
                            <div class="form-group col-md-6">
                                <label for=""><b>Status*</b></label>
                                <textarea class="form-control" name="status" cols="150" rows="2" style="resize:none">{{ $trackingStatus->status }}</textarea>
                                @error('status')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <br>

                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="active" name="active" value="1" {{ ($trackingStatus->active || old('active',0) === 1 ? ' checked' : '') }}>
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