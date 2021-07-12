@extends('layouts.master')

@section('title','Pickup User')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-secondary">
                    <i class="fas fa-plus"></i>
                    Add Pickup User
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.pickupuser.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-5">
                                <input oninput="this.value = this.value.toUpperCase()" type="text" name="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus autocomplete="off" placeholder="Nama User">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-5">
                                <select class="custom-select" name="jalur">
                                    <option selected disabled>-- Pilih Jalur --</option>
                                    <option value="UTARA">UTARA</option>
                                    <option value="SELATAN">SELATAN</option>
                                    <option value="BARAT">BARAT</option>
                                    <option value="TIMUR">TIMUR</option>
                                </select>
                                @error('jalur')
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
                        <table class="table table-bordered" id="table_pickupuser">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>JALUR</th>
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