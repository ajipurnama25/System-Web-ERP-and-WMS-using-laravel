@extends('layouts.app')

@section('styles')

@endsection

@section('title', 'Create Transfer Stock')

@section('content')
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Create Request Transfer Stock') }}</h1>
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
                        Create Request Transfer Stock
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="padding: 1.3em">
                        <div class="card-body p-0">
                            <form action="{{ route('requestStock.store') }}" method="POST" enctype="multipart/form-data" id="form-requestStock">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="kode"><strong>Site :</strong></label>
                                                    <select class="form-control site" id="site" name="site">
                                                        <option>-- Select --</option>
                                                        @foreach($arrSite as $key => $value)
                                                            <option value="{{ $key }}">{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12"><br>
                                                <table class="table table-bordered" id="dynamicAddRemove">
                                                    <tr>
                                                        <th colspan="7" class="table-primary">RAW MATERIAL</th>
                                                    </tr>
                                                        
                                                    <tr>
                                                        <th>Site</th>
                                                        <th>SKU Name</th>
                                                        <th>Delivery Date</th>
                                                        <th>QTY</th>
                                                        <th>Stock</th>
                                                    </tr>
                                                    <tbody id="clone">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary ml-3" id="main-form">Submit</button>
                                <a class="btn btn-secondary" href="{{ route('sites.index') }}"><i class="fas fa-chevron-left"></i>Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')

<script>
    $("#site").change(function () {
        var site = $(this).val();
        if(site == ''){
            $("#clone").empty();
            return false;
        }
        // console.log(no_po);
        $.ajax({
            type: 'get',
            url: '/api/transfer-stock/search/' + site,
            // data: {no_po: no_po},
            dataType: 'json',
            success: function (data) {
                console.log(data)
                // res = JSON.parse(data);

                $("#clone").empty();
                $.each( data, function( key, value ) {
                    $("#clone").append('<tr><td rowspan="1" class="td_'+value.site_name+'">'+ value.site_name +'</td><td rowspan="1" class="td_'+value.sku+'">'+ value.sku_name +'</td><td><input type="hidden" name="kode[]" value="'+ value.sku +'""><input type="date" name="exp_date[]" class="form-control date"></td><td><input type="number" style="width:64px;text-align:right;" value=0 max="'+value.qty+'" data-max="'+value.qty+'"  name="qty[]" class="form-control inputQty '+value.sku+'" data-sku="'+value.sku+'"></td><td rowspan="1" class="td_'+value.sku+'">'+ value.qty.toLocaleString(window.document.documentElement.lang) +'</td></tr>');
                    $("#qty_info").append('<input type="hidden" id="qty'+value.sku+'" value="'+value.qty+'">');
                });
                $('#form-gr').css('display', 'block');
                
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $(document).on('keyup', '.inputQty', function(){
        var sku = $(this).val();
        var max = $(this).data('max');

        if(sku < 0){
            $(this).val(0);
        }

        if(sku > max){
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Max Quantity is ' + max,
            });

            $(this).val(max);
        }
        
    });

    $(document).on('change', '.inputQty', function(){
        var sku = $(this).val();
        var max = $(this).data('max');

        if(sku < 0){
            $(this).val(0);
        }

        if(sku > max){
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Max Quantity is ' + max,
            });

            $(this).val(max);
        }
        
    });

</script>
@endsection
