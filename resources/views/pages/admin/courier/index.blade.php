@extends('layouts.master')

@section('title','Courier')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    {{-- <button class="btn btn-info" data-toggle="modal" data-target="#ModalCourier">
                        <i class="nav-icon fas fa-upload"></i>
                    </button> --}}
                    <a href="{{ route('admin.courier.create') }}" class="btn bg-danger"><i class="nav-icon fas fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
          <div class="table-responsive">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" id="table_courier">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Code 2</th>
                                <th>Name</th>
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