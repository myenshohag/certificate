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
                    <div class="card-body">
                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                            <thead>
                                <tr>
                                    <th style="color: black !important">Roll</th>
                                    <th style="color: black !important">Registration</th>
                                    <th style="color: black !important">Session</th>
                                    <th style="color: black !important">Type</th>
                                    <th style="color: black !important">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{$student->roll ?? ''}}</td>
                                    <td>{{$student->registration ?? ''}}</td>
                                    <td>{{$student->session ?? ''}}</td>
                                    <td>{{$student->type ?? ''}}</td>
                                    <td>
                                        <a href="#" class="btn btn-xs btn-info font-weight-bold mr-2"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="{{route('delete.student', $student->id)}}" id="delete"
                                            class="btn btn-xs btn-danger font-weight-bold mr-2"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{asset('/backend')}}/assets/js/pages/crud/datatables/basic/basic.js"></script>
<script src="{{asset('/backend')}}/assets/js/pages/crud/datatables/basic/header.js"></script>
<script src="{{asset('/backend')}}/assets/js/pages/crud/datatables/basic/pagination.js"></script>
<script src="{{asset('/backend')}}/assets/js/pages/crud/datatables/basic/scrollable.js"></script>
<script>
    $(document).ready( function {
	 $('#kt_datatable').dataTable({
        "paginate": true,
	    "sort": true,
	    "search": true,

     });
    });

</script>
@endsection