@extends('layouts.master')

@section('title','User')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    {{-- <button class="btn btn-info" data-toggle="modal" data-target="#ModalCourier">
                        <i class="nav-icon fas fa-upload"></i>
                    </button> --}}
                    <a href="{{ route('admin.user.create') }}" class="btn bg-danger"><i class="nav-icon fas fa-plus"></i></a>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header bg-secondary">
                    <i class="fa fa-table"></i>
                    Table of User
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                        </tr>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>

    
                
</div>
@endsection