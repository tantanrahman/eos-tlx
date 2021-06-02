@extends('layouts.master')

@section('title','Courier')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="table-responsive">
                <div class="card">
                    <div class="card-body">
                        <div class="btn-group mb-4" role="group" aria-label="Basic example">
                            <a href="{{ route('admin.courier.create') }}" class="btn bg-secondary"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
                        </div>
                        <table class="table table-bordered" id="table_courier">
                            <thead class="thead-dark">
                                <tr>
                                    <th>CODE</th>
                                    <th>CODE 2</th>
                                    <th>NAME</th>
                                    <th>ACTIVE</th>
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
