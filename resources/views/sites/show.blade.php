@extends('layouts.app')

@section('content')
    <!-- content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Sites') }}</h1>
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
                        Detail of Site
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="pull-right">
                        <a class="btn btn-secondary" href="{{ route('sites.index') }}"><i class="fas fa-chevron-left"></i>
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
                                <dt class="col-sm-3">Site Code:</dt>
                                <dd class="col-sm-9">{{ strtoupper($site->kode) }}</dd>
                                <dt class="col-sm-3">Site Name:</dt>
                                <dd class="col-sm-9">{{ ucwords($site->name) }}</dd>
                                <dt class="col-sm-3">Site Description:</dt>
                                <dd class="col-sm-9">{{ ucwords($site->description) }}</dd>
                                <dt class="col-sm-3">Created:</dt>
                                <dd class="col-sm-9">{{ $site->created_at }} WIB</dd>
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
