@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        {{-- <a class="btn btn-success bi-plus-circle" href="supplier/create" > Supplier</a><br> --}}
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Customer') }}</h1>
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
                        List of Customer
                    </div>
                </div>
            </div>

      
            

            <div>
                <select tabel class="form-select" aria-label="Default select example">
        <option  value="supplier/create" >  Induk Perusahaan</option>
        <option  value="" >  <a href="customer/create" class="btn btn-success"><i class="fa fa-plus-circle nav-icon"></i>
            Customer</a>Induk anak </option>
          

                </select>

            </div> <br>

            {{-- <div>
                <select tabel class="form-select" aria-label="Default select example">
                    <a href="supplier/create" class="btn btn-success"> <option  selected>Open this select menu</option> Open this select menu</a>
                    <option  value="" >  <a href="supplier/create" class="btn btn-success">Induk Perusahaan</a></option>
                    
                    <option  href="1" >  <a href="supplier/create" class="btn btn-success"> </a>Induk Perusahaan</option>  
                    <option value="2" href="supplier/create" class="btn btn-success">Anak Perusahaan</option>

                </select> --}}

            {{-- </div> <br> --}}


            <div class="row">
                <div class="col-lg-6">
                    <a href="customer/create" class="btn btn-success"><i class="fa fa-plus-circle nav-icon"></i>
                        Customer</a>
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
                                    @foreach ($customer as $c)
                                        <tr>
                                            <td>{{ $c->code }}</td>
                                            <td>{{ $c->nama }}</td>
                                            <td>{{ $c->address }}</td>
                                            <td>{{ $c->contact_person }}</td>
                                            <td>{{ $c->npwp }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a class="btn btn-info far fa-edit"
                                                        href="/customer/{{ $c->code }}/edit "title="Edit User"></a>


                                                    <a class="btn btn-secondary far fa-eye "
                                                        href="/customer/{{ $c->code }}/view" title="User Detail"></a>
                                                    <form action="/supplier/{{ $c->code }}" method="POST">
                                                        @csrf
                                                        @method('delete')


                                                        <input class="btn btn-danger fa-trash-alt"
                                                            title="User delete "type="submit" value="delete">

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
