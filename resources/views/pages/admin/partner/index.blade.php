@extends('layouts.master')

@section('title','Partner')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <i class="fas fa-plus"></i>
                    Add Partner
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.partner.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-5">
                                <input oninput="this.value = this.value.toUpperCase()" type="text" name="reff_id" class="form-control @error('reff_id') is-invalid @enderror" name="reff_id" value="{{ old('reff_id') }}" placeholder="Reff ID" autofocus>
                                <small class="form-text text-muted">
                                    <i>Jika tidak ada. Kosongkan saja.</i>
                                </small>
                                @error('reff_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                            <div class="col-5">
                                <input oninput="this.value = this.value.toUpperCase()" type="text" name="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" autofocus>
                                @error('name')
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

            <div class="card">
                <div class="card-header bg-secondary">
                    <i class="fas fa-table"></i>
                    Table of Partner
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($partners as $index => $partner)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $partner->name }}</td>
                                <td>
                                    @if ($partner->active == 1)
                                        <span class="badge badge-success">ACTIVE</span>
                                    @else
                                        <span class="badge badge-danger">NOT ACTIVE</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection