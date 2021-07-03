@extends('layouts.master')

@section('title', 'Create Courier')

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
                    <li class="breadcrumb-item"><a href="{{ route('admin.courier.index') }}">Courier</a></li>
                    <li class="breadcrumb-item active">Create Courier</li>
                  </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Tanda <strong>(*) bintang</strong> menandakan kolom wajib diisi.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card">
                <div class="card-header bg-secondary">
                    <i class="fas fa-plus"></i>
                    Input Courier
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.courier.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="code">Code*</label>
                              <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" value="{{ old('code') }}" autofocus>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="code_dua">Code 2</label>
                              <input type="text" name="code_dua" class="form-control @error('code_dua') is-invalid @enderror" id="code_dua" value="{{ old('code_dua') }}">
                              <small class="form-text text-muted">
                                <i>Jika tidak ada Code tambahan. Samakan dengan Code pertama.</i>
                              </small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Name*</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="website">Website</label>
                                <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" id="website" value="{{ old('website') }}">
                                <small class="form-text text-muted">
                                    <i>ex: https://sicepat.com</i>
                                </small>
                            </div>
                        </div>
                        <br>
                        <div class="float-right">
                            <button type="reset" class="btn btn-warning"><b>RESET</b></button>
                            <button type="submit" class="btn btn-primary"><b>SIMPAN</b></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection