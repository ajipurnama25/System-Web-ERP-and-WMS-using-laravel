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
                    <span class="text-capitalize font-weight-bold">Production Batch</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body text-capitalize">
                        <form action="{{ route('bp.batch') }}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-xs-8 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="site"><strong>Lokasi</strong></label>
                                        <input type="hidden" id="site" name="site" readonly
                                            value="{{ $sites[0]->site }}">
                                        <input type="text" id="site_name" name="site_name" readonly
                                            value="{{ $sites[0]->site_name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-8 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="wono"><strong>Wo No.</strong></label>
                                        <input type="wono" id="wono" name="wono" readonly
                                            value="{{ $unitSku[0]->wo_no }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xs-5 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="today">Tgl Produksi</label>
                                        <input type="date" id="tgl" name="tgl" readonly
                                            value="{{ $unitSku[0]->prod_date }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="col-xs-8 col-sm-8 col-md-8">
                                    @foreach($unitSku AS $usku)
                                    {{-- Jalur Mesin: {{ $usku->unit }} --}}
                                    <div id="konten_{{ $usku->unit }}"></div><br>
                                    @endforeach
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
</div>
<!-- /.container-fluid -->
</div>
<!-- /.end content -->
@endsection
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> --}}
@section('scripts')
<script>
    $(document).ready(function() {
    var site = document.getElementById("site").value;
    var tgl = document.getElementById("tgl").value;
    var batchCounter = {}; 

    $.ajax({
        type: "GET",
        url: "{{ url('/bp/showAjax') }}",
        data: {
            site: site,
            tgl: tgl,
        },
        dataType: "json",
        cache: false,
        success: function(response) {

            var form = '<table border=1><tr><td>';
            var last = '';
            var flg = false;
            $.each(response, function(i, items) {
                // $('#konten_' + last).empty();

                if (last != ('' + items.unit)) {
                    if (last != '') {
                        if (flg) {
                            form += '</select>';
                        }
                        $('#konten_' + last).append(form);
                    }

                    flg = false;
                    last = '' + items.unit;
                    $('#konten_' + last).empty();
                    if ((items.status-0) == 1) {
                        form = '+' + items.sku + '<br>';
                    } else {
                        form = '<select>';
                        flg = true;
                    }
                }
                if (flg) {
                    form += '<option value="' + items.sku + '">' + items.sku;
                }
                // form = '<table width=100%><tr><td>' +
                //     '<b>Jalur Mesin: ' + items.unit + '</b><br>' + items.sku + '<br>Berat: ' + items.weight + ' Kg<br>';
                // if (items.jam == null) {
                //     form += 'Jam Batch Sebelumnya: -<br>';
                // } else {
                //     form += 'Jam Batch Sebelumnya: ' + items.jam + '<br>';
                // }
                // if (items.batch == null) {
                //     form += '(Batch Ke: - )';
                // } else {
                //     form += '(Batch Ke: ' + items.batch + ')';
                // }
                // form += '</td>';

                // form += '<td align=right><input type="hidden" name="sku[]" value="' +
                //         items.sku + '" class="form-control"><input type="hidden" name="wo_seq[]" value="' +
                //         items.wo_seq + '" class="form-control"><input type="hidden" name="line[]" value="' +
                //         items.unit + '" class="form-control">' +
                //         '<a class="btn btn-sm btn-success text-capitalize mulai-btn" href=\"{{ url("bp/batch?unit=")}}' + items.unit + ' \" data-wo-seq="' + items.wo_seq + '" data-line="' + items.unit + '"style="display: inline-block; width: 70px; height: 70px; border-radius: 50%; text-align: center; line-height: 60px;">Batch</a>' +
                //         '<br><span class="batch-ke"></span><br><span class="jam-batch"></span>' +
                //         '</td></tr></table>';

                // $('#konten_'+items.unit).append(form);
            });
            if (last != '') {
                if (flg) {
                    form += '</select>';
                }
                $('#konten_' + last).append(form);
            }
        }
    });
});

</script>
@endsection