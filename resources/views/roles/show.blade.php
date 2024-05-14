@extends('layouts.app')

@section('content')
    <!-- content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Roles') }}</h1>
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
                        Detail of Role
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="pull-right">
                        <a class="btn btn-secondary" href="{{ route('roles.index') }}"><i class="fas fa-chevron-left"></i>
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
                                <dt class="col-sm-3">Role Name:</dt>
                                <dd class="col-sm-9">{{ ucwords($role->name) }}</dd>
                                <dt class="col-sm-3">Created:</dt>
                                <dd class="col-sm-9">{{ $role->created_at }} WIB</dd>
                            </dl>
                            <hr />
                            <h5>Permissions</h5>
                            @php
                                $optArray = Config::get('aplikasi.optperms');
                            @endphp
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Modules</th>
                                        @foreach ($optArray as $k => $v)
                                            <th>{{ ucwords($v) }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($modules as $md)
                                        <tr>
                                            <td>{{ ucwords($md->name) }}</td>
                                            @foreach ($optArray as $k => $v)
                                                <td>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input name="permission[]" value="{{ $v . ' ' . $md->name }}"
                                                                class="form-check-input" type="checkbox"
                                                                @foreach ($getroleperms as $p)
                                                                @if ($p->name == $v.' '. $md->name)
                                                                    checked
                                                                @endif @endforeach
                                                            disabled>
                                                            <!--label class="form-check-label">{{ ucwords($v . ' ' . $md->name) }}</label-->
                                                        </div>
                                                    </div>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
