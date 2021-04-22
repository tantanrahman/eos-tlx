@extends('layouts.master')

@section('title','Dropship')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    {{-- <button class="btn btn-info" data-toggle="modal" data-target="#ModalCourier">
                        <i class="nav-icon fas fa-upload"></i>
                    </button> --}}
                    <a href="{{ route('admin.dropship.create') }}" class="btn bg-danger"><i class="nav-icon fas fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
          <div class="table-responsive">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" id="table_dropship">
                        <thead class="thead-dark">
                            <tr>
                                
                                <th>Tanggal</th>
                                <th>Resi</th>
                                <th>Nama</th>
                                <th>Jenis Barang</th>
                                <th>Berat (KG)</th>
                                <th>Kota</th>
                                <th>Marketing</th>
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

