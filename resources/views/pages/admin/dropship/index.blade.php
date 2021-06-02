@extends('layouts.master')

@section('title','Dropship')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.searchdateDrop') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 col-md-6">
                                <div class="input-group" id="event_period">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control actual_range" name="periode_start" id="dropship-periode-start" autocomplete="off">
                                    <span class="input-group-text rounded-0">TO</span>
                                    <input type="text" class="form-control actual_range" name="periode_end" id="dropship-periode-end" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">       
            <div class="card">
                <div class="card-body">
                    <div class="btn-group mb-4" role="group" aria-label="Basic example">
                        <a href="{{ route('admin.dropship.create') }}" class="btn bg-info"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
                        <a href="{{ route('admin.dropship.export') }}" class="btn bg-secondary dropship-export">
                            <i class="fas fa-file-excel"></i> Excel
                        </a>
                        <a href="{{ route('admin.dropship.pdf') }}" class="btn bg-secondary dropship-export">
                            <i class="fas fa-file-pdf"></i> PDF
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table_dropship" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="display: none">Id</th>
                                    <th width="70px">Tanggal</th>
                                    <th width="70px">Resi</th>
                                    <th>Nama</th>
                                    <th>Courier</th>
                                    <th>Jenis Barang</th>
                                    <th width="90px">Berat (KG)</th>
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

<div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
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
                <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus Data</button>
            </div>
        </div>
    </div>
</div>

@endsection

