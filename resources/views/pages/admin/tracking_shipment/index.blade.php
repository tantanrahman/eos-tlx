@extends('layouts.master')

@section('title','Tracking Shipment')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Upload Tracking Shipment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Upload Tracking Shipment</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <hr>
            <div class="card">
                <h6 class="card-header" style="background:#6c757d;color:white;"><i class="fas fa-edit"></i> Silakan upload file <b>Tracking Shipment</b></h6>
                <div class="card-body">
                    <form action="{{ route('admin.importTracking') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h5 class="card-title"><b>Select File *</b></h5>
                        <br>
                        <p class="card-text"><input type="file" name="file" class="btn btn-secondary"></p>
                        <button class="btn btn-info">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


</div>
@endsection