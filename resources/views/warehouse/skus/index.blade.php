@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5 class="m-0">{{ __('Warehouse Management System / List Of SKU') }}</h5>
            </div><!-- /.col -->
        </div><!-- /.row -->
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
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <a href="{{ route('form-add-sku') }}" class="btn btn-success mb-3">
                    <i class="fa fa-plus-circle nav-icon"></i> SKU
                </a>
            </div>
            <div class="col-sm-8">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="padding: 1.3em; font-size: 14px">
                    <div class="card-body p-0">
                        <table class="table text-capitalize">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>sku</th>
                                    <th>barcode</th>
                                    <th>nama</th>
                                    <th>berat</th>
                                    <th>karton Pak</th>
                                    <th>harga regular</th>
                                    <th>harga horeca</th>   
                                </tr>
                            </thead>
                            @php $no = ($data_sku->currentpage()-1)* $data_sku->perpage() @endphp
                            @foreach($data_sku AS $sku)
                            <tbody>
                                <tr>
                                    <td>{{ ++$no; }}</td>
                                    <td>{{ $sku->sku; }}</td>
                                    <td>{{ $sku->barcode; }}</td>
                                    <td>{{ $sku->sku_name; }}</td>
                                    <td>{{ $sku->weight; }}</td>
                                    <td>{{ $sku->cartoon_pack; }}</td>
                                    <td>Rp. {{ $sku->regular_price; }}</td>
                                    <td>Rp. {{ $sku->horeca_price; }}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                            <div class="d-flex justify-content-center mt-3">
                                {!! $data_sku->links() !!}
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