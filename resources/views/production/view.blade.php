@extends('layouts.app')
@section('content')
    <!-- content -->
    {{-- <script>
        var linewono = "";
        var linesku = "";
        var linename = "";
        var lineexp = "";
        var linemax = "";

        function lineChanged(val) {
            linewono = "";
            linesku = "";
            linename = "";
            lineexp = "";
            linemax = "";
            switch (val) {
                @foreach ($woItems as $item)
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
        setTimeout(function() {
            // var obj = document.getElementById("qty")
            // if(obj.value=='') {
            //     obj.value=document.getElementById("max_qty").value;
            // }
            // obj.select();
            var obj = document.getElementById("unit");
            if (obj.value != '') {
                document.getElementById("line").value = obj.value;
                document.getElementById("line").click();
                document.getElementById("qty").select();
            }
        }, 100);
    </script> --}}


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0">Data Pengepakan FG ke Pallet</h1>
                </div><!-- /.col -->
                <div align=right class="col-sm-4">
                    @can('create po')
                        <a href="{{ route('production.index') }}" class="btn btn-secondary">
                            <i class="fa fa-chevron-left nav-icon"></i> &nbsp; Kembali </a>
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


                            {{-- <div id="success-message" class="alert alert-success" style="display: none;">
                                Data berhasil tersimpan.
                            </div> --}}

                         <form id="pallet" action="{{ url('/production/update') }}" method="POST">


                            {{-- <form id="frm" action="{{ route('production.save-new') }}" method="POST"> --}}
                            {{-- <form action="{{ url('/production/view') }}" method="GET"> --}}

                                   
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-xs-10 col-sm-10 col-md-10">
                                    {{-- <input type="hidden" name="src" readonly value="{{ route('production.init-add') }}"> --}}
                                    {{-- <input type="hidden" name="site" readonly value="{{ $m_site[0]->site }}">
                                    <input type="hidden" id="unit" name="unit" readonly
                                        value="{{ old('line', $unit) }}">
                                    <input type="hidden" id="wono" name="wono" readonly>
                                    <input type="hidden" id="sku" name="sku" readonly> --}}
                                    <table width=100%>
                                        <tr>
                                            <td width=40%>
                                                <div class="form-group">
                                                    <label for="site"><strong>Lokasi</strong></label>
                                                     <input type="text" name="site" readonly id="site" 
                                                         value="{{ $t_production[0]->site_name }}" class="form-control"> 

                                                         <input type="hidden" name="site" id="site" 
                                                         value="{{ $t_production[0]->site }}" class="form-control">
                                                </div>
                                            </td>
                                            <td width=5%>
                                            </td>
                                            <td width=25%>
                                                <div class="form-group">
                                                    <label for="batch">Nomor Batch</label>
                                                    <input type="text" name="batch" readonly
                                                        value="{{ $t_production[0]->batch }}" class="form-control">
                                            </td>
                                            <td width=5%>
                                            </td>
                                            <td width=25%>
                                                <div class="form-group">
                                                    <label for="today">Tgl Produksi</label>
                                                    <input type="text" name="today" readonly
                                                        {{-- value="{{ $today }}" class="form-control"> --}}
                                                        value="{{ $t_production[0]->created_at }}" class="form-control">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan=3>
                                                <div class="form-group">
                                                    <label for="line"><strong>Jalur Mesin - SKU</strong></label>
                                                    <input type="text" name="sku" readonly
                                                    {{-- value="{{ $today }}" class="form-control"> --}}
                                                    value="{{ $t_production[0]->sku }}" class="form-control">
                                            </div>
                                                    {{-- <select class="form-control" required id="line" name="line"
                                                        onclick="lineChanged(this.value)" !type="text">
                                                        @for ($i = 1; $i <= $line; $i++)
                                                            @foreach ($woItems as $item)
                                                                {{-- <script>
                                                            alert("{{$line}} - {{ $i }} - {{$item->unit}} - {{ $item->sku }}");
                                                        </script> --}}
                                                                {{-- @if ($i == $item->unit)
                                                                    <option value="{{ $i }}">Jalur
                                                                        {{ $i }} -
                                                                        {{ $item->prod_date }} -
                                                                        {{ $item->wo_seq }} -
                                                                        {{ $item->sku }} -
                                                                        {{ $item->sku_name }}
                                                                    </option>
                                                                @break
                                                            @endif
                                                        @endforeach
                                                    @endfor --}}
                                                {{-- </select> --}} 
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="exp_date">Tgl Kadaluarsa</label>
                                                <input type="text" id="exp_date" name="exp_date" readonly
                                                    value="{{ $t_production[0]->exp_date }}" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr valign=bottom>
                                        <td>
                                            <div class="form-group">
                                                <label for="qty">Jumlah Karton</label>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="qty" readonly
                                                                value="{{ $t_production[0]->qty }}"
                                                                class="form-control"></td>
                                                        <td width=32 align=center>/</td>
                                                        <td><input type="text" id="max_qty" name="max_qty"
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
                                                <input type="text" id="pallet" name="pallet" readonly
                                                    value="{{ $t_production[0]->pallet }}" class="form-control">
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
                                    
                                </table>
                    </form>           
                            </div>
                        </div>
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
    // // Function to show the success message
    // function showSuccessMessage() {
    //     document.getElementById("success-message").style.display = "block";
    //     setTimeout(function() {
    //         document.getElementById("success-message").style.display = "none";
    //     }, 3000); // Hide the message after 3 seconds
    // }

    // // Attach an event listener to the form submission
    // document.addEventListener("DOMContentLoaded", function() {
    //     const form = document.getElementById("pallet"); // Replace "your-form-id" with the actual form ID
    //     form.addEventListener("submit", function(event) {
    //         event.preventDefault(); // Prevent the default form submission
    //         // You can add your AJAX code here to send the form data to the server
    //         // After successfully updating the data, call the showSuccessMessage function
    //         showSuccessMessage();
    //     });
    // });
</script>
@endsection
