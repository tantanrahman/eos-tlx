@extends('layouts.master')

@section('title','Customer')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
        
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">       
            <div class="card">
                <div class="card-body">
                    <div class="btn-group mb-4" role="group" aria-label="Basic example">
                        <a href="{{ route('admin.customer.create') }}" class="btn bg-secondary"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
                        <a href="#" class="btn bg-secondary"><i class="fas fa-file-excel"></i> Excel</a>
                        <a href="#" class="btn bg-secondary"><i class="fas fa-file-pdf"></i> PDF</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table_customer" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="display: none">Id</th>
                                    <th>Account Code</th>
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>Phone</th>
                                    <th>Group</th>
                                    <th>Action</th>
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