@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Users') }}</h1>
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
                        List of Users
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <a href="{{-- route('users.create') --}}" class="btn btn-success"><i class="fa fa-plus-circle nav-icon"></i>
                        User</a>
                </div>
                <div class="col-lg-6">
                    &nbsp;
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role(s)</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->nik }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @php
                                                    $roles = $user->getRoleNames();
                                                @endphp
                                                @foreach ($roles as $role)
                                                    {{ ucwords($role) }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @can('edit users')
                                                    <a class="btn btn-primary btn-flat"
                                                        href="{{ route('users.edit', $user->id) }}" title="Edit User"><i
                                                            class="far fa-edit"></i></a>
                                                @endcan
                                                @can('show users')
                                                    <a class="btn btn-secondary btn-flat"
                                                        href="{{ route('users.show', $user->id) }}" title="User Detail"><i
                                                            class="far fa-eye"></i></a>
                                                @endcan
                                                @can('delete users')
                                                    <!-- Button trigger modal -->
                                                    <a class="btn btn-danger btn-flat" href="#" title="Delete User"
                                                        data-toggle="modal" data-target="#hapusData{{ $user->id }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="hapusData{{ $user->id }}" tabindex="-1"
                                                        User="dialog" aria-labelledby="hapusData{{ $user->id }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" User="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="hapusData{{ $user->id }}Label">Delete
                                                                        Confirmation
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure wanna delete this {{ ucwords($user->name) }}
                                                                    User's?
                                                                    it's cannot be revert!
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>

                                                                    <form action="{{ route('users.destroy', $user->id) }}"
                                                                        method="Post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-flat"
                                                                            title="Delete User">Delete</button>
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
                            {{ $users->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
