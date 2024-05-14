@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid text-capitalize">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0">{{ __('Warehouse Management System / list penerimaan') }}</h5>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="alert alert-info font-weight-bold text-capitalize">
                        <a style="text-decoration: none;" href="{{ route('products') }}"> penerimaan </a>
                        <i class="fas fa-dolly-flatbed"></i>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="alert alert-info font-weight-bold text-capitalize">
                        <a style="text-decoration: none;" href="{{ route('products.penyimpanan') }}"> penyimpanan </a>
                        <i class="fas fa-archive"></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="padding: 1.3em; font-size: 14px">
                        <div class="card-body p-0">
                            <table class="table text-capitalize">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>gudang</th>
                                        <th>mesin</th>
                                        <th>sku</th>
                                        <th>produk</th>
                                        <th>expire</th>
                                        <th>Pack</th>
                                        <th>qty</th>
                                        <th>pallet</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                            @php $no = 1; @endphp
                            @foreach($products AS $product)
                                <tbody>
                                        <tr>
                                            <td>{{ $no++; }}</td>
                                            <td>{{ $product->site }}</td>
                                            <td>{{ $product->machine; }}</td>
                                            <td>{{ $product->sku }}</td>
                                            <td>{{ $product->sku_name }}</td>
                                            <td>{{ date('Y-m-d', strtotime($product->expiry_date)) }}</td>
                                            <td>{{ $product->cartoon_pack; }}</td>
                                            <td>{{ $product->max_qty; }}</td>
                                            <td>{{ $product->pallet_number; }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-success text-capitalize" href="{{ route('product.show', ['id' => $product->id]) }}">proses</a>
                                            </td>
                                        </tr>
                                    </tbody>
                            @endforeach
                            </table>
                            <div class="d-flex justify-content-center mt-3">
                                {!! $products->links() !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
