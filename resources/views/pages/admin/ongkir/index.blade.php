@extends('layouts.master')

@section('title','Ongkir')

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
                        <a href={{ route('admin.ongkir.create') }} class="btn bg-info"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="table_ongkir" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>PACKAGE TYPE</th>
                                    <th>COUNTRY</th>
                                    <th>PRICE (Rp)</th>
                                    <th>ACTIVE</th>
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
@endsection