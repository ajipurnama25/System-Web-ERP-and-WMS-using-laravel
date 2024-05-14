@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('modules') }}</h1>
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
                        List of modules
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    @can('create modules')
                        <a href="{{ route('permissions.create') }}" class="btn btn-success"><i
                                class="fa fa-plus-circle nav-icon"></i>
                            Module</a>
                    @endcan
                </div>
                <div class="col-lg-6">
                    &nbsp;
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="padding: 1.3em">
                        <div class="card-body p-0">
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
                                        <th>Action</th>
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
                                                                @foreach ($permissions as $p)
                                                                @if ($p->name == $v.' '. $md->name)
                                                                    checked
                                                                @endif @endforeach
                                                            disabled>
                                                            <!--label class="form-check-label">{{ ucwords($v . ' ' . $md->name) }}</label-->
                                                        </div>
                                                    </div>
                                                </td>
                                            @endforeach
                                            <td>
                                                @can('edit modules')
                                                    <a class="btn btn-primary btn-flat"
                                                        href="{{ route('permissions.edit', $md->id) }}" title="Edit Module"><i
                                                            class="far fa-edit"></i></a>
                                                @endcan

                                                @can('delete modules')
                                                    <!-- Button trigger modal -->
                                                    <a class="btn btn-danger btn-flat" href="#" title="Delete Module"
                                                        data-toggle="modal" data-target="#hapusData{{ $md->id }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="hapusData{{ $md->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="hapusData{{ $md->id }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="hapusData{{ $md->id }}Label">Delete
                                                                        Confirmation
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure wanna delete this
                                                                    {{ ucwords($md->name) }} Module's?
                                                                    it's cannot be revert!
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>

                                                                    <form action="{{ route('permissions.destroy', $md->id) }}"
                                                                        method="Post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-flat"
                                                                            title="Delete Module">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Modal -->
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $modules->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
