@extends('layouts.admin.master')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

            <div class="d-flex align-items-center flex-wrap mr-2">
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Footer Settings</h5>

                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200">
                </div>
            </div>

            <div class="d-flex align-items-center">
                <a href="#" class="btn btn-sm btn-light font-weight-bold mr-2" id="kt_dashboard_daterangepicker"
                    data-toggle="tooltip" title="Select dashboard daterange" data-placement="left">
                    <span class="text-muted font-size-base font-weight-bold mr-2"
                        id="kt_dashboard_daterangepicker_title">Today</span>
                    <span class="text-primary font-size-base font-weight-bolder"
                        id="kt_dashboard_daterangepicker_date">Aug 16</span>
                </a>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column-fluid">
        <div class="container">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row">
                <div class="card col-lg-12">
                    <form class="form" action="{{route('rnc.basicSetting.update')}}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">

                                <div class="col-lg-4">
                                    <label for="">email</label>
                                    <input type="email" class="form-control" value="{{$settings->email ?? ''}}"
                                        placeholder="email" name="email" value="">
                                </div>
                                <div class="col-lg-4">
                                    <label for="">phone 1</label>
                                    <input type="text" class="form-control" placeholder="phone 1"
                                        value="{{$settings->phone_1 ??  ''}}" name="phone_1" value="">
                                </div>
                                <div class="col-lg-4">
                                    <label for="">phone 2</label>
                                    <input type="text" class="form-control" placeholder="phone 2"
                                        value="{{$settings->phone_2 ?? ''}}" name="phone_2" value="">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">facebook</label>
                                    <input type="text" class="form-control" placeholder="facebook Link"
                                        value="{{$settings->facebook ?? ''}}" name="facebook" value="">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">twitter</label>
                                    <input type="text" class="form-control" placeholder="twitter Link"
                                        value="{{$settings->twitter ?? ''}}" name="twitter" value="">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">instagram</label>
                                    <input type="text" class="form-control" value="{{$settings->instagram ?? ''}}"
                                        placeholder="instagram Link" name="instagram" value="">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">yotube</label>
                                    <input type="text" class="form-control" placeholder="yotube Link"
                                        value="{{$settings->yotube ?? ''}}" name="yotube" value="">
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Facebook like page</label>
                                    <textarea name="facebook_page" id="" placeholder="facebook page" cols="20"
                                        class="form-control" rows="2">{{$settings->facebook_page ?? ''}}</textarea>
                                    <label for="">Address </label>
                                    <textarea name="address" id="" placeholder="address" cols="20" class="form-control"
                                        rows="2">{{$settings->address ?? ''}}</textarea>
                                </div>

                                <div class="col-lg-6">
                                    <label for="">About Us</label>
                                    <textarea name="about_us" id="" placeholder="about RNC" cols="20"
                                        class="form-control" rows="6">{{$settings->about_us ?? ''}}</textarea>
                                </div>
                                {{-- <div class="col-lg-3">
                                    <label for="">Descrizione Causale</label>
                                    <select class="form-control" required name="casual_description" id="">
                                        <option value="">-select-</option>
                                        <option value="employee">Employee</option>
                                        <option value="employee"> Volunteers</option>
                                        <option value="employee"> Volunteers</option>
                                        <option value="employee"> Volunteers</option>
                                        <option value="employee"> Volunteers</option>
                                    </select>
                                </div> --}}
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection

@section('js')

@endsection