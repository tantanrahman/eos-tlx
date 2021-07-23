@extends('layouts.master')

@section('title','Edit Customer')

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
                    <li class="breadcrumb-item active">Edit Customer</li>
                  </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-secondary">
                <h6 class="card-header"><i class="fas fa-edit"></i> Edit Customer</h6>
                <div class="card-body">
                    <form action="{{ route('admin.customer.update', $customer->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="city">Customer ID (Auto Generate)</label>
                                <input type="text" class="form-control @error('account_code') is-invalid @enderror" id="customer-id" name="account_code" readonly value="{{ $customer->account_code }}" placeholder="ID akan terisi otomatis">
                                @error('account_code')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="city">Customer Type*</label>
                                <select class="custom-select" id="customer-type" name="group">
                                    <option selected disabled>-- Select Customer Type --</option>
                                    <option value="shipper" {{ $customer->group =="shipper" ? 'selected' : '' }}>Shipper</option>
                                    <option value="consignee" {{ $customer->group =="consignee" ? 'selected' : '' }}>Consignee</option>
                                </select>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="city_name">City*</label>
                                <input type="text" name="city_name" class="form-control typeaheadCity @error('city_name') is-invalid @enderror" autocomplete="off" id="consignee-city" value="{{ $items->city_name }}">    
                                @error('city_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input class="form-control" type="hidden" name="city_id" id="customer-city">
                            </div>

                            <div class="form-group col-md-6" id="customer-country-section">
                                <label for="country_name">Country*</label>
                                <input type="text" name="country_name" class="form-control typeaheadCountry @error('country_name') is-invalid @enderror" autocomplete="off" id="customer-name-country" value="{{ $items->country_name }}">
                                @error('country_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input class="form-control" type="hidden" name="country_id" id="customer-country">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name">Name*</label>
                                <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off" value="{{ $customer->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="city">Company</label>
                                <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ $customer->company_name }}">
                                @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="city">Address*</label>
                                <textarea oninput="this.value = this.value.toUpperCase()" rows="3" class="form-control @error('address') is-invalid @enderror" name="address" style="resize:none">{{ $customer->address }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="city">Phone*</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $customer->phone }}" onblur="this.value=removeSpaces(this.value);">
                                <small class="form-text text-muted">
                                    <i>Inputan Phone hanya Nomor.</i>
                                </small>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="city">Postal Code</label>
                                <input type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ $customer->postal_code }}">
                                @error('postal_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6" style="display: none">
                                <label for="city">Created By</label>
                                <input type="text" class="form-control @error('created_by') is-invalid @enderror" name="created_by" value="{{ Auth::user()->name }}" disabled>
                                @error('created_by')
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