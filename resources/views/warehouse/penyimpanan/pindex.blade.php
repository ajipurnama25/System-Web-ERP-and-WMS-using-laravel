@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">{{ __('Penyimpanan Finished Goods') }}</h1>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="col">
            @if ($message = Session::get('success'))
            <script type="module">
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: "{{ $message }}",
                    showConfirmButton: false,
                    timer: 3600
                });
            </script>
            @endif
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" !style="padding: 1.3em">
                        <div class="card-body p-0">
                            <table class="table text-capitalize">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>PID</th>
                                        <th>SKU</th>
                                        <th>Exp. Date</th>
                                        <th>qty</th>
                                        <th>QC status</th>
                                        <th>rack</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @foreach($products AS $product)
                                        <tr>
                                            <td>{{ $no++; }}</td>
                                            <td>{{ $product->pid }}</td>
                                            <td>{{ $product->sku }} - {{ $product->sku_name }}</td>
                                            <td>{{ date('Y-m-d', strtotime($product->exp_date)) }}</td>
                                            <td>{{ $product->qty_origin; }}</td>
                                            <td>{{ $product->qc_status; }}</td>
                                            <td>{{ $product->rack_stack }}</td>
                                            <td><a href="{{ route('warehouse.penyimpananfg', ['pid' => $product->pid]) }}" class="btn btn-primary">Tersimpan</a></td>
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