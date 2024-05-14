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
                        Edit Site
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
                            <form action="{{ route('sites.update', $site->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Site Code:</strong>
                                            <input type="text" name="kode" value="{{ $site->kode }}"
                                                class="form-control" placeholder="Site Code" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <strong>Site Name:</strong>
                                            <input type="text" name="name" value="{{ $site->name }}"
                                                class="form-control" placeholder="Site name">
                                        </div>
                                        <div class="form-group">
                                            <strong>Site Description:</strong>
                                            <input type="text" name="description" value="{{ $site->description }}"
                                                class="form-control" placeholder="Site Description">
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
