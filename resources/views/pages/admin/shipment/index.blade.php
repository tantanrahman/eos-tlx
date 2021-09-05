@extends('layouts.master')

@section('title','Shipment')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">       
            <div class="card">
                <div class="card-body">
                    <div class="btn-group mb-4" role="group" aria-label="Basic example">
                        <a href="{{ route('admin.shipment.create') }}" class="btn bg-info"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
                        <a href="#" class="btn bg-secondary dropship-export">
                            <i class="fas fa-file-excel"></i> Excel
                        </a>
                        <a href="#" class="btn bg-secondary dropship-export">
                            <i class="fas fa-file-pdf"></i> PDF
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table_shipment" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>CREATED AT</th>
                                    <th>CONNOTE</th>
                                    <th>SHIPPER NAME </th>
                                    <th>CONSIGNEE NAME</th>
                                    <th>DESCRIPTION</th>
                                    <th>COUNTRY</th>
                                    <th>WEIGHT</th>
                                    <th>CREATED BY</th>
                                    <th>MARKETING</th>
                                    <th>PAYMENT STATUS</th>
                                    <th>PRINTED</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="hapus-shipment" data-backdrop="false">
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
                <button type="button" class="btn btn-danger" name="action-hapus-shipment" id="action-hapus-shipment">Hapus Data</button>
            </div>
        </div>
    </div>
</div>

@endsection