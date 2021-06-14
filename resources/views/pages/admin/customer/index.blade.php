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
                        <a href="{{ route('admin.customer.create') }}" class="btn bg-info"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
                        <a href="#" class="btn bg-secondary"><i class="fas fa-file-excel"></i> Excel</a>
                        <a href="#" class="btn bg-secondary"><i class="fas fa-file-pdf"></i> PDF</a>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Shipper</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Consignee</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>
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
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_customer2" style="width:100%">
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
            </div>
        </div>
    </section>
</div>
@endsection