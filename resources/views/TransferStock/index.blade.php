@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Transfer Stock') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        List of Request Transfer Stock
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                        <a href="{{ route('requestStock.create') }}" class="btn btn-success">
                            <i class="fa fa-plus-circle nav-icon"></i> &nbsp;New Request
                        </a>
                </div>
                <div class="col-sm-8">
                    &nbsp;
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="padding: 1.3em">
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Doc Trf</th>
                                        <th>Serv Site</th>
                                        <th>Status</th>
                                        <th>Req Date</th>
                                        <th>Req Site</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tr_stock as $key => $value)
                                        <tr>
                                            <td>{{ $value->doc_trf }}</td>
                                            <td>{{ $value->m2 }}</td>
                                            <td>
                                                @if($value->status == 1)
                                                    <button class="btn btn-info btn-sm" disabled>Waiting for Approval</button>
                                                @elseif($value->status == 2)
                                                    <button class="btn btn-success btn-sm" disabled>Approved</button>
                                                @elseif($value->status == 3)
                                                    <button class="btn btn-warning btn-sm" disabled>Receiving</button>
                                                @elseif($value->status == 4)
                                                    <button class="btn btn-primary btn-sm" disabled>Received</button>
                                                @else
                                                    <button class="btn btn-danger btn-sm" disabled>Rejected</button>
                                                @endif
                                                </td>
                                            <td>{{ date('d M Y', strtotime($value->req_date)) }}</td>
                                            <td>{{ $value->m1 }}</td>
                                            <td>
                                                <a href="{{ route('requestStock.view', ['doc_trf' => $value->doc_trf]) }}" class="btn btn-outline-info ">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
