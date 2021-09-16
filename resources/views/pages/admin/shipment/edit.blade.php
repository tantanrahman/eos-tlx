@extends('layouts.master')

@section('title','Edit Shipment')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
    
    </div>
    
    <section class="content">
        <div class="container-fluid">    
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Tanda <strong>(*) bintang</strong> menandakan kolom wajib diisi.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.shipment.update', $shipment->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                                        <div class="form-group col-md-12">
                                            <label for="connote">Connote</label>
                                            <input type="text" name="connote" class="form-control @error('connote') is-invalid @enderror" value="{{ $shipment->connote }}" autocomplete="off">
                                            @error('connote')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- <div>
                                            <input type="text" class="form-control" name="connote" value="{{ $shipment->connote }}" readonly>
                                        </div> --}}
                                        <div>
                                            <input type="hidden" class="form-control" name="id[0]" value="{{ $shipment->shipper_id }}" readonly>
                                        </div>
                                        <div>
                                            <input type="hidden" id="customer-id" class="form-control" value="{{ $shipper->account_code }}" name="account_code[0]" readonly>
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
                                                    <option value="{{ $user->id }}" {{ ($user->id == $shipment->marketing_id) ? 'selected' : '' }}>{{ $user->name }}</option>
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
                                            <input type="text" name="name[0]" class="form-control typeaheadShipmentShipper @error('name[0]') is-invalid @enderror" value="{{ $shipper->name }}" autocomplete="off">
                                            @error('name[0]')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="company_name">Company Name</label>
                                            <input type="text" name="company_name[0]" class="form-control @error('company_name') is-invalid @enderror" value="{{ $shipper->company_name }}" autocomplete="off">
                                            @error('company_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12" id="customer-country-section">
                                            <label for="con_country_name">Country</label>
                                            <select name="country_id[0]" class="form-control" id="select2countryshipshipment" data-width="100%">
                                                <option></option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->id }}" {{ ($country->id == $shipper->country_id) ? 'selected' : '' }}>{{ $country->name }}</option>
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
                                            <input type="text" name="postal_code[0]" class="form-control @error('postal_code') is-invalid @enderror" autocomplete="off" value="{{ $shipper->postal_code }}">
                                            @error('postal_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="address">Address*</label>
                                            <textarea name="address[0]" rows="3" class="form-control @error('address') is-invalid @enderror" style="resize:none" autocomplete="off">{{ $shipper->address }}</textarea>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="city_name">City*</label>
                                            <input name="city_name[0]" type="text" class="form-control typeaheadCity @error('city_name') is-invalid @enderror" autocomplete="off" value="{{ $shipper->city_name }}">
                                            @error('city_name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <input class="form-control" type="hidden" value="{{ $shipper->city_id }}" name="city_id[0]" id="customer-city">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone[0]" value="{{ $shipper->phone }}" autocomplete="off">
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
                                        <input type="hidden" id="con-customer-id" class="form-control" name="account_code[1]" value="{{ $consignee->account_code }}" readonly>
                                    </div>
                                    <div>
                                        <input type="hidden" class="form-control" name="id[1]" value="{{ $shipment->consignee_id }}" readonly>
                                    </div>
                                    {{-- <div>
                                        <input type="hidden" class="form-control" name="apikey[1]" readonly>
                                    </div> --}}
                                    <div>
                                        <input type="hidden" class="form-control" name="group[]" value="consignee" readonly>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="name">Name*</label>
                                        <input type="text" name="name[1]" class="form-control typeaheadShipmentConsignee @error('con_name') is-invalid @enderror" value="{{ $consignee->name }}"  autocomplete="off">
                                        @error('con_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="con_company_name">Company Name</label>
                                        <input type="text" name="company_name[1]" class="form-control @error('con_company_name') is-invalid @enderror" value="{{ $consignee->company_name }}" autocomplete="off">
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
                                            <option value="{{ $country->id }}" {{ ($country->id == $consignee->country_id) ? 'selected' : '' }}>{{ $country->name }}</option>
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
                                        <input type="text" value="{{ $consignee->postal_code }}" name="postal_code[1]" class="form-control @error('con_postal_code') is-invalid @enderror" autocomplete="off">
                                        @error('con_postal_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="con_address">Address*</label>
                                        <textarea name="address[1]" rows="3" class="form-control @error('con_address') is-invalid @enderror" style="resize:none" autocomplete="off">{{ $consignee->address }}</textarea>
                                        @error('con_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="con_city_name">City*</label>
                                        <input name="city_name[1]" type="text" class="form-control @error('con_city_name') is-invalid @enderror" autocomplete="off" value="{{ $consignee->city_name }}">
                                        @error('con_city_name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="hidden" name="city_id[1]" value="0">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="con_phone">Phone</label>
                                        <input type="text" class="form-control @error('con_phone') is-invalid @enderror" name="phone[1]" value="{{ $consignee->phone }}" autocomplete="off">
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
                                        <select name="packagetype_id"
                                            class="form-control @error('packagetype_id') is-invalid @enderror"
                                            id="select2shippackagetype" data-width="100%">
                                            @foreach($packagetypes as $pt)
                                            <option value="{{ $pt->id }}"
                                                {{$shipment->packagetype_id == $pt->id ? 'selected' : ''}}>
                                                {{ $pt->name }}</option>
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
                                        <textarea oninput="this.value = this.value.toUpperCase()" rows="3"
                                            class="form-control @error('description') is-invalid @enderror"
                                            name="description" value="{{ old('description') }}"
                                            style="resize:none">{{$shipment->description}}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="city">Delivery Instruction</label>
                                        <textarea oninput="this.value = this.value.toUpperCase()" rows="3"
                                            class="form-control @error('delivery_intructions') is-invalid @enderror"
                                            name="delivery_intructions" value="{{ old('delivery_intructions') }}"
                                            style="resize:none">{{$shipment->delivery_intructions}}</textarea>
                                        @error('delivery_intructions')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="values">Values</label>
                                        <input oninput="this.value = this.value.toUpperCase()" type="text" name="values"
                                            class="form-control @error('values') is-invalid @enderror"
                                            value="{{ $shipment->values }}" autocomplete="off">
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
                                        <select name="partner_id"
                                            class="form-control @error('partner_id') is-invalid @enderror"
                                            id="select2shippartner" data-width="100%">
                                            <option></option>
                                            @foreach($partners as $partner)
                                            <option value="{{ $partner->id }}"
                                                {{$shipment->partner_id == $partner->id ? "selected" : ""}}>
                                                {{ $partner->name }}</option>
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
                                        <input type="text" name="redoc_connote"
                                            class="form-control @error('redoc_connote') is-invalid @enderror"
                                            value="{{ $shipment->redoc_connote }}" autocomplete="off">
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
                                        <input type="text" name="modal" class="form-control uang @error('modal') is-invalid @enderror" value="{{ $shipment->modal }}"  autocomplete="off">
                                        @error('modal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="ongkir">Ongkir</label>
                                        <input type="text" name="ongkir" class="form-control uang @error('ongkir') is-invalid @enderror" value="{{ $shipment->ongkir }}"  autocomplete="off">
                                        @error('ongkir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="city">Payment</label></label>
                                        <select class="custom-select" name="payment_status">
                                            <option value="0" {{ $shipment->payment_status == 0 ? 'selected' : '' }}>Unpaid</option>
                                            <option value="1" {{ $shipment->payment_status == 1 ? 'selected' : '' }}>Paid</option>
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
                                        <table class="table table-bordered table-hover" style="width:100%"
                                            id="table_shipmentdetails">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="input-group">
                                                            <input type="text" id="actual_weight" name="actual_weight"
                                                                class="form-control @error('actual_weight') is-invalid @enderror"
                                                                id="actual_weight" value="{{ old('actual_weight') }}"
                                                                autocomplete="off" placeholder="Actual Weight">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">KG</div>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="input-group">
                                                            <input type="text" id="length" name="length"
                                                                class="form-control @error('length') is-invalid @enderror"
                                                                id="length" value="{{ old('length') }}"
                                                                autocomplete="off" placeholder="Length">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">CM</div>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="input-group">
                                                            <input type="text" id="width" name="width"
                                                                class="form-control @error('width') is-invalid @enderror"
                                                                id="width" value="{{ old('width') }}" autocomplete="off"
                                                                placeholder="Width">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">CM</div>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="input-group">
                                                            <input type="text" id="height" name="height"
                                                                class="form-control @error('height') is-invalid @enderror"
                                                                id="height" value="{{ old('height') }}"
                                                                autocomplete="off" placeholder="Height">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">CM</div>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th colspan="3">
                                                        <a class="btn btn-info btn-submit" id="addRow"><i
                                                                class="fa fa-plus"></i>
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
                                                @php
                                                    $totalv = 0;
                                                @endphp
                                                @foreach ($shipmentdetails as $item)
                                                
                                                <tr>
                                                    <td>{{$item->actual_weight}}</td>
                                                    <td>{{$item->length}}</td>
                                                    <td>{{$item->width}}</td>
                                                    <td>{{$item->height}}</td>
                                                    <td align="right">{{$item->sum_volume}}</td>
                                                    <td align="right">{{$item->sum_weight}}</td>
                                                    <td>
                                                        <button type='button' id='{{ $item->id }}' class='btn btn-danger removeSD'><i class='fas fa-trash'></i></button>
                                                    </td>
                                                </tr>
                                                @php
                                                    $totalv += $item->sum_volume;
                                                @endphp
                                                @endforeach
                                            </tbody>
                                            
                                            {{-- <tfoot>
                                                <tr>
                                                    <th colspan="4">TOTAL</th>
                                                    <th style="text-align: right" id="total-volume">0</th>
                                                    <th style="text-align: right" id="sum-weight">0</th>
                                                    <th>

                                                    </th>
                                                </tr>
                                            </tfoot> --}}
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

<div class="modal fade" tabindex="-1" role="dialog" id="hapus-shipmentdetails" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PERHATIAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data ini?</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" name="action-hapus-shipment" id="action-hapus-shipment">Hapus Data</button>
            </div>
        </div>
    </div>
</div>
@endsection