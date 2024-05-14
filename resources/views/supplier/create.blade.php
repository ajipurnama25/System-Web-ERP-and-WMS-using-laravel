@extends('layouts.app')

@section('content')
    <!-- content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Daftar Supplier') }}</h1>
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
                        Add New Supplier
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="pull-right">
                        <a class="btn btn-secondary" href="{{ route('supplier.index') }}"><i
                                class="fas fa-chevron-left"></i>
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
                            <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">

                                        <div class="form-group">
                                            <label for="kode"><strong>Kode:</strong></label>
                                            <input type="text" name="code" class="form-control"
                                                placeholder=" Code. 123. 23MJK, 3M4B." autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="name"><strong> Name:</strong></label>
                                            <input type="text" name="nama" class="form-control"
                                                placeholder="Site Name. ex. Muara Baru, Majalengka, Semarang, Medan.">
                                        </div>

                                        <div class="form-group">
                                            <label for="name"><strong>Alamat:</strong></label>
                                            <input type="text" name="address" class="form-control" placeholder="alamat.">
                                        </div>

                                        <div class="form-group">
                                            <label for="name"><strong>Contact Person:</strong></label>
                                            <input type="text" name="contact_person" class="form-control"
                                                placeholder="Site Description.">
                                        </div>

                                        <div class="form-group">
                                            <label for="name"><strong>NPWP:</strong></label>
                                            <input type="text" name="npwp" class="form-control"
                                                placeholder="Site Description.">
                                        </div>

                                        <div class="form-group">
                                            <label for="name"><strong>PIC Ceo/Phone/Email/Bday:</strong></label>

                                            <div class="form-floating">
                                                <input type="text" name="ceo" placeholder="CEO Name"> / <input type="phone" name="c_phone"
                                                    placeholder="CEO Phone"> / <input type="email" name="c_email"
                                                    placeholder="CEO email"> / <input type="date" name="bday"
                                                    placeholder="hh/bb/tttt">
                                                {{-- <label for="floatingInputGrid">Email address</label> --}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name"><strong>PIC Purchasing/Phone/Email:</strong></label>

                                            <div class="form-floating">
                                                <input type="text" name="purc" placeholder="Purchasing Name"> / <input type="phone" name="p_phone"
                                                    placeholder="Phone Purchasing"> / <input type="email" name="p_email"
                                                    placeholder="Purchasing email"> 
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="name"><strong>PIC Finance/Phone/Email:</strong></label>

                                            <div class="form-floating">
                                                <input type="text" name="fin" placeholder="Finance Name"> / <input type="phone" name="f_phone"
                                                    placeholder="Finance Phone"> / <input type="email" name="f_email"
                                                    placeholder="Finance email"> 
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