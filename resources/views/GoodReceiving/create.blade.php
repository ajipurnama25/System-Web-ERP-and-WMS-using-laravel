@extends('layouts.app')

@section('title', 'New Good Receiving')

@section('styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style>
    #form-gr{
        display: none;
    }

    .table td{
        vertical-align: top;
    }
    .table td div{
        padding-top: 7px;
    }
</style>
@endsection

@section('content')
    <!-- content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0">Penerimaan Baru</h1>
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
                        <div class="card-body p-0">
                            <form id="search-form">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-8">
                                        <div class="form-group">
                                            <label for="name"><strong>Nomor PO:</strong></label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="" name="po_no" id="po_no" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-info" type="submit" id="search-po"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="{{ route('gr.store') }}" method="POST" enctype="multipart/form-data" id="form-gr">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-8">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-8">
                                                <div class="form-group">
                                                    <label for="kode"><strong>Nomor Surat Jalan:</strong></label>
                                                    <input type="text" name="sj_no" class="form-control @error('sj_no') is-invalid @enderror"
                                                        placeholder="" autofocus maxlength="10" value="{{ old('sj_no') }}" required>
                                                        <input type="text" name="list_sku" id="list_sku" hidden>
                                                        <input type="text" name="po_no2" id="po_no2" hidden>
                                                    @error('sj_no')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="name"><srotng>Tanggal Surat Jalan:</srotng></label>
                                                    <input type="date" name="sj_date" class="form-control datepicker @error('sj_date') is-invalid @enderror" placeholder=""  value="{{ old('sj_date') }}" required>
                                                    
                                                    @error('sj_date')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="name"><strong>Plat Nomor Truk:</strong></label>
                                                    <input type="text" name="truck_no" class="form-control @error('truck_no') is-invalid @enderror"
                                                        placeholder="" value="{{ old('truck_no') }}" required>
                                                    @error('truck_no')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-8">
                                                <div class="form-group">
                                                    <label for="name"><strong>Pengendara Truk:</strong></label>
                                                    <input type="text" name="driver"  value="{{ old('driver') }}" class="form-control @error('driver') is-invalid @enderror" placeholder="" required>
                                                    @error('driver')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name"><strong>QC oleh:</strong></label>
                                            <select class="form-control @error('qc_by') is-invalid @enderror" name="qc_by" required>
                                                <option value="">--  tim QC  --</option>
                                                @foreach($m_employee as $emp)
                                                    <option value="{{ $emp->emp_id }}" @if(old('qc_by') == $emp->emp_id) selected @endif )>{{ $emp->emp_id." - ".$emp->emp_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('qc_by')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12"><br>
                                        <table class="table table-bordered" id="dynamicAddRemove">
                                            <tr>
                                                <th class="table-primary">Nama Barang</th>
                                                <th class="table-primary">Exp. Date</th>
                                                <th class="table-primary">Diterima</th>
                                                <th class="table-primary">Ditolak</th>
                                                <th class="table-primary">Sisa PO</th>
                                                <th class="table-primary"></th>
                                            </tr>
                                            <tbody id="clone">

                                            </tbody>
                                        </table>
                                    </div>

                                    <div id="qty_info">
                                    </div>
                                    
                                </div>
                                <div align=right>
                                    <button type="submit" class="btn btn-primary ml-3" id="main-form">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->

                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.end content -->
@endsection

@section('scripts')
<script>

        $('#search-form').submit(function(){
            return false;
        });

        $("#search-po").click(function () {
            var no_po = $('#po_no').val();
            // if(no_po == ''){
            //     return false;
            // }
            // console.log(no_po);
            $.ajax({
                type: 'get',
                url: '/api/purchase-order/search/' + no_po,
                // data: {no_po: no_po},
                dataType: 'json',
                success: function (data) {
                    // res = JSON.parse(data);
                    if (!$.trim(data.tpo)){
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'PO number not found!',
                        });
                        $('#form-gr').css('display', 'none');
                    }else{
                        // var text = 'PO Number : <strong>'+no_po+'</strong><br><br><table style="border:solid 1px #DEE2E6;" class="table table-striped table-hover"><tr><th>SKU Name</th><th width=80>QTY</th><th width=64>UOM</th></tr>';
                        // $("#sku").empty();
                        $("#po_no2").val(no_po);
                        $("#clone").empty();
                        // $("#sku").append('<option value="">--  Choose  --</option>');
                        $.each( data.tpo_item, function( key, value ) {
                            // $("#sku").append('<option id="' + value.sku + '" value="' + value.sku + '" data-name = "'+ value.sku_name +'">'+ value.sku_name +'</option>');
                            $("#clone").append('<tr><td rowspan="1" class="td_'+value.sku+'"><div>'+ value.sku_name +'</div></td><td><input type="hidden" name="kode[]" value="'+ value.sku +'""><input type="date" name="exp_date[]" class="form-control date"></td><td><input type="number" style="width:64px;text-align:right;" value=0 name="good[]" class="form-control inputQty '+value.sku+'" data-sku="'+value.sku+'"></td><td><input type="number" style="width:64px;text-align:right;" value=0 name="bad[]" class="form-control inputQty '+value.sku+'" data-sku="'+value.sku+'"></td><td align=right rowspan="1" class="td_'+value.sku+'"><div>'+ value.outstanding.toLocaleString(window.document.documentElement.lang) +' '+ value.uom +'</div></td><td><button type="button" name="add" class="btn btn-outline-primary add-row">+</button></td></tr>');
                            $("#qty_info").append('<input type="hidden" id="qty'+value.sku+'" value="'+value.outstanding+'">');
                            // text = text + '<tr><td align=left>acv' + value.sku_name + '</td><td align=right>' + parseFloat(value.outstanding).toLocaleString(window.document.documentElement.lang) + '</td><td>' + value.uom + '</td></tr>';
                        });
                        // text = text + '</table>';
                        $('#form-gr').css('display', 'block');
                    }
                    
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });

        var i = 0;

        $(document).on('click', '.add-row', function(){
            var clone = $(this).parents('tr').html();
            var obj = $(this).parents('tr');

            var addRow = '';
            
            obj2 = obj.find('td');

            tdID = obj.find("input").val();
            addRow += '<td>'+obj2[1].innerHTML+'</td>'+'<td>'+obj2[2].innerHTML+'</td>'+'<td>'+obj2[3].innerHTML+'</td>'+'<td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td>';

            rowspan = $('.td_'+ tdID).attr("rowspan");
            console.log(rowspan);
            $('.td_'+ obj.find("input").val()).attr("rowspan", parseInt(rowspan)+1);
            obj.after('<tr>' + addRow +'</tr>');
        });

        $(document).on('change', '.inputQty', function(){
            var sku = $(this).data('sku');
            var inputs = $('.' + sku);
            var total = 0;
            for(var i = 0; i < (inputs.length-1); i++){
                total = total + parseInt($(inputs[i]).val());
            }

            if((total - $('#qty' + sku).val()) > 0){
                console.log(total);
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'QTY exceeds total PO',
                });

                $(this).val($(this).val() - (total - $('#qty' + sku).val()));
            }
            
        });

        $(document).on('click', '.remove-input-field', function () {
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                var obj = $(this).parents('tr');
                tdID = obj.find("input").val();
                rowspan = $('.td_'+ tdID).attr("rowspan");
                console.log(rowspan);
                $('.td_'+ obj.find("input").val()).attr("rowspan", parseInt(rowspan)-1);
                obj.remove();
                $('#list_sku').val($("#clone").html().trim());
              }
            })
            
        });
    // });
</script>
@endsection
