@extends('layouts.master')

@section('title','City')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                {{-- <div class="col-6">
                    <button class="btn btn-info" data-toggle="modal" data-target="#ModalCourier">
                        <i class="nav-icon fas fa-upload"></i>
                    </button>
                    <a href="{{ route('admin.dropship.create') }}" class="btn bg-danger"><i class="nav-icon fas fa-plus"></i></a>
                </div> --}}
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
          <div class="table-responsive">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Province</th>
                                <th>City</th>
                                <th>District</th>
                                <th>Urban</th>
                                <th>Postal Code</th>
                            </tr>
                        </thead>
                        @foreach ($cities as $city)
                            <tbody>
                                <tr>
                                    <td>{{ $city->id }}</td>
                                    <td>{{ $city->province }}</td>
                                    <td>{{ $city->city }}</td>
                                    <td>{{ $city->district }}</td>
                                    <td>{{ $city->urban }}</td>
                                    <td>{{ $city->postal_code }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    <br>
                    {{ $cities->links() }}
                </div>
            </div>
          </div>
        </div>
    </section>
</div>
@endsection