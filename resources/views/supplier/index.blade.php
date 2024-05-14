@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        {{-- <a class="btn btn-success bi-plus-circle" href="supplier/create" > Supplier</a><br> --}}
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Supplier') }}</h1>
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
                        List of Suppliers
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <a href="supplier/create" class="btn btn-success"><i class="fa fa-plus-circle nav-icon"></i>
                        Supplier</a>
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
                                        <th>KODE</th>
                                        <th>Name</th>
                                        <th>Alamat</th>
                                        <th>CONTACT PERSON</th>
                                        <th>NPWP</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supplier as $s)
                                        <tr>
                                            <td>{{ $s->code }}</td>
                                            <td>{{ $s->nama }}</td>
                                            <td>{{ $s->address }}</td>
                                            <td>{{ $s->contact_person }}</td>
                                            <td>{{ $s->npwp }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a class="btn btn-info far fa-edit"
                                                        href="/supplier/{{ $s->code }}/edit "title="Edit User"></a>
                                                        

                                                    <a class="btn btn-secondary far fa-eye "
                                                        href="/supplier/{{ $s->code }}/view" title="User Detail"></a>
                                                    <form action="/supplier/{{ $s->code }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        

                                                        <input class="btn btn-danger fa-trash-alt" title="User delete "type="submit"   
                                                            value="delete" >

                                                    </form>
                                                     {{-- <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="hapusData{{ $s->code }}Label">Delete
                                                                    Confirmation
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div> --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
    <!-- /.content -->
@endsection
