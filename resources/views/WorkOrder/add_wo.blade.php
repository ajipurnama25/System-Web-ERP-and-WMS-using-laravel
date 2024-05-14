@extends('layouts.app')
@section('content')
<style>
    .errMsg td {
        white-space: nowrap;
    }
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">{{ __('Jadwal Produksi') }}</h1>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<script>
    var jumlah=0;
    function backup_data() {
        var tmp = '';
        for (i=1; i<=jumlah; i++) {
            if (document.getElementById('sku' + i)!=null) {
                tmp += document.getElementById('sku' + i).value + ',' + document.getElementById('weight' + i).value + ';';
            } else {
                tmp += ',;';
            }
        }
        document.getElementById('temp').value = tmp;
    }
    function restore_data() {
        if (document.getElementById('temp').value != '') {
            if (document.getElementById("sites").value == document.getElementById("site").value) {
                var obj1 = document.getElementById('temp').value.split(';');
                document.getElementById('temp').value = '';
                for (var i=1; i<=obj1.length; i++) {
                    var obj2 = obj1[i-1].split(',');
                    if (document.getElementById('sku' + i)!=null) {
                        document.getElementById('sku' + i).value = obj2[0];
                        document.getElementById('weight' + i).value = obj2[1];
                    }
                }
            }
        }
    }
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
        // var tmp = document.getElementById('tgl').value.split("-");
        // var day = new Date(new Date(tmp[0], tmp[1]-1, tmp[2])-(24*60*60*1000));
        // document.getElementById('tgl').value = (day.getFullYear()+'-0'+(day.getMonth()+1)+'-'+day.getDate());
        // callAjax(); 
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
        // var tmp = document.getElementById('tgl').value.split("-");
        // var day = new Date(new Date(tmp[0], tmp[1]-1, tmp[2])-(-24*60*60*1000));
        // document.getElementById('tgl').value = (day.getFullYear()+'-0'+(day.getMonth()+1)+'-'+day.getDate());
        // callAjax(); 
    }
    function formCreate() {
        $('#theform').attr('action', '{{ route("wo.create") }}');
    }
</script>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body text-capitalize">
                        <form id="theform" action="{{ route('wo.delete') }}" method="POST" onsubmit="backup_data()">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-xs-9 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type='hidden' id='site' name='site' @if(old('sites')=='' )
                                            value="{{ $site }}" @else value="{{ old('sites') }}" @endif />
                                        <input type="hidden" id="wono" name="wono" value="{{ old('wono') }}">
                                        <input type="hidden" id="unit" name="unit">
                                        <input type="hidden" id="temp" name="temp" value="{{ old('temp') }}">
                                        <label><strong>Site</strong></label>
                                        <select id="sites" name="sites" class="form-control" required
                                            onchange="callAjax();">
                                            <option value="" selected>-- Please Select --</option>
                                            @foreach($sites AS $tmp)
                                            <option value="{{ $tmp->site }}">{{ $tmp->site_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="ken"></div>
                                <div class="col-xs-10 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="date"><strong>date</strong></label>
                                        <div class='input-group date' required>
                                            <button type="button" class="btn btn-outline-primary" onclick="prevDate();"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                            <input type='date' name='date' id='tgl' onchange="callAjax();"
                                                @if(old('date')=='' ) value="{{ $date }}" @else
                                                value="{{ old('date') }}" @endif class="form-control" />
                                            <button type="button" class="btn btn-outline-primary" onclick="nextDate();"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-10 col-sm-10 col-md-10">
                                    <br>
                                    <div class="tbl">
                                        <table id="table" class="table list" style="display:none" align="right">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">No.</th>
                                                    <th style="text-align: center">SKU</th>
                                                    <th style="text-align: center">Berat (Kg)</th>
                                                    <th style="text-align: center">Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="konten"></tbody>
                                        </table>
                                        <div id="tombol" align="right">
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

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    // function cekSelect() {
    //     var slct = $('#konten').next('select');
    //     // var value = slct.attr('value');
    //     alert(slct);
    // }
    function endForm(unit) {
        form = '</select></td>';
        form += '<td><input style="width:100px;text-align:right;" id="weight' + unit + '" type="text" name="weight[]" class="form-control" placeholder="Weight" !onchange="backup_data()"></td>';
        form += '<td align="center">Baru</td>';
        // form += '<td></td>';
        form += '<td><button type="button" class="btn btn-outline-primary add-row"><i class="fa fa-plus-square" aria-hidden="true"></i></button></td>';
        form += '</tr>';
        return form; 
    }
    function callAjax() {
        var obj = document.getElementById("sites").value;//.split(",");
        var value = obj;//[0];
        document.getElementById("site").value = obj;
        var tgl = document.getElementById("tgl").value;
        //document.getElementById('temp').value = '';
        //var btn = '';
        //console.log(document.getElementById("tgl").value);
        $.ajax({
            type: "GET",
            url: "{{url('/wo/showAjax')}}",
            data: {
                id:value,
                tgl:tgl,
            },
            dataType: "json",
            cache: false,
            success: function(response) {
                $('#konten').empty();
                $('#tombol').empty();
                $(".list").show();
                if (response.length > 0) {
                    // kosong = 0;
                    jumlah = response.length;
                    form = '';
                    unit = '';
                    batal_id = '';
                    nox = '';
                    no = '';
                    seq = 0;
                    $.each(response, function(i, item) {
                        $("#wono").val(item.wo_no);
                        if (nox != item.unit) {
                            nox = item.unit;
                            no = nox;
                            seq = 0;
                        }
                        batal_id = item.unit + '_' + response[i]['wo_seq'];
                        
                        if (!item.status_name) {
                            flg = (unit != item.unit);
                            if (flg) {
                                unit = item.unit;
                                seq++;
                                if (form != '') {$('#konten').append(form + endForm(unit));}
                                form = '<tr class=xxx><td>' + no + '</td>';
                                form += '<td><input type="hidden" title="idx' + unit + '" id="idx' + unit + '" name="idx[]" value="' + unit + '">';
                                form += '<input type="hidden" id="wo_seq' + unit + '_1" value="' + seq + '" name="wo_seq[]" class="form-control">';
                                form += '<select class="form-control text-capitalize"  title="sku' + unit + '" id="sku' + unit + '" type="text" name="sku[]" !onchange="backup_data()">';
                                form += '<option value="">-- Belum Ada Jadwal Produksi --</option>';
                            }
                            form += '<option value="' + item.sku + '">' + item.sku_bom + ' - ' +  + item.sku + ' - ' + item.sku_name + '</option>';
                        } else {
                            if (form != '') {$('#konten').append(form + endForm(unit));}
                            seq = item.wo_seq;
                            form = '<tr class=xxx><td>' + no + '</td>';
                            form += '<td><input type="hidden" title="idx' + unit + '" id="idx' + unit + '" value="' + unit + '">';
                            form += '<input type="hidden" id="wo_seq' + unit + '_1" value="' + item.wo_seq + '" class="form-control">';
                            form += '<select disabled class="form-control text-capitalize"  title="sku' + unit + '" id="sku' + unit + '" type="text" !onchange="backup_data()">';
                            form += '<option value="' + item.sku + '">' + item.sku_bom + ' - ' + item.sku + ' - ' + item.sku_name + '</option>';
                            form += '</select><input type="hidden" name="sku_input[]" value="' + item.sku + '"></td>';
                            form += '<td align=center><input type="hidden" name="weight_input[]" value="' + item.weight + '"> ' + item.weight + '</td>';
                            form += '<td align="center">' + item.status_name + '</td>';
                            if (item.status==5) {
                                form += '<td></td>';
                            } else {
                                form += '<td><button type="submit" id="btl' + batal_id + '" class="btn btn-outline-secondary submit_button" title="' + batal_id + '" onclick="document.getElementById(\'unit\').value=\'' + batal_id + '\';  "><i class="fa fa-trash" aria-hidden="true"></i></button></td>';
                            }
                            // form += '<td></td>';
                            form += '</tr>';
                            $('#konten').append(form);
                            form = '';
                        }
                        no = '';
                    });
                    if (form != '') {$('#konten').append(form + endForm(unit));}
                    $('#konten').append('<tr class=xxx></tr>');
                    btn = '<button type="submit" class="btn btn-primary text-capitalize submit_button"  onclick="formCreate()">Simpan Perubahan</button>';
                    $('#tombol').append(btn);
                    setTimeout(function () {
                        restore_data();
                    }, 100);
                }
            }
        }); 
    }
    $(document).ready(function(){ 
        setTimeout(function () {
            var obj=document.getElementById("sites");
            if(document.getElementById("site").value!='') {
                obj.value=document.getElementById("site").value;
            } else {
                obj.selectedIndex = 1;
            }
            callAjax();
        }, 100);
    });
 

    $(document).on('click', '.add-row', function(){
        //var clone = $(this).parents('tr').html();
        var obj = $(this).parents('tr');
        var nex = obj.nextAll('.xxx:first');
        //alert(obj.children("td:last").html());

        var addRow = '';
        
        var idx = obj.find('input:first').val();
        var wo_seq = nex.prev('tr').children("td").next("td").children("input:first").next("input").val()-0+1;
        addRow = '<td></td>';
        addRow += '<td><input type="hidden" id="idx' + idx + '" value="' + idx + '" name="idx[]" class="form-control">';
        addRow += '<input type="hidden" id="wo_seq' + idx + '_' + wo_seq + '"  title="wo_seq' + idx + '_' + wo_seq + '" value="' + wo_seq + '" name="wo_seq[]" class="form-control"><select class="form-control text-capitalize" id="sku" type="text" name="sku[]" !onchange="backup_data()">';
        addRow += obj.find('select').html().replace(" selected", "");
        addRow += '</select></td>';
        addRow += '<td><input style="width:100px;text-align:right;" id="weight" type="text" name="weight[]" class="form-control" placeholder="Weight" !onchange="backup_data()"></td>';
        addRow += '<td align="center">Baru</td>';
        // addRow += '<td></td>';
        addRow += '<td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="fa fa-minus-square" aria-hidden="true"></i></button></td>';

        nex.before('<tr>' + addRow + '</tr>');

    });

    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

</script>
@endsection