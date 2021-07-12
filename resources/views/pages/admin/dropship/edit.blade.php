@extends('layouts.master')

@section('title','Edit Dropship')

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
                    <li class="breadcrumb-item"><a href="{{ route('admin.dropship.index') }}">Dropship</a></li>
                    <li class="breadcrumb-item active">Edit Dropship</li>
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
                    Edit Dropship
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.dropship.update', $dropship->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="resi">Resi*</label>
                              <input type="text" name="resi" class="form-control @error('resi') is-invalid @enderror" id="resi" value="{{ $dropship->resi }}" autofocus oninput="this.value = this.value.toUpperCase()">
                              @error('resi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                            </div>
                            <div class="form-group col-md-6">
                              <label for="name">Nama*</label>
                              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $dropship->name }}">
                              @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="courier_id">Courier*</label>
                                <select name="courier_id" class="form-control" id="select2dropcourier" data-width="100%">
                                    <option></option>
                                    @foreach($couriers as $courier)
                                        <option value="{{ $courier->id }}" {{ ($courier->id == $dropship->courier_id) ? 'selected' : '' }}>{{ $courier->name }}</option>
                                    @endforeach
                                </select>
                                @error('courier_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="berat">Berat*</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="text" name="berat" class="form-control @error('berat') is-invalid @enderror" id="berat" value="{{ $dropship->berat }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">KG</div>
                                    </div>
                                </div>
                                <small class="form-text text-muted">
                                    <i>Input angka saja, pisahkan dengan titik (.) Jangan ada inputan huruf!</i>
                                </small>
                                @error('berat')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="jenis_barang">Jenis Barang*</label>
                                <input type="text" name="jenis_barang" class="form-control @error('jenis_barang') is-invalid @enderror" id="jenis_barang" value="{{ $dropship->jenis_barang }}">
                                @error('jenis_barang')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="city">Kota*</label>
                                <select name="city" class="form-control" id="select2City" data-width="100%">
                                    <option></option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ ($city->id == $dropship->city) ? 'selected' : '' }}>{{ $city->city }}</option>
                                    @endforeach
                                </select>
                                @error('city')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="users_id">Marketing*</label>
                                <select name="users_id" class="form-control" id="select2dropmark" data-width="100%">
                                    <option></option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ ($user->id == $dropship->users_id) ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('users_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Upload Gambar</label>
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ $dropship->photo }}">
                                <small class="form-text text-muted">
                                    <i>Jika tidak mengubah gambar. Abaikan saja untuk field ini.</i>
                                </small>
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <br>
                        <div class="float-right">
                            <button type="reset" class="btn btn-warning"><b>RESET</b></button>
                            <button type="submit" class="btn btn-primary"><b>UPDATE</b></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection