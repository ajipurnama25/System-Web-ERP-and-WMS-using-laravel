@extends('layouts.app')

@section('content')
    <!-- content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Warehouse Management System / Detail') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center text-center">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <span class="text-capitalize font-weight-bold">detail product finish good</span>
                    </div>
                </div>
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
            <div class="row justify-content-center">
                <div class="col-lg-12">
                @foreach ($products AS $product)
                    <div class="card" style="padding: 1.3em">
                        <div class="card-body p-0 text-capitalize">
                            @if($product->pid == null)
                                <form action="{{ route('generate_pid', ['id' => $product->id]) }}" method="post">
                            @else
                                <form action="{{ route('update_status', ['id' => $product->id]) }}" method="post">
                            @endif
                            @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="name"><strong>site</strong></label>
                                            <input type="text" readonly value="{{ $product->site }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="sku"><strong>sku</strong></label>
                                            <input type="text" value="{{ $product->sku }}" readonly class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="exp_date">Expiry Date</label>
                                            <input type="text" readonly value="{{ date('Y-m-d', strtotime($product->expiry_date)) }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Jumlah Max</label>
                                            <input type="text" readonly value="{{ $product->max_qty }}"  class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Jumlah Karton</label>
                                            <input type="text" readonly value="{{ $product->cartoon_pack }}" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="pallet number">nomor pallet</label>
                                            <input type="text" readonly value="{{ $product->pallet_number }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="pallet number">PID</label>
                                            <input type="text" readonly value="{{ $product->pid }}" class="form-control">
                                        </div>
                                        @if ($product->pid == null)
                                            <div class="float-right mt-3 mb-3">
                                                <button type="submit" class="btn btn-info btn-sm text-capitalize">generate</button>
                                            </div>
                                        @else
                                            @if ($product->rack_status_id != 3)
                                                <div class="float-right mt-3 mb-3"><button type="submit" class="btn btn-sm btn-success text-capitalize">submit</button></div>
                                                <div class="float-right mt-3 ml-2 mb-3"><a href="{{ route('products.penyimpanan') }}" class="btn btn-sm btn-danger text-capitalize mr-3">kembali</a></div>
                                            @else
                                                <div class="float-right mt-3 ml-2 mb-3"><a href="{{ route('products.penyimpanan') }}" class="btn btn-sm btn-danger text-capitalize">kembali</a></div>
                                            @endif
                                        @endif
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.end content -->
@endsection
