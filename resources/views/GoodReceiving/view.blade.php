@extends('layouts.app')

@section('title', 'Good Receiving')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0">Penerimaan Raw Material dari Supplier</h1>
                </div><!-- /.col -->
                <div align=right class="col-sm-4">
                    @can('create po')
                        <a href="{{ route('gr.index') }}" class="btn btn-secondary">
                            <i class="fa fa-chevron-left nav-icon"></i> &nbsp; Kembali ke Daftar Penerimaan
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
                        <table><tr valign=bottom><td>
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td width=160>Nomor PO</td>
                                        <td width=8>:</td><td><strong>{{ $t_gr->po_no }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Penerimaan ke</td>
                                        <td>:</td><td><strong>{{ $t_gr->seq }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Surat Jalan</td>
                                        <td>:</td><td><strong>{{ $t_gr->sj_no }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Surat Jalan </td>
                                        <td>:</td><td><strong>{{ date('d M Y', strtotime($t_gr->sj_date)) }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Plat Nomor Truk</td>
                                        <td>:</td><td><strong>{{ $t_gr->truck_no }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Pengendara Truk</td>
                                        <td>:</td><td><strong>{{ $t_gr->driver }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td><td width=64></td><td align=right>
                            <a href="{{ route('gr.edit', ['po_no' => $t_gr->po_no, 'seq' => $t_gr->seq]) }}" class="btn btn-outline-info ">Ubah</a>
                            <br><br><table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td width=112>QC oleh</td>
                                        <td width=8>:</td><td><strong>{{ $t_gr->emp_name }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Dibuat pada</td>
                                        <td>:</td><td><strong>{{ date('d M Y H:i:s', strtotime($t_gr->created_at)) }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Dibuat oleh</td>
                                        <td>:</td><td><strong>{{ $t_gr->created_by }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Diubah pada</td>
                                        <td>:</td><td><strong>{{ date('d M Y H:i:s', strtotime($t_gr->updated_at)) }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Diubah oleh</td>
                                        <td>:</td><td><strong>{{ $t_gr->updated_by }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td></tr></table>

                        <table class="table table-hover">
                            <tr>
                                <th class="table-info">Nama Barang</th>
                                <th class="table-info" width=112>Exp. Date</td>
                                <th class="table-info" width=80 style="color:green">Diterima</td>
                                <th class="table-info" width=80 style="color:red">Ditolak</td>
                                <th class="table-info" width=72>Satuan</td>
                            </tr>
                            @foreach($t_gr_item as $key => $value)
                                <tr>
                                    <td>{{ $value->sku_name }}</td>
                                    <td>{{ date('d M Y', strtotime($value->exp_date)) }}</td>
                                    <td align=right style="color:green">{{ number_format($value->qty_good) }}</td>
                                    <td align=right style="color:red">{{ number_format($value->qty_bad) }}</td>
                                    <td align=center>{{ $value->uom }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
