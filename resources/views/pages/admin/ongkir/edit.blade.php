@extends('layouts.master')

@section('title','Edit Ongkir')

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
                    <li class="breadcrumb-item"><a href="{{ route('admin.ongkir.index') }}">Ongkir</a></li>
                    <li class="breadcrumb-item active">Create Ongkir</li>
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
                    Edit Ongkir
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.ongkir.update', $ongkir->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="packagetype_id">Package Type*</label>
                                <select class="form-control" id="select2ongkirpackagetype" data-width="100%">
                                    <option></option>
                                    @foreach($packagetype as $ptype)
                                        <option value="{{ $ptype->id }}" {{ ($ptype->id == $ongkir->packagetype_id) ? 'selected' : '' }}>{{ $ptype->name }}</option>
                                    @endforeach
                                </select>
                                @error('packagetype_id')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="country_id">Country*</label>
                                <input type="text" value="" class="form-control typeaheadCountry @error('country_id') is-invalid @enderror" autocomplete="off">
                                <input type="hidden" name="country_id">
                                @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="customer_id">Customer</label>
                                <input type="text" name="customer_id" class="form-control typeaheadCustomer @error('customer_id') is-invalid @enderror" value="" autocomplete="off">
                                @error('customer_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="price">Harga*</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ $ongkir->price }}" autocomplete="off">
                                </div>
                                @error('price')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="modal">Modal</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="text" name="modal" class="form-control @error('modal') is-invalid @enderror" id="modal" value="{{ $ongkir->modal }}" autocomplete="off">
                                </div>
                                @error('modal')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="estimation">Estimation</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="text" name="estimation" class="form-control @error('estimation') is-invalid @enderror" id="estimation" value="{{ $ongkir->estimation }}" autocomplete="off">
                                </div>
                                @error('estimation')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="estimation_detail">Estimation Detail</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input oninput="this.value = this.value.toUpperCase()" type="text" name="estimation_detail" class="form-control @error('estimation_detail') is-invalid @enderror" id="estimation_detail" value="{{ $ongkir->estimation_detail }}" autocomplete="off" placeholder="DAYS / WEEKS">
                                </div>
                                @error('estimation_detail')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="remark"><b>Remark</b></label>
                                <textarea name="remark" id="remark" rows="3" class="form-control"></textarea>
                                @error('remark')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <br>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="active" name="active" value="1" {{ ($ongkir->active || old('active',0) === 1 ? ' checked' : '') }}>
                                    <label class="custom-control-label" for="active">Active</label>
                                </div>
                            <br>
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