@extends('layouts.master')

@section('title','Partner')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <i class="fas fa-plus"></i>
                    Add Partner
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.partner.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-5">
                                <input oninput="this.value = this.value.toUpperCase()" type="text" name="reff_id" class="form-control @error('reff_id') is-invalid @enderror" name="reff_id" value="{{ old('reff_id') }}" placeholder="Reff ID" autofocus>
                                <small class="form-text text-muted">
                                    <i>Akan digunakan/ditampilkan di Connote. <strong>Ex: 08 GD MY</strong> </i>
                                </small>
                                @error('reff_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                            </div>
                            <div class="col-5">
                                <input oninput="this.value = this.value.toUpperCase()" type="text" name="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
            
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="table-responsive">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered" id="table_partner">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>REFF ID</th>
                                    <th>NAME</th>
                                    <th>ACTIVE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection