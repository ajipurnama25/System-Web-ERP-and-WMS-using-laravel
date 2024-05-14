@extends('layouts.app')

@section('title', 'Labelling Good Stock')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Labelling Good Stock') }}</h1>
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
                        List of Labelling Good Stock
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    @can('create po')
                        <a href="{{ route('label.create') }}" class="btn btn-success">
                            <i class="fa fa-plus-circle nav-icon"></i> &nbsp;New Record
                        </a>
                    @endcan
                </div>
                <div class="col-sm-8">
                    &nbsp;
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="padding: 1.3em">
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>PID</th>
                                        <th>Rack Number</th>
                                        <th>SKU</th>
                                        <th>Batch Number</th>
                                        <th>Exp. Date</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

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
