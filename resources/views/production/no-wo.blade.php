@extends('layouts.app')
@section('content')
    <!-- content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">{{ __('Pengepakan FG ke Pallet') }}</h1>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" align=center>
                            <br><br><br>
                            Belum ada tugas kerja (Work Order) untuk hari ini.
                            <br><br>
                            Mohon sampaikan hal ini ke tim PPIC agar dapat dibuatkan Work Order.
                            <br><br><br><br>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.end content -->
@endsection
