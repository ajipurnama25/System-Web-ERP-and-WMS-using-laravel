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
                        Add New Department
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
                            <form action="{{ route('departments.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="dept"><strong>Department Code:</strong></label>
                                            <input type="text" name="dept" class="form-control"
                                                placeholder="Department Code." autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="dept_name"><strong>Department Name:</strong></label>
                                            <input type="text" name="dept_name" class="form-control"
                                                placeholder="Department Name.">
                                        </div>
                                        <div class="form-group">
                                            <label for="status"><strong>Status:</strong></label>
                                            <input type="text" name="status" class="form-control"
                                                placeholder="0 = non active, 1 = active.">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                                </div>
                            </form>
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
