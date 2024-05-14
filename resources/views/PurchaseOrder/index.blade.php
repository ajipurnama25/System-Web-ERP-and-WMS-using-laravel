@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Roles') }}</h1>
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
                        List of Purchase Order
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    @can('create po')
                        <a href="{{ route('po.create') }}" class="btn btn-success">
                            <i class="fa fa-plus-circle nav-icon"></i> &nbsp;New PO
                        </a>
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
                                        <th>PO No.</th>
                                        <th>PO Date</th>
                                        <th>Total Amount</th>
                                        <th>TOP</th>
                                        <th>PR No.</th>
                                        <th>Supplier</th>
                                        <th>Site</th>
                                        <th>Delivery Date</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($t_po as $t_pos)
                                        <tr>
                                            <td>{{ $t_pos->po_no }}</td>
                                            <td>{{ $t_pos->po_date }}</td>
                                            <td>{{ $t_pos->po_amt }}</td>
                                            <td>{{ $t_pos->top }}</td>
                                            <td>{{ $t_pos->pr_no }}</td>
                                            <td>{{ $t_pos->supplier }}</td>
                                            <td>{{ $t_pos->site }}</td>
                                            <td>{{ $t_pos->delv_date }}</td>
                                            <td>{{ $t_pos->created_at }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $t_po->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
