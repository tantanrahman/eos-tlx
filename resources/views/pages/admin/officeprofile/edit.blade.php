@extends('layouts.master')

@section('title','Edit Office Profile')

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
                    <li class="breadcrumb-item"><a href="{{ route('admin.officeprofile.index') }}">Office Profile</a></li>
                    <li class="breadcrumb-item active">Create Office Profile</li>
                  </ol>
                </div>
            </div>
        </div>
    </div>
    
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Tanda <strong>(*) bintang</strong> menandakan kolom wajib diisi.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card">
                <div class="card-header bg-secondary">
                    <i class="fas fa-plus"></i>
                    Input Office Profile
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.officeprofile.update', $officeprofile->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label for=""><b>Nama *</b></label>
                                <input type="text" class="form-control @error('name') is invalid @enderror" name="name" autofocus oninput="this.value = this.value.toUpperCase()" value="{{ $officeprofile->name }}">
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label for=""><b>About</b></label>
                                <textarea name="about" id="about" rows="3" class="form-control">{{ $officeprofile->about }}</textarea>
                                @error('about')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label for=""><b>Address</b></label>
                                <textarea name="address" id="address" rows="3" class="form-control">{{ $officeprofile->address }}</textarea>
                                @error('address')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label for=""><b>Embed Gmap</b></label>
                                <textarea name="embed_gmap" id="embed_gmap" rows="3" class="form-control">{{ $officeprofile->embed_gmap }}</textarea>
                                @error('embed_gmap')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <label for=""><b>Facebook</b></label>
                                <input type="text" class="form-control @error('facebook') is invalid @enderror" value="{{ $officeprofile->facebook }}" name="facebook" autofocus>
                                <small class="form-text text-muted">
                                    <i>https://facebook.com/<b>contoh_medsos</b></i>
                                </small>
                                @error('facebook')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <label for=""><b>Whatsapp</b></label>
                                <input type="text" class="form-control @error('whatsapp') is invalid @enderror" value="{{ $officeprofile->whatsapp }}" name="whatsapp" autofocus>
                                <small class="form-text text-muted">
                                    <i>6281221222333</b></i>
                                </small>
                                @error('whatsapp')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <label for=""><b>Instagram</b></label>
                                <input type="text" class="form-control @error('instagram') is invalid @enderror" {{ $officeprofile->instagram }} name="instagram" autofocus>
                                <small class="form-text text-muted">
                                    <i>https://instagram.com/<b>contoh_medsos</b></i>
                                </small>
                                @error('instagram')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <label for=""><b>Youtube</b></label>
                                <input type="text" class="form-control @error('youtube') is invalid @enderror" value="{{ $officeprofile->youtube }}" name="youtube" autofocus>
                                <small class="form-text text-muted">
                                    <i>https://youtube.com/<b>contoh_medsos</b></i>
                                </small>
                                @error('youtube')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <label for=""><b>Twitter</b></label>
                                <input type="text" class="form-control @error('twitter') is invalid @enderror" value="{{ $officeprofile->twitter }}" name="twitter" autofocus>
                                <small class="form-text text-muted">
                                    <i>https://twitter.com/<b>contoh_medsos</b></i>
                                </small>
                                @error('twitter')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <label for=""><b>Tiktok</b></label>
                                <input type="text" class="form-control @error('tiktok') is invalid @enderror" value="{{ $officeprofile->tiktok }}" name="tiktok" autofocus>
                                <small class="form-text text-muted">
                                    <i>https://tiktok.com/<b>contoh_medsos</b></i>
                                </small>
                                @error('tiktok')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Upload Logo*</label>
                                <input type="file" class="form-control-file @error('photo') is-invalid @enderror" value="{{ $officeprofile->photo }}" name="photo">
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
                            <button type="submit" class="btn btn-primary"><b>SIMPAN</b></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>