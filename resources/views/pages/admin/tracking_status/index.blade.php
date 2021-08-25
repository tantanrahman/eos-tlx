@extends('layouts.master')

@section('title','Tracking Status')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <i class="fas fa-plus"></i>
                    Add Tracking Status
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.tracking_status.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-5">
                                <select name="partner_id" class="form-control" id="select2partnertracking" data-width="100%">
                                    <option></option>
                                    @foreach($partners as $partner)
                                        <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-5">
                                <textarea name="status" class="form-control @error('status') is-invalid @enderror" cols="30" rows="3" style="resize:none">{{ old('status') }}</textarea>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror           
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="table-responsive">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="table_trackingstatus">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>PARTNER</th>
                                    <th>STATUS</th>
                                    <th>ACTIVE</th>
                                    <th>CREATED BY</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection