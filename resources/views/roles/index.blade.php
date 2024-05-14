@extends('layouts.app')

@section('content')
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
                        List of Roles
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    @can('create roles')
                        <a href="{{ route('roles.create') }}" class="btn btn-success"><i class="fa fa-plus-circle nav-icon"></i>
                            Role</a>
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
                                        <th>Name</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ ucwords($role->name) }}</td>
                                            <td>{{ $role->created_at }} WIB</td>
                                            <td>
                                                @can('edit roles')
                                                    <a class="btn btn-primary btn-flat"
                                                        href="{{ route('roles.edit', $role->id) }}" title="Edit Role"><i
                                                            class="far fa-edit"></i></a>
                                                @endcan
                                                @can('show roles')
                                                    <a class="btn btn-secondary btn-flat"
                                                        href="{{ route('roles.show', $role->id) }}" title="Role Detail"><i
                                                            class="far fa-eye"></i></a>
                                                @endcan
                                                <!--
                                                @can('edit roles')
                                                    <a class="btn btn-warning btn-flat" href="{{-- route('roles.show',$role->id) --}}"
                                                        title="Role Access Permissions"><i class="fa fa-lock"
                                                            aria-hidden="true"></i></a>
                                                @endcan
                                                -->
                                                @can('delete roles')
                                                    <!-- Button trigger modal -->
                                                    <a class="btn btn-danger btn-flat" href="#" title="Delete Role"
                                                        data-toggle="modal" data-target="#hapusData{{ $role->id }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="hapusData{{ $role->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="hapusData{{ $role->id }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="hapusData{{ $role->id }}Label">Delete
                                                                        Confirmation
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure wanna delete this {{ ucwords($role->name) }} Role's?
                                                                    it's cannot be revert!
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>

                                                                    <form action="{{ route('roles.destroy', $role->id) }}"
                                                                        method="Post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-flat"
                                                                            title="Delete Role">Delete</button>
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
                            {{ $roles->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
