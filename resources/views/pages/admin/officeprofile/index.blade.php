@extends('layouts.master')

@section('title','Office Profile')

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
            <div class="table-responsive">
                <div class="card">
                    <div class="card-body">
                        <div class="btn-group mb-4" role="group" aria-label="Basic example">
                            <a href="{{ route('admin.officeprofile.create') }}" class="btn bg-info"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
                        </div>
                        <table class="table table-bordered" id="table_officeprofile">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>ACTIVE</th>
                                    <th>PHOTO</th>
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