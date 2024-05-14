@extends('layouts.app')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<style>
    .datepicker td{
        width: 30px;
        height: 30px;
    }

    .datepicker{
        padding:  10px;
    }

</style>
@endsection

@section('content')

    <!-- content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Create PO') }}</h1>
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
                        Create PO
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="pull-right">
                        
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
                            <form action="{{ route('po.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="kode"><strong>PO No. :</strong></label>
                                            <input type="text" name="po_no" class="form-control @error('po_no') is-invalid @enderror"
                                                placeholder="" autofocus maxlength="10" value="{{ old('po_no') }}" required>
                                            @error('po_no')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name"><strong>PO Date :</strong></label>
                                            <input type="text" name="po_date" class="form-control datepicker @error('po_date') is-invalid @enderror" placeholder=""  value="{{ old('po_date') }}" required>
                                            @error('po_date')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name"><strong>Delivery Date :</strong></label>
                                            <input type="text" name="delv_date" class="form-control datepicker @error('delv_date') is-invalid @enderror" placeholder=""  value="{{ old('delv_date') }}" required>
                                            @error('delv_date')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name"><strong>TOP :</strong></label>
                                            <input type="number" name="top"  value="{{ old('top') }}" class="form-control @error('top') is-invalid @enderror" placeholder="" required>
                                            @error('top')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        
                                        
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name"><strong>PR No :</strong></label>
                                            <input type="text" name="pr_no" class="form-control @error('pr_no') is-invalid @enderror"
                                                placeholder="" value="{{ old('pr_no') }}" required>
                                            @error('pr_no')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name"><strong>Supplier :</strong></label>
                                            <select class="form-control @error('supplier') is-invalid @enderror select2-selection--single" name="supplier" required>
                                                <option value="">--  Choose  --</option>
                                                @foreach($supplier as $supp)
                                                    <option value="{{ $supp->id }}" @if(old('supplier') == $supp->id) selected @endif )>{{ $supp->id." - ".$supp->supplier_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('supplier')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name"><strong>Site :</strong></label>
                                            <select class="form-control @error('site') is-invalid @enderror" name="site" required>
                                                <option value="">--  Choose  --</option>
                                                @foreach($site as $sites)
                                                    <option value="{{ $sites->site }}" @if(old('site') == $sites->site) selected @endif >{{ $sites->site_code." - ".$sites->site_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('site')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <table class="table table-bordered" id="dynamicAddRemove">
                                            <tr>
                                                <th colspan=4 class="table-primary">RAW MATERIAL</th>
                                            </tr>
                                            <tr>
                                                <th>SKU Name</th>
                                                <th>QTY</th>
                                                <th>UOM</th>
                                                <th>
                                                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">+</button>
                                                    
                                                </th>
                                            </tr>
                                            <tr id="clone">
                                                <td>
                                                    <select class="form-control raw-material" name="sku[]" required>
                                                        <option value="">--  Choose  --</option>
                                                        @foreach($m_rm as $rm)
                                                            <option value="{{ $rm->sku }}" id="{{ $rm->sku }}" data-uom1="{{ $rm->uom1 }}" data-uom2="{{ $rm->uom2 }}" data-rate1="{{ $rm->rate1 }} data-rate2="{{ $rm->rate2 }}">{{ $rm->sku." - ".$rm->sku_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input class="form-control" type="number" name="qty[]" required></td>
                                                <td><select class="form-control uom" name="uom[]" required>
                                                        <option value="">--  Choose  --</option>
                                                    </select></td>
                                                <td></td></tr>
                                        </table>
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary ml-3">Submit</button>
                                <a class="btn btn-secondary" href="{{ route('sites.index') }}"><i class="fas fa-chevron-left"></i>
                            Back</a>
                            </form>
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
    <!-- /.end content -->

    
@endsection

@section('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $('.datepicker').datepicker({  
       format: 'yyyy-mm-dd',
       autoclose: true,
       todayHighlight : true,
       enableOnReadonly : true,
    });

    var i = 0;
    $("#dynamic-ar").click(function () {
        var clone = $('#clone').html();
        console.log(clone);
        ++i;
        $("#dynamicAddRemove").append('<tr>' + clone.substring(0, clone.length-14) + '<td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

    $(document).on('change', 'select', function() {
        if($(this).attr('name') == 'sku[]'){
            var id = $(this).val();
            $(this).parents('tr').find('.uom').empty();
            $(this).parents('tr').find('.uom').append('<option value="">--  Choose  --</option>');
            $(this).parents('tr').find('.uom').append('<option value='+ $('#' + id).data('uom1') +'>'+ $('#' + id).data('uom1') +'</option>');
            if($('#' + id).data('uom2') != ''){
                $(this).parents('tr').find('.uom').append('<option value='+ $('#' + id).data('uom2') +'>'+ $('#' + id).data('uom2') +'</option>');
            }
        }
    // $('.raw-material').change(function(){
        
    })
</script>
@endsection
