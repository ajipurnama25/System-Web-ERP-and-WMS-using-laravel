@extends('layouts.app')

@section('title', 'Good Receiving')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="m-0">Daftar Penerimaan Raw Material dari Supplier</h1>
                </div><!-- /.col -->
                <div align=right class="col-sm-4">
                    @can('create po')
                        <a href="{{ route('gr.create') }}" class="btn btn-success">
                            <i class="fa fa-plus-circle nav-icon"></i> &nbsp; Penerimaan Baru
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
                    <div class="card" !style="padding: 1.3em; font-size: 14px">
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>PO No.</th>
                                        <th>SEQ</th>
                                        <th>QC BY</th>
                                        <th>SJ NO</th>
                                        <th>SJ DATE</th>
                                        <th>Truck No.</th>
                                        <th>Driver</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($t_gr as $t_grs)
                                        <tr>
                                            <td>{{ $t_grs->po_no }}</td>
                                            <td>{{ $t_grs->seq }}</td>
                                            <td>{{ $t_grs->qc_by }}</td>
                                            <td>{{ $t_grs->sj_no }}</td>
                                            <td>{{ $t_grs->sj_date }}</td>
                                            <td>{{ $t_grs->truck_no }}</td>
                                            <td>{{ $t_grs->driver }}</td>
                                            <td>{{ $t_grs->created_at }}</td>
                                            <td style="white-space:nowrap;">
                                                <a class="fa fa-eye" href="{{ route('gr.view', ['po_no' => $t_grs->po_no, 'seq' => $t_grs->seq]) }}" !class="btn btn-outline-info "></a>
                                                <!-- <a href="{{ route('gr.edit', ['po_no' => $t_grs->po_no, 'seq' => $t_grs->seq]) }}" class="btn btn-outline-info ">Ubah</a> -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $t_gr->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
