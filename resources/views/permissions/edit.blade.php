@extends('layouts.app')

@section('content')
    <!-- content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Permissions of Module') }}</h1>
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
                        Edit Permission of Module
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="pull-right">
                        <a class="btn btn-secondary" href="{{ route('permissions.index') }}"><i
                                class="fas fa-chevron-left"></i> Back</a>
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
                            <form action="{{ route('permissions.update', $permission->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Module Name:</strong>
                                            <input type="text" name="name" value="{{ $modules->name }}"
                                                class="form-control" placeholder="Module name">
                                        </div>
                                        <div class="form-group">
                                            <strong>Module Description:</strong>
                                            <input type="text" name="description" value="{{ $modules->description }}"
                                                class="form-control" placeholder="Module description    ">
                                        </div>
                                        <div class="form-group">
                                            <label for="permission"><strong>Permissions:</strong></label>
                                            @php
                                                $optArray = Config::get('aplikasi.optperms');
                                            @endphp
                                            @foreach ($optArray as $k => $v)
                                                <div class="form-check">
                                                    <input name="permission[]" value="{{$v}}" class="form-check-input"
                                                        type="checkbox"
                                                        @foreach ($permsmodule as $pm)
                                                        @php
                                                            $opt=explode(' ',$pm->name)
                                                        @endphp
                                                            @if($opt[0] == $v)
                                                            checked
                                                            @endif
                                                        @endforeach
                                                        >
                                                    <label class="form-check-label">{{ucwords($v)}}</label>

                                                </div>
                                            @endforeach
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
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.end content -->
@endsection
