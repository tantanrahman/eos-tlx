@extends('layouts.master')

@section('title','Create Shipment')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        {{-- <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    
                </div>
            </div>
        </div> --}}
    </div>

    <section class="content">
        <div class="container-fluid">    
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Tanda <strong>(*) bintang</strong> menandakan kolom wajib diisi.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card ">
                        <div class="card-body">
                            <h4>
                                Shipper :
                            </h4>
                            <hr style="border: 2px solid black">
                            <form action="#">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" name="account_code" readonly>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="users_id">Marketing*</label>
                                        <select name="users_id" class="form-control @error('users_id') is-invalid @enderror" id="select2dropmark" data-width="100%">
                                            <option></option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('users_id')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="resi">Name*</label>
                                        <input type="text" name="name" class="form-control typeaheadShipmentShipper @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="off">
                                        @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="company_name">Company Name</label>
                                        <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" autocomplete="off">
                                        @error('company_name')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12" id="customer-country-section">
                                        <label for="city">Country</label>
                                        <input type="text" class="form-control @error('country_id') is-invalid @enderror" value="Indonesia" autocomplete="off" disabled>
                                        @error('country_id')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="hidden" name="country_id" id="customer-country">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="postal_code">Postal Code</label>
                                        <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" autocomplete="off">
                                        @error('postal_code')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Address*</label>
                                        <textarea name="address" rows="3" class="form-control @error('address') is-invalid @enderror" style="resize:none" autocomplete="off"></textarea>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="city_name">City*</label>
                                        <input name="city_name" type="text" class="form-control typeaheadCity @error('city_name') is-invalid @enderror" autocomplete="off">
                                        @error('city_name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="hidden" name="city_id" id="customer-city">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="off">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>
                                Consignee :
                            </h4>
                            <hr style="border: 2px solid black">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" name="con_account_code" readonly>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name">Name*</label>
                                    <input type="text" name="name" class="form-control typeaheadShipmentConsignee @error('name') is-invalid @enderror" value="{{ old('name') }}"  autocomplete="off">
                                    @error('name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="con_company_name">Company Name</label>
                                    <input type="text" name="con_company_name" class="form-control @error('con_company_name') is-invalid @enderror" value="{{ old('con_company_name') }}" autocomplete="off">
                                    @error('con_company_name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12" id="customer-country-section">
                                    <label for="con_country_name">Country</label>
                                    <input type="text" name="con_country_name" class="form-control @error('con_country_name') is-invalid @enderror" autocomplete="off">
                                    @error('con_country_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input type="hidden" name="country_id" id="customer-country">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="con_postal_code">Postal Code</label>
                                    <input type="text" name="con_postal_code" class="form-control @error('con_postal_code') is-invalid @enderror" autocomplete="off">
                                    @error('con_postal_code')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="con_address">Address*</label>
                                    <textarea name="con_address" rows="3" class="form-control @error('con_address') is-invalid @enderror" style="resize:none" autocomplete="off"></textarea>
                                    @error('con_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="con_city_name">City*</label>
                                    <input name="con_city_name" type="text" class="form-control @error('con_city_name') is-invalid @enderror" autocomplete="off">
                                    @error('con_city_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input type="hidden" name="city_id" id="customer-city">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="con_phone">Phone</label>
                                    <input type="text" class="form-control @error('con_phone') is-invalid @enderror" name="con_phone" value="{{ old('con_phone') }}" autocomplete="off">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h4>
                                Goods :
                            </h4>
                            <hr style="border: 2px solid black">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="users_id">Package Type*</label>
                                    <select name="users_id" class="form-control @error('packagetype_id') is-invalid @enderror" id="select2shippackagetype" data-width="100%">
                                        <option></option>
                                        @foreach($packagetypes as $pt)
                                            <option value="{{ $pt->id }}">{{ $pt->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('users_id')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="city">Description*</label>
                                    <textarea oninput="this.value = this.value.toUpperCase()" rows="3" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" style="resize:none"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="city">Delivery Instruction</label>
                                    <textarea oninput="this.value = this.value.toUpperCase()" rows="3" class="form-control @error('delivery_instruction') is-invalid @enderror" name="delivery_instruction" value="{{ old('delivery_instruction') }}" style="resize:none"></textarea>
                                    @error('delivery_instruction')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="resi">Values</label>
                                    <input type="text" name="values" class="form-control @error('values') is-invalid @enderror" value="{{ old('values') }}"  autocomplete="off">
                                    @error('values')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card h-75">
                        <div class="card-body">
                            <h4>
                                Redoc :
                            </h4>
                            <hr style="border: 2px solid black">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="users_id">Package Type*</label>
                                    <select name="users_id" class="form-control @error('packagetype_id') is-invalid @enderror" id="select2shippartner" data-width="100%">
                                        <option></option>
                                        @foreach($partners as $partner)
                                            <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('users_id')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="resi">Connote</label>
                                    <input type="text" name="values" class="form-control @error('values') is-invalid @enderror" value="{{ old('values') }}"  autocomplete="off">
                                    @error('values')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card h-75">
                        <div class="card-body">
                            <h4>
                                Finance :
                            </h4>
                            <hr style="border: 2px solid black">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="resi">Modal</label>
                                    <input type="text" name="values" class="form-control uang @error('values') is-invalid @enderror" value="{{ old('values') }}"  autocomplete="off">
                                    @error('values')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="resi">Ongkir</label>
                                    <input type="text" name="values" class="form-control uang @error('values') is-invalid @enderror" value="{{ old('values') }}"  autocomplete="off">
                                    @error('values')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="city">Payment</label></label>
                                    <select class="custom-select" id="customer-type" name="group">
                                        <option selected>Select Payment</option>
                                        <option value="shipper">Paid</option>
                                        <option value="consignee">Unpaid</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>
                                Shipment Details :
                            </h4>
                            <hr style="border: 2px solid black">
                            <div class="form-row">
                                <div class="table-responsive">
                                    <table id="table_shipmentdetail" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">kg</span>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="input-group">                  
                                                        <span class="input-group-addon">cm</span>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">cm</span>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">cm</span>
                                                    </div>
                                                </th>
                                                <th colspan="3">
                                                    <a class="btn btn-default" href="#"
                                                        id="add_piece"><i class="fa fa-plus"></i>
                                                        Add Another Package</a>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>Actual Weight (kg)</th>
                                                <th>Length (cm)</th>
                                                <th>Width (cm)</th>
                                                <th>Height (cm)</th>
                                                <th>Volume (cm<sup>3</sup>)</th>
                                                <th>Total Weight (kg)</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4">TOTAL</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>
                                                   
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </section>
</div>
@endsection