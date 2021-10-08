@extends('layouts.master')

@section('title','Tracking Shipment')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tracking Shipment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tracking Shipment</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <hr>
            <div class="card card-secondary">
                <h6 class="card-header"><i class="fas fa-edit"></i> Added Tracking Shipment</h6>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <select class="connote-multiple-select form-control" name="shipment_id[]" multiple="multiple">

                            @foreach($connotes as $connote)
                            <option value="{{ $connote->id }}">{{ $connote->connote }}</option>
                            @endforeach

                        </select>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class='input-group'>
                                    <input type='datetime-local' name="track_time" class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="status_eng" id="status_eng">
                                    <option value="" selected disabled>Track Status</option>
                                    @foreach($track_status as $status)
                                    <option value="{{ $status->status }}">{{ $status->status }}</option>
                                    @endforeach

                                </select>


                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6 mt-3" id="form-custom" style="display: none;">
                                <input type='text' id="form-custom2" placeholder="Status Custom" name=""
                                    class="form-control" />
                            </div>
                        </div>
                        <br>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary"><b>SUBMIT</b></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


</div>
@endsection

@push('script')
<script>
    $('#status_eng').on('change',function(e){
        $('#status_eng').attr('name',"status_eng")
            $('#form-custom').hide()
            $('#form-custom2').attr('name', "")
            if(e.target.value == 'Custom'){
                $('#status_eng').attr('name',"")
                $('#form-custom').show()
                $('#form-custom2').attr('name', "status_eng")
            }
    })
</script>
@endpush