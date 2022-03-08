@extends('layouts.admin.master')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Dashboard</h5>
                </div>
            </div>
            <!--end::Info-->
        </div>
    </div>

    <style>
        .margin-bottom-10 {
            margin-bottom: 10px;
        }

        .widget-blue {
            background-color: #2f81d6;
            color: #fff;
        }

        .widget {
            padding: 15px;
            border-radius: 5px;
            transition: all .2s ease;
            box-shadow: 0px 3px 8px 0px grey;
            margin-bottom: 15px;

        }

        .widget .icon i {
            font-size: 5em !important;
            margin: 12px 0;
            color: #fff;
        }

        .widget .body {
            text-align: right;
        }

        .widget .body .text,
        .widget .body h4 {
            font-family: Lato, sans-serif;
            font-weight: 300;
        }

        .widget .body h4 {
            color: #fff;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .widget .body .text {
            font-size: 32px;
        }
    </style>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>dashboard</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

@endsection

@section('js')

@endsection