@extends('layouts.master')

@section('title','Postal Code')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header bg-secondary">
                    <i class="fas fa-table"></i>
                    Table of Postal Code
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>PROVINSI</th>
                                <th>KAB/KOTA</th>
                                <th>KECAMATAN</th>
                                <th>KELURAHAN</th>
                                <th>KODE POS</th>
                            </tr>
                        </thead>
                        @foreach ($postalcodes as $index => $postalcode)
                            <tr>
                                <td>{{ $postalcode->id }}</td>
                                <td>{{ $postalcode->province }}</td>
                                <td>{{ $postalcode->city }}</td>
                                <td>{{ $postalcode->district }}</td>
                                <td>{{ $postalcode->urban }}</td>
                                <td>{{ $postalcode->postal_code }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <br>
                    {{ $postalcodes->links() }}
                    <br>
                    Total data Postal Code adalah <b>{{ $postalcodes->total() }}</b> data
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection