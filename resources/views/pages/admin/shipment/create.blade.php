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
            <form action="{{ route('admin.shipment.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card ">
                            <div class="card-body">
                                <h4>
                                    Shipper :
                                </h4>
                                <hr style="border: 2px solid black">
                                    <div class="form-row">
                                        <div>
                                            <input type="hidden" name="created_by[]" value="{{ Auth::user()->name }}" readonly>
                                        </div>
                                        <div>
                                            <input type="hidden" id="connote" class="form-control" name="connote" readonly>
                                        </div>
                                        <div>
                                            <input type="hidden" class="form-control" name="apikey[0]" value="{{ $apikey + $nextId }}" readonly>
                                        </div>
                                        <div>
                                            <input type="hidden" class="form-control" name="id[0]" value="{{ $nextId ?? '' }}" readonly>
                                        </div>
                                        <div>
                                            <input type="hidden" id="customer-id" class="form-control" name="account_code[0]" readonly>
                                        </div>
                                        <div>
                                            <input type="hidden" class="form-control" name="group[]" value="shipper" readonly>
                                        </div>
                                        <div>
                                            <input type="hidden" class="form-control" name="status_eng" readonly value="Prepared at TLX Office">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="marketing_id">Marketing*</label>
                                            <select name="marketing_id" class="form-control @error('marketing_id') is-invalid @enderror" id="select2dropmark" data-width="100%">
                                                <option></option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('marketing_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="resi">Name*</label>
                                            <input type="text" name="name[0]" class="form-control typeaheadShipmentShipper @error('name[0]') is-invalid @enderror" value="{{ old('name[0]') }}" autocomplete="off">
                                            @error('name[0]')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="company_name">Company Name</label>
                                            <input type="text" name="company_name[0]" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" autocomplete="off">
                                            @error('company_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12" id="customer-country-section">
                                            <label for="ship_country_name">Country</label>
                                            <select name="country_id[0]" class="form-control" id="select2countryshipshipment" data-width="100%">
                                                <option></option>
                                                @foreach($countries as $country)
                                                    <option autofocus value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('con_country_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="postal_code">Postal Code</label>
                                            <input type="text" name="postal_code[0]" class="form-control @error('postal_code') is-invalid @enderror" autocomplete="off">
                                            @error('postal_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="address">Address*</label>
                                            <textarea name="address[0]" rows="3" class="form-control @error('address') is-invalid @enderror" style="resize:none" autocomplete="off"></textarea>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="city_name">City*</label>
                                            <input name="city_name[0]" type="text" class="form-control typeaheadCity @error('city_name') is-invalid @enderror" autocomplete="nope">
                                            @error('city_name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <input class="form-control" type="hidden" name="city_id[0]" id="customer-city">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone[0]" value="{{ old('phone') }}" autocomplete="off">
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
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4>
                                    Consignee :
                                </h4>
                                <hr style="border: 2px solid black">
                                <div class="form-row">
                                    <div>
                                        <input type="hidden" id="con-customer-id" class="form-control" name="account_code[1]" readonly>
                                    </div>
                                    <div>
                                        <input type="hidden" class="form-control" name="id[1]" value="{{ $nextId + 1 ?? '' }}" readonly>
                                    </div>
                                    <div>
                                        <input type="hidden" class="form-control" name="apikey[1]" value="{{ $apikey + $nextId + 1 }}" readonly>
                                    </div>
                                    <div>
                                        <input type="hidden" class="form-control" name="group[]" value="consignee" readonly>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="name">Name*</label>
                                        <input type="text" name="name[1]" class="form-control typeaheadShipmentConsignee @error('con_name') is-invalid @enderror" value="{{ old('con_name') }}"  autocomplete="off">
                                        @error('con_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="con_company_name">Company Name</label>
                                        <input type="text" name="company_name[1]" class="form-control @error('con_company_name') is-invalid @enderror" value="{{ old('con_company_name') }}" autocomplete="off">
                                        @error('con_company_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12" id="customer-country-section">
                                        <label for="con_country_name">Country</label>
                                        <select name="country_id[1]" class="form-control" id="select2countryconshipment" data-width="100%">
                                            <option></option>
                                            @foreach($countries as $country)
                                                <option autofocus value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('con_country_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="con_postal_code">Postal Code</label>
                                        <input type="text" name="postal_code[1]" class="form-control @error('con_postal_code') is-invalid @enderror" autocomplete="off">
                                        @error('con_postal_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="con_address">Address*</label>
                                        <textarea name="address[1]" rows="3" class="form-control @error('con_address') is-invalid @enderror" style="resize:none" autocomplete="off"></textarea>
                                        @error('con_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="con_city_name">City*</label>
                                        <input name="city_name[1]" type="text" class="form-control @error('con_city_name') is-invalid @enderror" autocomplete="off">
                                        @error('con_city_name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="hidden" name="city_id[1]" value="0">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="con_phone">Phone</label>
                                        <input type="text" class="form-control @error('con_phone') is-invalid @enderror" name="phone[1]" value="{{ old('con_phone') }}" autocomplete="off">
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
                                        <label for="packagetype_id">Package Type*</label>
                                        <select name="packagetype_id" class="form-control @error('packagetype_id') is-invalid @enderror" id="select2shippackagetype" data-width="100%">
                                            <option></option>
                                            @foreach($packagetypes as $pt)
                                                <option value="{{ $pt->id }}">{{ $pt->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('packagetype_id')
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
                                        <textarea oninput="this.value = this.value.toUpperCase()" rows="3" class="form-control @error('delivery_instruction') is-invalid @enderror" name="delivery_instructions" value="{{ old('delivery_instruction') }}" style="resize:none"></textarea>
                                        @error('delivery_instruction')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="values">Values</label>
                                        <input oninput="this.value = this.value.toUpperCase()" type="text" name="values" class="form-control @error('values') is-invalid @enderror" value="{{ old('values') }}"  autocomplete="off">
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
                        <div class="card">
                            <div class="card-body">
                                <h4>
                                    Redoc :
                                </h4>
                                <hr style="border: 2px solid black">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="partner_id">Partner*</label>
                                        <select name="partner_id" class="form-control @error('partner_id') is-invalid @enderror" id="select2shippartner" data-width="100%">
                                            <option></option>
                                            @foreach($partners as $partner)
                                                <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('partner_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="redoc_connote">Connote</label>
                                        <input type="text" name="redoc_connote" class="form-control @error('redoc_connote') is-invalid @enderror" value="{{ old('redoc_connote') }}"  autocomplete="off">
                                        @error('redoc_connote')
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
                                    Finance :
                                </h4>
                                <hr style="border: 2px solid black">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="modal">Modal</label>
                                        <input type="text" name="modal" class="form-control uang @error('modal') is-invalid @enderror" value="{{ old('modal') }}"  autocomplete="off">
                                        @error('modal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="ongkir">Ongkir</label>
                                        <input type="text" name="ongkir" class="form-control uang @error('ongkir') is-invalid @enderror" value="{{ old('ongkir') }}"  autocomplete="off">
                                        @error('ongkir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="city">Payment</label></label>
                                        <select class="custom-select" name="payment_status">
                                            <option selected disabled>-- Select Payment --</option>
                                            <option value="0">Unpaid</option>
                                            <option value="1">Paid</option>
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
                                        <table class="table table-bordered table-hover" style="width:100%" id="list_pieces">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="input-group">
                                                            <input type="text" id="actual_weight" name="actual_weight" class="form-control @error('actual_weight') is-invalid @enderror" id="actual_weight" value="{{ old('actual_weight') }}" autocomplete="off" placeholder="Actual Weight">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">KG</div>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="input-group">                  
                                                            <input type="text" id="length" name="length" class="form-control @error('length') is-invalid @enderror" id="length" value="{{ old('length') }}" autocomplete="off" placeholder="Length">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">CM</div>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="input-group">                  
                                                            <input type="text" id="width" name="width" class="form-control @error('width') is-invalid @enderror" id="width" value="{{ old('width') }}" autocomplete="off" placeholder="Width">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">CM</div>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="input-group">                  
                                                            <input type="text" id="height" name="height" class="form-control @error('height') is-invalid @enderror" id="height" value="{{ old('height') }}" autocomplete="off" placeholder="Height">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">CM</div>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th colspan="3">
                                                        <a class="btn btn-info btn-submit" id="addRow"><i class="fa fa-plus"></i>
                                                            Add Package</a>
                                                    </th>
                                                </tr>
                                                <tr style="background-color: #000000; color:white">
                                                    <th>Actual Weight (kg)</th>
                                                    <th>Length (cm)</th>
                                                    <th>Width (cm)</th>
                                                    <th>Height (cm)</th>
                                                    <th>Volume (cm<sup>3</sup>)</th>
                                                    <th>Total Weight (kg)</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody id="plt">
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4">TOTAL</th>
                                                    <th id="total-volume">0</th>
                                                    <th id="sum-weight">0</th>
                                                    <th>
                                                
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <div class="float-right">
                                    <button type="reset" class="btn btn-warning"><b>RESET</b></button>
                                    <button type="submit" class="btn btn-primary"><b>SIMPAN</b></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </form>
        </div>
    </section>
</div>
@endsection