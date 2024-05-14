@extends('layouts.app')

@section('title', 'New Good Receiving')

@section('styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style>
    #form-gr{
        /*display: none;*/
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
                    <h1 class="m-0">Ubah Data Penerimaan</h1>
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
                                                <input type="text" class="form-control" placeholder="" name="po_no" id="po_no" required value="{{ $t_gr->po_no }}" disabled>
                                                <div class="input-group-append">
                                                    <button class="btn btn-info" type="submit" id="search-po"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="{{ route('gr.update') }}" method="POST" enctype="multipart/form-data" id="form-gr">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-8">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-8">
                                                <div class="form-group">
                                                    <label for="kode"><strong>Nomor Surat Jalan:</strong></label>
                                                    <input type="text" name="sj_no" class="form-control @error('sj_no') is-invalid @enderror"
                                                        placeholder="" autofocus maxlength="10" required value="{{ $t_gr->sj_no }}">
                                                        <input type="text" name="list_sku" id="list_sku" hidden>
                                                        <input type="text" name="seq" hidden value="{{ $t_gr->seq }}">
                                                        <input type="text" name="po_no2" id="po_no2" hidden value="{{ $t_gr->po_no }}">
                                                    @error('sj_no')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="name"><strong>Tanggal Surat Jalan:</strong></label>
                                                    <input type="text" name="sj_date" class="form-control datepicker @error('sj_date') is-invalid @enderror" placeholder="" required value="{{ $t_gr->sj_date }}">
                                                    
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
                                                        placeholder="" required value="{{ $t_gr->truck_no }}">
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
                                                    <input type="text" name="driver" class="form-control @error('driver') is-invalid @enderror" placeholder="" required value="{{ $t_gr->driver }}">
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
                                                    <option value="{{ $emp->emp_id }}" @if($t_gr->qc_by == $emp->emp_id) selected @endif )>{{ $emp->emp_id." - ".$emp->emp_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('qc_by')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
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
                                                @php
                                                    foreach($t_gr_item as $key => $value){
                                                        if(isset($arr[$value->sku])){
                                                            $arr[$value->sku] += 1;    
                                                        }else{
                                                            $arr[$value->sku] = 1;
                                                        }
                                                    }

                                                $listArr = [];
                                                @endphp
                                                @foreach($t_gr_item as $key => $value)
                                                    <tr>
                                                        @php
                                                            if(!in_array($value->sku, $listArr)){
                                                                echo '<td rowspan="'.$arr[$value->sku].'" class="td_'.$value->sku.'">'.$value->sku_name.'</td>';
                                                            }
                                                        @endphp
                                                        
                                                        <td>
                                                            <input type="hidden" name="kode[]" value="{{ $value->sku }}">
                                                            <input type="date" name="exp_date[]" class="form-control date" value="{{ $value->exp_date }}">
                                                        </td>
                                                        <td>
                                                            <input type="number" style="width:64px;text-align:right;" name="good[]" class="form-control inputQty {{ $value->sku }}" data-sku="{{ $value->sku }}" value="{{ $value->qty_good }}">
                                                        </td>
                                                        <td>
                                                            <input type="number" style="width:64px;text-align:right;" name="bad[]" class="form-control inputQty {{ $value->sku }}" data-sku="{{ $value->sku }}" value="{{ $value->qty_bad }}">
                                                        </td>
                                                        @php
                                                            if(!in_array($value->sku, $listArr)){
                                                                echo '<td align=right rowspan="'.$arr[$value->sku].'" class="td_'.$value->sku.'">'.number_format($value->outstanding).' '.$value->uom.'</td>';
                                                            }
                                                        @endphp

                                                        @php
                                                            if(!in_array($value->sku, $listArr)){
                                                                echo '<td><button type="button" name="add" class="btn btn-outline-primary add-row">+</button></td>';
                                                                $listArr[] = $value->sku;
                                                            }else{
                                                                echo '<td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td>';
                                                            }
                                                        @endphp
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div id="qty_info">
                                        @php
                                            $lastSKU = '';
                                            $sumQTY = 0;
                                        @endphp
                                        @foreach($t_gr_item as $key => $value)
                                            @php
                                                if($lastSKU!=$value->sku){
                                                    if($lastSKU!=''){
                                                        echo '<input type="hidden" id="qty'. $lastSKU .'" value="'. $sumQTY .'">';
                                                        $listArr[] = $value->sku;
                                                    }
                                                    $lastSKU = $value->sku;
                                                    $sumQTY = $value->outstanding;
                                                }
                                                $sumQTY += $value->qty_good;
                                            @endphp
                                        @endforeach
                                        @php
                                            if($lastSKU!=''){
                                                echo '<input type="hidden" id="qty'. $lastSKU .'" value="'. $sumQTY .'">';
                                                $listArr[] = $value->sku;
                                            }
                                        @endphp
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

        var i = 0;
        $(document).on('click', '.add-row', function(){
            var clone = $(this).parents('tr').html();
            var obj = $(this).parents('tr');

            var addRow = '';
            
            obj2 = obj.find('td');

            tdID = obj.find("input").val();
            var gqty = obj2[2].innerHTML.trim();
            var bqty = obj2[3].innerHTML.trim();
            addRow += '<td>'+obj2[1].innerHTML+'</td>'
                +'<td>'+gqty.substr(0,gqty.indexOf('value='))+'value=0></td>'
                +'<td>'+bqty.substr(0,bqty.indexOf('value='))+'value=0></td>'
                +'<td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td>';

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
