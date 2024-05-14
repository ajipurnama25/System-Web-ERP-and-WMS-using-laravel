@extends('layouts.app')

@section('content')
    <!-- content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Daftar Customer') }}</h1>
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
                        Edit Customer
                    </div>
                </div>
            </div>
            @foreach ($customer as $c)
            @endforeach
            <div class="row">
                <div class="col-lg-6">
                    <div class="pull-right">
                        <a class="btn btn-secondary" href="{{ route('customer.index') }}"><i class="fas fa-chevron-left"></i>
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
                            <form action="{{ route('customer.update', $c->code) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- @method('PUT') --}}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Kode:</strong>
                                            <input type="text" name="code" value="{{ $c->code }}"
                                                class="form-control" placeholder="Site Code" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            <input type="text" name="nama" value="{{ $c->nama }}"
                                                class="form-control" placeholder="Site name">
                                        </div>
                                        <div class="form-group">
                                            <strong>Alamat:</strong>
                                            <input type="text" name="address" value="{{ $c->address }}"
                                                class="form-control" placeholder="address">
                                        </div>
                                        <div class="form-group">
                                            <strong>Contact Person:</strong>
                                            <input type="text" name="contact_person" value="{{ $c->contact_person }}"
                                                class="form-control" placeholder="contact_person">
                                        </div>
                                        <div class="form-group">
                                            <strong>NPWP:</strong>
                                            <input type="text" name="npwp" value="{{ $c->npwp }}"
                                                class="form-control" placeholder="npwp">
                                        </div>

                                        <div class="form-group">
                                            <label for="name"><strong>PIC Ceo/Phone/Email/Bday:</strong></label>

                                            <div class="form-floating">
                                                <input type="text" name="ceo" placeholder="ceo" value="{{$c->ceo}}"> / 
                                                <input type="text" name="c_phone" placeholder="phone" value="{{$c->c_phone}}"> / 
                                                <input type="text" name="c_email"   placeholder="email" value="{{$c->c_email}}"> / 
                                                <input type="date" name="bday" placeholder="hh/bb/tttt" value="{{$c->bday}}">
                                                {{-- <label for="floatingInputGrid">Email address</label> --}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name"><strong>PIC Purchasing/Phone/Email:</strong></label>

                                            <div class="form-floating">
                                                <input type="text" name="purc" placeholder="Purchasing name" value="{{$c->purc}}"> / 
                                                <input type="text" name="p_phone" placeholder="Purchasing phone" value="{{$c->p_phone}}"> / 
                                                <input type="text" name="p_email" placeholder="Purchasing email" value="{{$c->p_email}}"> 
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="name"><strong>PIC Finance/Phone/Email:</strong></label>

                                            <div class="form-floating">
                                                <input type="text" name="fin" placeholder="Finance name" value="{{$c->fin}}"> / 
                                                <input type="phone" name="f_phone" placeholder="Finance phone" value="{{$c->f_phone}}"> / 
                                                <input type="email" name="f_email" placeholder="Finance email" value="{{$c->f_email}}"> 
                                            </div>
                                        </div>



                                        <button type="submit" class="btn btn-primary ml-3">Save</button>
                                    </div>
                            </form>
                        </div>
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
