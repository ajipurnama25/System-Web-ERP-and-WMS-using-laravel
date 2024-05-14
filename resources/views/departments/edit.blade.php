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
                        Edit Department
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
                            <form action="{{ route('departments.update', $department->dept) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Department Code:</strong>
                                            <input type="text" name="dept" value="{{ $department->dept }}"
                                                class="form-control" placeholder="Department Code" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <strong>Department Name:</strong>
                                            <input type="text" name="dept_name" value="{{ $department->dept_name }}"
                                                class="form-control" placeholder="Department name">
                                        </div>
                                        <div class="form-group">
                                            <strong>Status:</strong>
                                            <input type="text" name="status" value="{{ $department->status }}"
                                                class="form-control" placeholder="Status">
                                        </div>
                                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
                                    </div>
                            </form>
                        </div>
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
    <!-- /.end content -->
@endsection
