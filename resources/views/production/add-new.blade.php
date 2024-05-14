@extends('layouts.app')
@section('content')
<!-- content -->
<script>
    var linewono = "";var linesku = "";var linename = "";var lineexp = "";var linemax = "";
        function lineChanged(val) {
            linewono = "";linesku = "";linename = "";lineexp = "";linemax = "";
            switch(val) {
            @foreach($woItems AS $item)
                case '{{ $item->unit }}':
                    linewono = '{{ $item->wo_no }}';
                    linesku = '{{ $item->sku }}';
                    linename = '{{ $item->sku_name }}';
                    lineexp = '{{ $item->exp_date }}';
                    linemax = '{{ $item->max_cap }}';
                    break;
            @endforeach
            }
            document.getElementById("unit").value = val;
            document.getElementById("wono").value = linewono;
            document.getElementById("sku").value = linesku;
            document.getElementById("max_qty").value = linemax;
            document.getElementById("exp_date").value = lineexp;
            document.getElementById("qty").value = linemax;
            // document.getElementById("qty").select();
        }
        setTimeout(function () {
            // var obj = document.getElementById("qty")
            // if(obj.value=='') {
            //     obj.value=document.getElementById("max_qty").value;
            // }
            // obj.select();
            var obj = document.getElementById("unit");
            if(obj.value != '') {
                document.getElementById("line").value = obj.value;
                document.getElementById("line").click();
                document.getElementById("qty").select();
            }
        }, 100);
</script>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">{{ __('Pengepakan FG ke Pallet') }}</h1>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
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
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body text-capitalize">
                        <form id="frm" action="{{ route('production.save-new') }}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-xs-10 col-sm-10 col-md-10">
                                    <input type="hidden" name="src" readonly value="{{ route('production.init-add') }}">
                                    <input type="hidden" name="site" readonly value="{{ $m_site[0]->site }}">
                                    <input type="hidden" id="unit" name="unit" readonly
                                        value="{{ old('line', $unit) }}">
                                    <input type="hidden" id="wono" name="wono" readonly>
                                    <input type="hidden" id="sku" name="sku" readonly>
                                    <table width=100%>
                                        <tr>
                                            <td width=40%>
                                                <div class="form-group">
                                                    <label for="site"><strong>Lokasi</strong></label>
                                                    <input type="text" readonly value="{{ $m_site[0]->site_name }}"
                                                        class="form-control">
                                                </div>
                                            </td>
                                            <td width=5%>
                                            </td>
                                            <td width=25%>
                                                <div class="form-group">
                                                    <label for="batch">Nomor Batch</label>
                                                    <input type="text" name="batch" readonly value="{{ $batch }}"
                                                        class="form-control">
                                            </td>
                                            <td width=5%>
                                            </td>
                                            <td width=25%>
                                                <div class="form-group">
                                                    <label for="today">Tgl Produksi</label>
                                                    <input type="text" name="today" readonly value="{{ $today }}"
                                                        class="form-control">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan=3>
                                                <div class="form-group">
                                                <label for="line"><strong>Jalur Mesin - SKU</strong></label>
                                                <select class="form-control" required id="line" name="line"
                                                onclick="lineChanged(this.value)" !type="text">
                                                @for($i=1; $i<=$line; $i++) @foreach($woItems AS $item)
                                                @if ($i==$item->unit)
                                                <option value="{{ $i }},{{ $item->sku }},{{ $item->status }}">Jalur {{ $i }} -
                                                {{ $item->prod_date }} -
                                                {{ $item->wo_seq }} -
                                                {{ $item->sku }} -
                                                {{ $item->sku_name }}
                                                </option>
                                                @endif
                                                @endforeach
                                                @endfor
                                                </select>
                                                </div>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="exp_date">Tgl Kadaluarsa</label>
                                                    <input type="text" id="exp_date" name="exp_date" readonly
                                                        class="form-control">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr valign=bottom>
                                            <td>
                                                <div class="form-group">
                                                    <label for="qty">Jumlah Karton</label>
                                                    <table>
                                                        <tr>
                                                            <td><input type="text" id="qty" name="qty" required
                                                                    class="form-control"></td>
                                                            <td width=32 align=center>/</td>
                                                            <td><input type="text" id="max_qty" name="max_qty" readonly
                                                                    class="form-control"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="pallet">nomor pallet</label>
                                                    <input type="text" id="pallet" name="pallet" required
                                                        class="form-control">
                                                </div>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                                <div class="mt-3 mb-3 float-right">
                                                    <button type="submit" class="btn btn-sm btn-primary">Klik di
                                                        sini<br>- atau -<br>tekan <b>Enter</b></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan=5>
                                                <br><br><hr>
                                                <script>
                                                    function xxxx() {
                                                        //var unit = document.getElementById('unit').value;
                                                        //var sku = document.getElementById('sku').value;
                                                        //var wono = document.getElementById('wono').value;
                                                    
                                                        var url = "{{ url('shiftends/ends') }}";//?unit=" + encodeURIComponent(unit) + "&sku=" + encodeURIComponent(sku) + "&wo_no=" + encodeURIComponent(wono);
                                                        var obj = document.getElementById('frm');
                                                        obj.action = url;
                                                        obj.submit();

                                                        //window.location.href = url;
                                                    }
                                                </script>
                                                <button class="btn btn-sm btn-danger text-capitalize mulai-btn" onclick="xxxx()">Shift Ends</button>
                                                {{-- <a class="btn btn-sm btn-danger text-capitalize mulai-btn" href="javascript:void(0);" onclick="xxxx()">Shift Ends</a> --}}
                                            </td> 
                                        </tr>
                                    </table>
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