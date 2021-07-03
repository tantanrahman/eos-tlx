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
                        <table class="table table-bordered" id="table_dropship" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="display: none">ID</th>
                                    <th>CONNOTE</th>
                                    <th>SHIPPER NAME</th>
                                    <th>CONSIGNEE NAME</th>
                                    <th>DESCRIPTION</th>
                                    <th>PIECES</th>
                                    <th>WEIGHT</th>
                                    <th>CREATED BY</th>
                                    <th>MARKETING</th>
                                    <th>PRINTED</th>
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