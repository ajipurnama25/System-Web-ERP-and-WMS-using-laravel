@extends('layouts.app')

@section('content')
    <!-- content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Departments') }}</h1>
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
                        Detail of Department
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="pull-right">
                        <a class="btn btn-secondary" href="{{ route('departments.index') }}"><i class="fas fa-chevron-left"></i>
                            Back</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    &nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="padding: 1.3em">
                        <div class="card-body p-0">
                            <dl class="row">
                                <dt class="col-sm-3">Department Code:</dt>
                                <dd class="col-sm-9">{{ strtoupper($department->dept) }}</dd>
                                <dt class="col-sm-3">Department Name :</dt>
                                <dd class="col-sm-9">{{ ucwords($department->dept_name) }}</dd>
                                <dt class="col-sm-3">Department Status:</dt>
                                {{-- <dd class="col-sm-9">{{ ucwords($department->status) }}</dd> --}}
                                {{-- <dt class="col-sm-3">Created:</dt>
                                <dd class="col-sm-9">{{ $department->created_at }} WIB</dd> --}}
                                <td>
                                    @php
                                        $statusText = [
                                            0 => 'Non Active',
                                            1 => 'Active',                                                      
                                        ];
                                 
                                    @endphp
                                    {{ $statusText[$department->status] }}
                                    
                                </td>
                            </dl>
                            <!-- /.card-body -->

                            <div class="card-footer clearfix">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.end content -->
@endsection
