@extends('layouts.master')

@section('title','Dashboard')

@section('content')

<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
          <div class="card">
              <div class="card-header">
                <b>Customer</b>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h5>
                          @php
                              echo count($customers) 
                          @endphp
                          Total All Customers
                        </h5>
                        <p>
                          @php
                              echo count($shipper)
                          @endphp
                          Total Shipper
                        <br>
                          @php
                              echo count($consignee)
                          @endphp
                          Total Consignee
                        </p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>
                          @php
                              echo count($customersToday)
                          @endphp
                        </h3>
        
                        <p>New Customer Today</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>44</h3>
        
                        <p>User Registrations</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>65</h3>
        
                        <p>Unique Visitors</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
              </div>                
          </div>
          <h3>Please Check for This</h3>
          <ol>
            <li>Cek login menggunakan akun masing-masing.</li>
            <li>Cek nama pembuat label</li>
            <li>Cek Postal /Zip Code Connote</li>
            <li>Cek sehabis buat connote ada icon print di kanan atas</li>
            <li>Tampilan kena volume/tidak di shipment</li>
          </ol>

          <h3>Catatan</h3>
          <ol>
            <li>Untuk API gdex dimatikan terlebih dahulu karena bug production</li>
          </ol>
        </div>
      </div>
  </div>
</div>



@endsection