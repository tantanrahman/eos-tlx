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
        </div>
    </div>

    
</div>
@endsection