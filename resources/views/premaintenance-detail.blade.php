@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/pages/premaintenance-detail.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 300px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;">
                            Prevent Maintenance ->
                            DETAIL </a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <div class="row">
                            @if(count($errors) > 0)
                                <div class="col-md-12" style="padding-left: 50px;margin-top:20px;">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="row">
                                                <div class="alert alert-danger">
                                                    <button class="close" data-close="alert"></button>
                                                    You have some form errors. Please check below.
                                                    <span data-notify="message" style="margin-top:5px;">
                                        @foreach($errors->all() as $error)
                                                            <li><strong> {{$error}} </strong></li>
                                                        @endforeach </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <input type="hidden" name="id" value="{{$premaintenance->id}}">
                            <div class="col-md-12" style="padding-left: 50px;margin-top:30px;">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold"
                                                       style="margin-top:7px;">Type</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" value="{{$premaintenance->type->name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold"
                                                       style="margin-top:7px;">Brand</label>
                                                <div class="col-md-8">
                                                     <input type="text" class="form-control" value="{{$premaintenance->brand->name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold"
                                                       style="margin-top:7px;">Model</label>
                                                <div class="col-md-8">
                                                     <input type="text" class="form-control" value="{{$premaintenance->model->name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Registration
                                                    No</label>
                                                <div class="col-md-8">
                                                    <input name="reg_no" type="text" class="form-control"
                                                           value="{{$premaintenance->reg_no}}"
                                                           placeholder="Registration No">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Service
                                                    Type</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="service_type"
                                                           value="{{ $premaintenance->service_type }}"
                                                           placeholder="Service Type">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Service
                                                    Unit</label>
                                                <div class="col-md-8">
                                                    <div class="radio-list" style=" margin-top: 8px;">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="service_unit"
                                                                   value="km" {{$premaintenance->service_unit == 'km' ? 'checked' : '' }}>
                                                            Km </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="service_unit"
                                                                   value="hour" {{$premaintenance->service_unit == 'hour' ? 'checked' : '' }}>
                                                            Hours </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="service_unit"
                                                                   value="date" {{ $premaintenance->service_unit == 'date' ? 'checked' : '' }}>
                                                            Date </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Routine
                                                    Service</label>
                                                <div class="col-md-6">
                                                    <input type="number" name="routine_service" class="form-control"
                                                           placeholder="Routine Service"
                                                           value="{{$premaintenance->routine_service }}">
                                                </div>
                                                <label class="control-label service-unit-label col-md-3 bold uppercase"
                                                       style="margin-top:7px;">{{  $premaintenance->service_unit }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Current</label>
                                                <div class="col-md-6">
                                                    <input name="current" type="number" class="form-control"
                                                           value="{{ $premaintenance->current }}"
                                                           placeholder="Current">
                                                </div>
                                                <label class="control-label service-unit-label col-md-2 bold uppercase"
                                                       style="margin-top:7px;">{{ $premaintenance->service_unit }}</label>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Last
                                                    Service Date</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" value="{{$premaintenance->last_service_date}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="action-toolbar">
                            <a class="btn btn-sm dark"
                               style="width: 100px;border-radius:5px !important; margin-right: 15px;"
                               href="{{ route('premaintenance') }}">DISCARD</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js' )}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/scripts/pages/premaintenance-add.js') }}" type="text/javascript"></script>
@endsection
