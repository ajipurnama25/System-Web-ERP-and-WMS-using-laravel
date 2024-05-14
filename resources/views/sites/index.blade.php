@extends('layouts.app')

@section('content')
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
                        List of Sites
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    @can('create sites')
                        <a href="{{ route('sites.create') }}" class="btn btn-success"><i class="fa fa-plus-circle nav-icon"></i>
                            Site</a>
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
                                        <th>ID</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sites as $site)
                                        <tr>
                                            <td>{{$site->id}}</td>
                                            <td>{{strtoupper($site->kode)}}</td>
                                            <td>{{ ucwords($site->name) }}</td>
                                            <td>{{ ucwords($site->description) }}</td>
                                            <td>{{ $site->created_at }} WIB</td>
                                            <td>
                                                @can('edit sites')
                                                    <a class="btn btn-primary btn-flat"
                                                        href="{{ route('sites.edit', $site->id) }}" title="Edit Site"><i
                                                            class="far fa-edit"></i></a>
                                                @endcan
                                                @can('show sites')
                                                    <a class="btn btn-secondary btn-flat"
                                                        href="{{ route('sites.show', $site->id) }}" title="Site Detail"><i
                                                            class="far fa-eye"></i></a>
                                                @endcan
                                                @can('delete sites')
                                                    <!-- Button trigger modal -->
                                                    <a class="btn btn-danger btn-flat" href="#" title="Delete Site"
                                                        data-toggle="modal" data-target="#hapusData{{ $site->id }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="hapusData{{ $site->id }}" tabindex="-1"
                                                        Site="dialog" aria-labelledby="hapusData{{ $site->id }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" Site="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="hapusData{{ $site->id }}Label">Delete
                                                                        Confirmation
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure wanna delete this {{ ucwords($site->name) }} Site's?
                                                                    it's cannot be revert!
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>

                                                                    <form action="{{ route('sites.destroy', $site->id) }}"
                                                                        method="Post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-flat"
                                                                            title="Delete Site">Delete</button>
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
                            {{ $sites->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
