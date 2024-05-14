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
                        Add New Site
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
                            <form action="{{ route('sites.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="kode"><strong>Site Code:</strong></label>
                                            <input type="text" name="kode" class="form-control"
                                                placeholder="Site Code. Ex. MJK, MBR, HO, MDN, SMG." autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="name"><strong>Site Name:</strong></label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Site Name. ex. Muara Baru, Majalengka, Semarang, Medan.">
                                        </div>
                                        <div class="form-group">
                                            <label for="name"><strong>Site Description:</strong></label>
                                            <input type="text" name="description" class="form-control"
                                                placeholder="Site Description.">
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
