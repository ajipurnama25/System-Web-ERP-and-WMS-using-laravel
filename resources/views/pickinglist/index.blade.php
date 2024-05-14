@extends('layouts.app')

@section('title', 'Input Nomer Pallet')

@section('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <style>
        #form-gr {
            display: none;
        }

        .table td {
            vertical-align: top;
        }

        .table td div {
            padding-top: 7px;
        }
    </style>
@endsection



@section('content')
    <!-- content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0">Penerimaan Inbound</h1>
                </div><!-- /.col -->
                <div align=right class="col-sm-4">
                    @can('create po')
                        <a href="{{ route('production.init-add') }}" class="btn btn-secondary">
                            <i class="fa fa-chevron-left nav-icon"></i> &nbsp; Kembali ke Pengepakan FG Pallet
                        </a>
                    @endcan
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="padding: 1.3em">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-8">
                                    <div class="form-group">

                                      
                                         
                                        <form id="pallet" action="{{ route('pickinglist.view') }}" method="GET">
                                            @csrf
                                        <div class="form-group">
                                            <label for="name"><strong>Nomor Pallet:</strong></label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="" name="pallet"
                                                    id="pallet" required> <br>

                                                
                                                    <div align= left class="col-sm-4"> 
                                                        <button type="submit" class="btn btn-sm btn-primary"
                                                            id="btn-pallet">Klik di
                                                            sini<br>- atau -<br>tekan <b>Enter</b></button>
                                                    </div>
                                            </div>

                                        </form>
                                            {{-- sampai disini --}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection





