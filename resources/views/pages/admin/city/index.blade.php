@extends('layouts.master')

@section('title','City')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            {{-- <div class="card">
                <div class="card-header bg-secondary">
                    <i class="fas fa-plus"></i>
                    Add Role
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.role.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>                
            </div> --}}

            <div class="card">
                <div class="card-header bg-secondary">
                    <i class="fa fa-table"></i>
                    Table of City
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Province</th>
                            <th>City</th>
                        </tr>
                        @foreach ($cities as $index => $city)
                            <tr>
                                <td>{{ $cities->firstItem() + $index }}</td>
                                <td>{{ $city->code }}</td>
                                <td>{{ $city->province }}</td>
                                <td>{{ $city->city }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <br>
                    {{ $cities->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection