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
                                        <input type="text" name="name" class="form-control typeaheadCustomer @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" autocomplete="off">
                                        @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="company_name">Company Name</label>
                                        <input type="text" name="company_name" class="form-control typeaheadShipment @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" autocomplete="off">
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
                                        <label for="resi">Postal Code</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" autocomplete="off">
                                        @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="city">Address*</label>
                                        <textarea rows="3" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" style="resize:none"></textarea>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12" id="customer-city-section">
                                        <label for="city">City*</label>
                                        <input type="text" class="form-control typeaheadCity @error('city') is-invalid @enderror" value="" autocomplete="off">
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="hidden" name="city" id="customer-city">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="city">Phone</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
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
                                    <label for="resi">Name*</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}"  autocomplete="off">
                                    @error('name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="resi">Company Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}"  autocomplete="off">
                                    @error('name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12" id="customer-country-section">
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
                                    <label for="resi">Postal Code</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}"  autocomplete="off">
                                    @error('name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="city">Address*</label>
                                    <textarea rows="3" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" style="resize:none"></textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12" id="customer-city-section">
                                    <label for="city">City*</label>
                                    <input type="text" class="form-control typeaheadCity @error('city') is-invalid @enderror" value="" autocomplete="off">
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input type="hidden" name="city" id="customer-city">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="city">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
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
                                    <input type="text" name="values" class="form-control @error('values') is-invalid @enderror" id="values" value="{{ old('values') }}"  autocomplete="off">
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
                                    <input type="text" name="values" class="form-control @error('values') is-invalid @enderror" id="values" value="{{ old('values') }}"  autocomplete="off">
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
                                    <input type="text" name="values" class="form-control uang @error('values') is-invalid @enderror" id="values" value="{{ old('values') }}"  autocomplete="off">
                                    @error('values')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="resi">Ongkir</label>
                                    <input type="text" name="values" class="form-control uang @error('values') is-invalid @enderror" id="values" value="{{ old('values') }}"  autocomplete="off">
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
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </section>
</div>
@endsection