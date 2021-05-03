@extends('layouts.master')

@section('title','Dropship')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          <input type="text" class="form-control float-right" id="datedropship">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">       
            <div class="card">
                <div class="card-body">
                    <div class="btn-group mb-4" role="group" aria-label="Basic example">
                        <a href="{{ route('admin.dropship.create') }}" class="btn bg-secondary"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
                        <a href="{{ route('admin.dropship.export') }}" class="btn bg-secondary"><i class="fas fa-file-excel"></i> Excel</a>
                        <a href="{{ route('admin.dropship.pdf') }}" class="btn bg-secondary"><i class="fas fa-file-pdf"></i> PDF</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table_dropship" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="display: none">Id</th>
                                    <th>Tanggal</th>
                                    <th>Resi</th>
                                    <th>Nama</th>
                                    <th>Courier</th>
                                    <th>Jenis Barang</th>
                                    <th>Berat (KG)</th>
                                    <th>Kota</th>
                                    <th>Marketing</th>
                                    <th>Photo</th>
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

