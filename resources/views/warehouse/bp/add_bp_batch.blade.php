@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info text-center">
                    <span class="text-capitalize font-weight-bold">Production Batch Info</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body text-capitalize">
                        <form action="{{ route('bp.create') }}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <table width=100%>
                                        <tr>
                                            <td>
                                                @foreach($dataSKU AS $dsku)
                                                Jalur Mesin: {{ $dsku->unit }} <br>
                                                <input type="hidden" name="unit" value="{{ $dsku->unit }}">
                                                <input type="hidden" name="wo_no" value="{{ $dsku->wo_no }}">
                                                <span id="selectedSku">{{ $dsku->sku }}</span> <br>
                                                <?php
                                                $unit = $dsku->unit; 
                                                $last_batch_seq = DB::table('t_batch')->select('batch_seq');
                                                $last_batch_seq->where('unit', $unit);
                                                
                                                if ($last_batch_seq->count() > 0) {
                                                    foreach ($last_batch_seq->get() as $item) {
                                                        $batch_seq = $item->batch_seq + 1;
                                                    }
                                                } else {
                                                    $batch_seq = 1;
                                                }
                                                ?>
                                                Batch Ke: <input type="hidden" name="batch_seq"
                                                    value="{{ $batch_seq }} ">{{ $batch_seq }}<br>
                                                Jam Batch: <span id="jam_batch"></span> <br>
                                                Berat Total: <input class="berat" name="berat_total"
                                                    value="{{ $dsku->weight }}" style="width: 20%; height: 30px;">
                                                <input type="hidden" name="berat" value="{{ $dsku->weight }}">Kg
                                                @endforeach
                                            </td>
                                            {{-- <td>
                                                <button type="button" class="btn btn-secondary pilih-produk"
                                                    data-toggle="modal" data-target="#productModal">Pilih
                                                    Produk
                                                </button>
                                            </td> --}}
                                        </tr>
                                        <td>
                                            <br>
                                        </td>
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <b>Berdasarkan BOM</b>
                                                    <br>
                                                    @foreach($skuBOM AS $skub)
                                                </td>
                                            <tr>
                                                <td>
                                                    {{ $skub->rm_name }} <input type="hidden" name="sku[]"
                                                        value="{{ $skub->sku }}"> &ensp;
                                                    <input disabled id="weight" name="weight" readonly
                                                        value="{{ $skub->weight }}" style="width: 30%; height: 30px;">
                                                    <input type="hidden" name="weight[]" value="{{ $skub->weight }}">
                                                </td>
                                            </tr>
                                            @endforeach
                                            </td>
                                            </tr>
                                        </table>
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <b>Penambahan Material</b>
                                                    <br>
                                                    @foreach($dataWIP AS $dwip)
                                                </td>
                                            <tr>
                                                <td>
                                                    <?php
                                                    $prodDate = $dwip->prod_date;
                                                    $dateTime = new DateTime($prodDate);
                                                    $ProdDate = $dateTime->format('d-m-Y');
                                                    ?>
                                                    {{ $dwip->sku }} <input type="hidden" name="skus[]"
                                                        value="{{ $dwip->sku }}"> &ensp;
                                                    <input type="hidden" name="weight_bals[]" value="{{ $dwip->qty }}">
                                                    <input id="weight_bal" name="weight_bal[]" value=""
                                                        style=" width: 20%; height: 30px;">/
                                                    {{ $dwip->qty }} Kg &ensp; ({{$ProdDate}})<br><br>
                                                    {{-- {{ $dwip->sku_wip_lg }} <input type="hidden" name="skus[]"
                                                        value="{{ $dwip->sku_wip_lg }}"> &ensp;
                                                    <input type="hidden" name="weight_bals[]"
                                                        value="{{ $dwip->weightbal_wip_lg }}">
                                                    <input id="weight_bal" name="weight_bal[]" value=""
                                                        style=" width: 20%; height: 30px;">/
                                                    {{ $dwip->weightbal_wip_lg }} Kg &ensp; ({{$ProdDate}})<br><br>
                                                    {{ $dwip->sku_wip_rework }} <input type="hidden" name="skus[]"
                                                        value="{{ $dwip->sku_wip_rework }}"> &ensp;
                                                    <input type="hidden" name="weight_bals[]"
                                                        value="{{ $dwip->weightbal_wip_rework }}">
                                                    <input id="weight_bal" name="weight_bal[]" value=""
                                                        style=" width: 20%; height: 30px;">/
                                                    {{ $dwip->weightbal_wip_rework }} Kg &ensp; ({{$ProdDate}})<br><br>
                                                    {{ $dwip->sku_wip_adonan }} <input type="hidden" name="skus[]"
                                                        value="{{ $dwip->sku_wip_adonan }}"> &ensp;
                                                    <input type="hidden" name="weight_bals[]"
                                                        value="{{ $dwip->weightbal_wip_adonan }}">
                                                    <input id="weight_bal" name="weight_bal[]" value=""
                                                        style=" width: 20%; height: 30px;">/
                                                    {{ $dwip->weightbal_wip_adonan }} Kg &ensp; ({{$ProdDate}}) --}}
                                                </td>
                                            </tr>
                                            @endforeach
                                            {{-- <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#addRowModal">+</button>
                                            --}}
                                            {{-- </td>
                                            </tr> --}}
                                        </table>
                                        <button type="submit" class="btn btn-primary"
                                            style="float: right;">Batch</button>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<!-- /.row -->

<script>
    // Update the count down every 1 second
    var x = setInterval(function() {
    
      // Get today's date and time
      var now = new Date();
    
      // Time calculations for hours, minutes and seconds
      var hours = now.getHours();
      var minutes = now.getMinutes();
      var seconds = now.getSeconds();
      //alert();
    
      // Display the result in the element with id="jam_batch"
      document.getElementById("jam_batch").innerHTML = hours + ": " + minutes + ": " + seconds ;
        
    }, 1000);
</script>