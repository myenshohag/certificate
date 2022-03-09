@extends('layouts.admin.master')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-2">
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">New Student</h5>
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
                    <form class="form" action="{{route('student.store')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label for="">roll</label>
                                    <input type="roll" name="roll" placeholder="student roll" class="form-control"
                                        value="{{$student->roll ?? ''}}" roll="roll" value="">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">registration</label>
                                    <input type="registration" placeholder="student registration" class="form-control"
                                        value="{{$student->registration ?? ''}}" name="registration" value="">
                                </div>
                                <div class="col-lg-3">
                                    <label for="">session</label>
                                    <select name="session" class="form-control" id="">
                                        <option value="" disabled>Select Session</option>
                                        <option value="2019-2020">2019-2020</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label for="">Type</label>
                                    <select name="type" class="form-control" id="">
                                        <option value="" disabled>Select Student type</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Irregular">Irregular</option>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <label for="">Testimonial text</label>
                                    <textarea class="form-control" name="testimonial_text" id="" cols="30"
                                        rows="10">{{$settings->testimonial_text ?? ''}}</textarea>
                                </div>
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