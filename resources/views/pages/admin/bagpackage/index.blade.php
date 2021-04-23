@extends('layouts.master')

@section('title','Bag Package')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <i class="fas fa-plus"></i>
                    Add Bag Package
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.bagpackage.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <input oninput="this.value = this.value.toUpperCase()" type="text" name="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>
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
            </div>

            <div class="card">
                <div class="card-header bg-secondary">
                    <i class="fas fa-table"></i>
                    Table of Bag Package
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($bagpackages as $index => $bagpackage)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $bagpackage->name }}</td>
                                <td>
                                    @if ($bagpackage->active == 1)
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