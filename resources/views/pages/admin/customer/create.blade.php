@extends('layouts.master')

@section('title','Create Customer')

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
                    <li class="breadcrumb-item"><a href="{{ route('admin.customer.index') }}">Customer</a></li>
                    <li class="breadcrumb-item active">Create Customer</li>
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
                    Input Customer
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.customer.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="city">Customer ID (Auto Generate)</label>
                                <input type="text" class="form-control @error('account_code') is-invalid @enderror" id="customer-id" name="account_code" readonly value="{{ old('account_code') }}">
                                @error('account_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">Customer Type*</label>
                                <select class="custom-select" id="customer-type" name="group">
                                    <option selected>Select Customer Type</option>
                                    <option value="shipper">Shipper</option>
                                    <option value="consignee">Consignee</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6" id="customer-city-section" style="display: none">
                                <label for="city">City*</label>
                                <input type="text" class="form-control typeaheadCity @error('city') is-invalid @enderror" value="" autocomplete="off">
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="hidden" name="city" id="customer-city">
                            </div>
                            <div class="form-group col-md-6" id="customer-country-section" style="display: none">
                                <label for="city">Country*</label>
                                <input type="text" class="form-control typeaheadCountry @error('country_id') is-invalid @enderror" value="" autocomplete="off">
                                @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="hidden" name="country_id" id="customer-country">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">Name*</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="off">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">Company</label>
                                <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}">
                                @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">Address*</label>
                                <textarea rows="3" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" style="resize:none"></textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                                <small class="form-text text-muted">
                                    <i>Inputan Phone hanya Nomor. Jangan menggunakan tanda atau spasi.</i>
                                </small>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">Postal Code</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                                @error('phone')
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

@endsection
