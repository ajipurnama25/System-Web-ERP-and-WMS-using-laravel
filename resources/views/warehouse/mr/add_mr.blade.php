@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
</div>
<!-- /.content-header -->
<!-- Main content -->
<script>
    function prevDate() {
        var tmp = document.getElementById('tgl').value.split("-");
        var year = parseInt(tmp[0]);
        var month = parseInt(tmp[1]) - 1;
        var day = parseInt(tmp[2]);

        var currentDate = new Date(year, month, day);
        var prevMonth = new Date(year, month - 1, 1);
        var prevDate = new Date(year, month, 0);

        if (currentDate.getDate() == 1) {
            document.getElementById('tgl').value = prevDate.getFullYear() + '-' + (prevDate.getMonth() + 1).toString().padStart(2, '0') + '-' + prevDate.getDate().toString().padStart(2, '0');
        } else {
            document.getElementById('tgl').value = year + '-' + (month + 1).toString().padStart(2, '0') + '-' + (day - 1).toString().padStart(2, '0');
        }
        callAjax();
    }

    function nextDate() {
        var tmp = document.getElementById('tgl').value.split("-");
        var year = parseInt(tmp[0]);
        var month = parseInt(tmp[1]) - 1;
        var day = parseInt(tmp[2]);

        var currentDate = new Date(year, month, day);
        var nextMonth = new Date(year, month + 1, 1);

        if (currentDate.getMonth() == month && currentDate.getDate() == new Date(year, month + 1, 0).getDate()) {
            document.getElementById('tgl').value = nextMonth.getFullYear() + '-' + (nextMonth.getMonth() + 1).toString().padStart(2, '0') + '-' + nextMonth.getDate().toString().padStart(2, '0');
        } else {
            var nextDate = new Date(year, month, day + 1);
            document.getElementById('tgl').value = nextDate.getFullYear() + '-' + (nextDate.getMonth() + 1).toString().padStart(2, '0') + '-' + nextDate.getDate().toString().padStart(2, '0');
        }
        callAjax();
    }

</script>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info text-center">
                    <span class="text-capitalize font-weight-bold">Material Released Preparation</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body text-capitalize">
                        <form action="{{ route('mr.create') }}" !onsubmit="return cekInput();" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-xs-8 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="name"><strong>site</strong></label>
                                        <input type="hidden" id="site" name="site" readonly
                                            value="{{ $sites[0]->site }}">
                                        <input type="text" id="site_name" name="site_name" readonly
                                            value="{{ $sites[0]->site_name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-8 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="gudang"><strong>gudang</strong></label>
                                        <input type="hidden" id="gudang" name="gudang" readonly
                                            value="{{ $wh[0]->wh_storage }}">
                                        <input type="text" id="gudang_name" name="gudang" readonly
                                            value="{{ $wh[0]->cat_name }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xs-8 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="wo_no"><strong>wo no.</strong></label>
                                        <input type="text" id="wo_no" name="wo_no" readonly value=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-8 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="date"><strong>date</strong></label>
                                        <div class='input-group date' required>
                                            <input type=button style="width:40px;" class="btn btn-primary"
                                                onclick="prevDate();" value="<">
                                            <input type='date' name='date' id='tgl' onchange="callAjax();"
                                                @if(old('date')=='' ) value="{{ $date }}" @else
                                                value="{{ old('date') }}" @endif class="form-control" />
                                            <input type=button style="width:40px;" class="btn btn-primary"
                                                onclick="nextDate();" value=">">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="col-xs-8 col-sm-8 col-md-8">
                                    <table id=" table" class="table list" style="display:none">
                                        <thead>
                                            <tr align="center">
                                                <th>SKU</th>
                                                <th>Qty</th>
                                                <th>Berat yang diminta(In Kg)</th>
                                                <th>Berat yang disiapkan (In Kg)</th>
                                            </tr>
                                        </thead>
                                        <tbody id="konten"></tbody>
                                        <tfoot>
                                            <div>
                                                <td colspan="7" style="text-align:right"><button type="submit"
                                                        onclick="return cekInput();" id="submitForm"
                                                        class="btn btn-sm btn-success text-capitalize">submit</button>
                                                </td>
                                            </div>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                    </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    //var cnt = 0;

    // function cekInput() {
    //     var last_unit = "";
    //     var count_row = 0;
    //     var count_input = 0;
    //     var unt = "";
    //     var inp = "";
    //     for (i = 0; i < cnt; i++) {
    //         unt = document.getElementById("unit" + i).value;
    //         inp = document.getElementById("weight_input" + i).value;

    //         if (last_unit != unt) {
    //             if (last_unit != "") {
    //                 if (count_input != count_row && count_input != 0) {
    //                     alert("Machine Line " + last_unit + " harus di isi semua");
    //                     return false;
    //                 }
    //             }
    //             count_row = 0;
    //             count_input = 0;
    //             last_unit = unt;
    //         }

    //         count_row++;
    //         if (inp != "") {
    //             count_input++;
    //         }
    //     }
    //     if (last_unit != "") {
    //         if (count_input != count_row && count_input != 0) {
    //             alert("Machine Line " + last_unit + " harus di isi semua");
    //             return false;
    //         }
    //     }
    //     return true;
    // }

    function callAjax() {
            var tgl = document.getElementById("tgl").value;
            var site = document.getElementById("site").value;
            var gudang = document.getElementById("gudang").value;
            $.ajax({
                type: "GET",
                url: "{{ url('/mr/showAjax') }}",
                data: {
                    tgl: tgl,
                    site: site,
                    wh: gudang,
                },
                dataType: "json",
                cache: false,
                success: function(response) {
                    cnt = 0;
                    $('#konten').empty();
                    $(".list").hide();
                   
                    $.each(response, function(i, item) {
                        jumlah = item.unit;
                        form = '<tr align="center">';
                        form += '<td>' + item.sku +
                            '<input type="hidden" id="wo_no" type="text" name="wo_no[]" value="' +
                            item.wo_no + '" class="form-control"><input type="hidden" id="sku" type="text" name="sku[]" value="' +
                            item.sku + '" class="form-control"></td></td>';
                        form += '<td><input type="hidden" id="wh_storage" type="text" name="wh_storage[]" value="' +
                            item.wh_storage + '" class="form-control">' + item.qty_out + ' </td>';
                        form += '<td align="center">' + (item.weight_out / 1000)
                            .toFixed(1) + '</td>';
                        form += '<td><input id="weight_input' + cnt +
                            '" type="text" name="weight_released[]" class="form-control"></td></tr>';
                        $(".list").show();
                        $('#konten').append(form);
                        document.getElementById("wo_no").value = item.wo_no;
                        //cnt++;
                    })
                }
            });
    };

    $(document).ready(function(){ 
        setTimeout(function () {
            if (document.getElementById("site").value!='' ){
            } else {
            }
            callAjax();
        }, 100);
    });
 
</script>