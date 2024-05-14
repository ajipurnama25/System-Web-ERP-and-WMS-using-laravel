@extends('layouts.app')

@section('content')
    <!-- content -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info text-center text-capitalize">form add sku</div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="pull-right">
                        <a class="btn btn-danger mb-3" href="{{ route('skus') }}">Back</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    &nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="padding: 1.3em">
                        <div class="card-body p-0">
                            <form action="{{ route('create-sku') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="kode"><strong>SKU</strong></label>
                                            <input type="text" name="sku" class="form-control" placeholder="SKU Code Number">
                                        </div>
                                        <div class="form-group text-capitalize">
                                            <label><strong>barcode</strong></label>
                                            <input type="text" name="barcode" class="form-control" placeholder="SKU Barcode" >
                                        </div>
                                        <div class="form-group">
                                            <label><strong>SKU Name</strong></label>
                                            <input type="text" name="sku_name"  class="form-control" placeholder="SKU Shortname">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>SKU Group</strong></label>
                                            <select name="sku_group" class="form-control" required>
                                                <option value="">-- Please Select --</option>
                                                @foreach($sku_group AS $sku)
                                                    <option value="{{ $sku->id }}">{{ $sku->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group text-capitalize">
                                            <label><strong>weight</strong></label>
                                            <input type="text" name="weight"  class="form-control">
                                        </div>
                                        <div class="form-group text-capitalize">
                                            <label><strong>cartoon pack</strong></label>
                                            <input type="text" name="cartoon_pack"  class="form-control">
                                        </div>
                                        <div class="form-group text-capitalize">
                                            <label><strong>regular price</strong></label>
                                            <input type="text" name="regular_price" class="form-control">
                                        </div>
                                        <div class="form-group text-capitalize">
                                            <label><strong>horeca price</strong></label>
                                            <input type="text" name="horeca_price" class="form-control">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success ml-2">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.end content -->
@endsection
