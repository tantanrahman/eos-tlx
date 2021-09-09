@extends('layouts.master')

@section('title','User')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">User</a></li>
                    <li class="breadcrumb-item active">List User</li>
                  </ol>
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
                        <a href="{{ route('admin.user.create') }}" class="btn bg-info"><i class="nav-icon fas fa-plus"></i> Tambah Data</a>
                    </div>
                    <table class="table table-bordered" id="table_user">
                        <thead class="thead-dark">
                            <tr>
                                <th>USERNAME</th>
                                <th>NAME</th>
                                <th>ROLE</th>
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