@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid text-capitalize">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0">{{ __('Warehouse Management System / list penyimpanan') }}</h5>
                </div><!-- /.col -->
            </div><!-- /.row -->
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
                            <table class="table text-capitalize text-center">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>gudang</th>
                                        <th>sku</th>
                                        <th>expire</th>
                                        <th>Pack</th>
                                        <th>qty</th>
                                        <th>pallet</th>
                                        <th>pid</th>
                                        <th>nama rak</th>
                                        <th>status rak</th>
                                    </tr>
                                </thead>
                            @php $no = ($products->currentpage()-1)* $products->perpage() @endphp
                            @foreach($products AS $product)
                                <tbody>
                                        <tr>
                                            <td>{{ ++$no; }}</td>
                                            <td>{{ $product->site }}</td>
                                            <td>{{ $product->sku }}</td>
                                            <td>{{ date('Y-m-d', strtotime($product->expiry_date)) }}</td>
                                            <td>{{ $product->cartoon_pack; }}</td>
                                            <td>{{ $product->max_qty; }}</td>
                                            <td>{{ $product->pallet_number; }}</td>
                                            <td style="font-size: 12x"><a href="{{ route('product.show', ['id' => $product->id]) }}">{{ $product->pid; }}</a></td>
                                            <td>{{ $product->rack_name; }}</td>
                                            <td>{{ $product->status_name; }}</td>
                                        </tr>
                                    </tbody>
                            @endforeach
                            </table>
                            <div class="d-flex justify-content-center">
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