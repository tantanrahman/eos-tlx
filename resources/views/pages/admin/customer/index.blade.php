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
                        <a href="{{ route('admin.customer.create') }}" class="btn btn-sm bg-info"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
                        <a href="#" class="btn btn-sm bg-secondary"><i class="fas fa-file-excel"></i> Excel</a>
                        <a href="#" class="btn btn-sm bg-secondary"><i class="fas fa-file-pdf"></i> PDF</a>
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
                                <table class="table table-hover table-bordered" id="table_customer" style="width:100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="display: none">Id</th>
                                            <th>ACCOUNT CODE</th>
                                            <th>NAME</th>
                                            <th>CITY</th>
                                            <th>PHONE</th>
                                            <th>CREATED BY</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
        
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="table_customer_con" style="width:100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="display: none">Id</th>
                                            <th>ACCOUNT CODE</th>
                                            <th>NAME</th>
                                            <th>CITY</th>
                                            <th>COUNTRY</th>
                                            <th>PHONE</th>
                                            <th>CREATED BY</th>
                                            <th>ACTION</th>
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

<div class="modal fade" tabindex="-1" role="dialog" id="hapus-customer" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PERHATIAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data ini?</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" name="action-hapus-customer" id="action-hapus-customer">Hapus Data</button>
            </div>
        </div>
    </div>
</div>

@endsection