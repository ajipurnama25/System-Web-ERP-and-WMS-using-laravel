@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Departments') }}</h1>
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
                        List of Departments
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    @can('create sites')
                        <a href="{{ route('departments.create') }}" class="btn btn-success"><i
                                class="fa fa-plus-circle nav-icon"></i>
                            Department</a>
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
                                        {{-- <th>ID</th> --}}
                                        <th>Departments code</th>
                                        <th>Departments Name </th>
                                        {{-- <th>Description</th> --}}
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $department)
                                        <tr>
                                            {{-- <td>{{$department->id}}</td> --}}
                                            <td>{{ strtoupper($department->dept) }}</td>
                                            <td>{{ ucwords($department->dept_name) }}</td>
                                            {{-- <td>{{ ucwords($department->description) }}</td> --}}
                                            {{-- <td>{{ $department->status }}</td> --}}

                                            <td>
                                                @php
                                                    $statusText = [
                                                        0 => 'Non Active',
                                                        1 => 'Active',
                                                    ];
                                                    
                                                @endphp
                                                {{ $statusText[$department->status] }}

                                            </td>

                                            <td>
                                                @can('edit sites')
                                                    <a class="btn btn-primary btn-flat"
                                                        href="{{ route('departments.edit', $department->dept) }}"
                                                        title="Edit Site"><i class="far fa-edit"></i></a>
                                                @endcan
                                                @can('show sites')
                                                    <a class="btn btn-secondary btn-flat"
                                                        href="{{ route('departments.show', $department->dept) }}"
                                                        title="Site Detail"><i class="far fa-eye"></i></a>
                                                @endcan
                                                @can('delete sites')
                                                    <!-- Button trigger modal -->
                                                    {{-- <a class="btn btn-info far fa-edit"
                                                    href="ROApproved/{{ $ap->doc_ro }}/show "title="Approved"></a> --}}

                                                    <a class="btn btn-danger btn-flat" href="#" title="Delete Site"
                                                        data-toggle="modal" data-target="#hapusData{{ $department->dept}}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="hapusData{{ $department->dept }}" tabindex="-1"
                                                        Site="dialog" aria-labelledby="hapusData{{ $department->dept }}Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="hapusData{{ $department->dept }}Label">Delete
                                                                        Confirmation
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure wanna delete this
                                                                    {{ ucwords($department->dept_name) }} Department's?
                                                                    it's cannot be revert!
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>

                                                                    <form
                                                                        action="{{ route('departments.destroy', $department->dept) }}"
                                                                        method="post">
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
                            {{ $departments->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection




{{-- @can('delete sites')
<!-- Button trigger modal -->
<a class="btn btn-danger btn-flat" href="#" title="Delete Site"
    data-toggle="modal" data-target="#hapusData{{ $department->dept }}">
    <i class="far fa-trash-alt"></i>
</a>
<!-- Modal -->
<div class="modal fade" id="hapusData{{ $department->dept }}" tabindex="-1"
    Site="dialog" aria-labelledby="hapusData{{ $department->dept }}Label"
    aria-hidden="true">
    <div class="modal-dialog" Site="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="hapusData{{ $department->dept }}Label">Delete
                    Confirmation
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure wanna delete this {{ ucwords($department->dept_name) }} Department's?
                it's cannot be revert!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Cancel</button>

                <form action="{{ route('departments.destroy', $department->dept) }}"
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
@endcan --}}
