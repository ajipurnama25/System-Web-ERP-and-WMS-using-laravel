@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Transfer Stock') }}</h1>
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
                        Need Approval of Request Transfer Stock
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4">
                                    <form method="GET" enctype="multipart/form-data" id="form_id">
                                        <div class="form-group">
                                            <label for="kode"><strong>Transfer Dari :</strong></label>
                                            <select class="form-control text-capitalize select2" onchange="document.getElementById('form_id').submit();" data-live-search="true" id="site" name="site" type="text">
                                                @php
                                                    $array = ['Produksi', 'Site'];
                                                @endphp
                                                @foreach ($array as $data)
                                                    <option value="{{ $data }}" @if ($data == $_GET['site']) { selected } @endif>{{ $data }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-8" align="right">
                                    <button type="button" id="btnPrint" class="btn btn-warning" onclick="btnPickingList()"><i class="fa fa-print nav-icon"></i>&nbsp;Print Picking List</button>
                                    <button type="button" data-toggle="modal" class="btn btn-info" id="getOutbound" onclick="btnOutbound()" data-target="#Outbound_modal"><i class="fa fa-edit nav-icon"></i>&nbsp;Entry Outbound</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table" id="">
                                <thead>
                                    <tr style="text-align: center">
                                        {{-- @if ($_GET['site'] == 'MySite') --}}
                                        <th width="50px" style="text-align: center;"><input style="transform: scale(1.2);" id="checkAll" type="checkbox"></th>
                                        {{-- @endif --}}
                                        <th style="text-align: center">Doc Trf</th>
                                        <th style="text-align: center">Pengirim</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Tgl Permintaan</th>
                                        <th style="text-align: center">Tgl Pengiriman</th>
                                        <th style="text-align: center">Penerima</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tr_stock as $key => $value)
                                        @php
                                            $today = date('Y-m-d');
                                            $tomorrow = date('Y-m-d', strtotime('+1 day'));
                                            
                                            if ($value->delv_date == $today || $value->delv_date == $tomorrow) {
                                                $bg = 'background-color:#F9C8C8;';
                                            } else {
                                                $bg = '';
                                            }
                                        @endphp
                                        <tr style="text-align: center; {{ $bg }}">
                                            {{-- @if ($_GET['site'] == 'MySite') --}}
                                            @if ($value->status < 2)
                                                <td align="center"><input style="transform: scale(1.2);" disabled type="checkbox" name="checklist" class="checklist_disable" value="{{ $value->doc_trf . '-' . $value->serv_site . '-' . $value->req_site }}"></td>
                                            @else
                                                <td align="center"><input style="transform: scale(1.2);" type="checkbox" name="checklist" class="checklist" value="{{ $value->doc_trf . '-' . $value->serv_site . '-' . $value->req_site }}"></td>
                                            @endif
                                            {{-- @endif --}}
                                            <td>{{ $value->doc_trf }}</td>
                                            <td>{{ $value->m2 }}</td>
                                            <td>

                                                @if ($value->status == 1)
                                                    <button class="btn btn-outline-info btn-sm" style="pointer-events: none">Waiting for Approval</button>
                                                @elseif($value->status == 2)
                                                    <button class="btn btn-outline-success btn-sm" style="pointer-events: none">Approved</button>
                                                @elseif($value->status == 3)
                                                    <button class="btn btn-outline-warning btn-sm" style="pointer-events: none">Outbound Done</button>
                                                @elseif($value->status == 4)
                                                    <button class="btn btn-outline-primary btn-sm" style="pointer-events: none">Inbound Done</button>
                                                @else
                                                    <button class="btn btn-outline-danger btn-sm" style="pointer-events: none">Rejected</button>
                                                @endif
                                            </td>
                                            <td>{{ date('d M Y', strtotime($value->req_date)) }}</td>
                                            <td>

                                                {{ date('d M Y', strtotime($value->delv_date)) }}
                                            </td>
                                            @if ($_GET['site'] == 'Produksi')
                                                <td>Gudang Produksi</td>
                                            @else
                                                <td>{{ $value->m1 }}</td>
                                            @endif
                                            <td>
                                                <a href="{{ route('requestStock.view', ['doc_trf' => $value->doc_trf, 'serv_site' => $value->serv_site, 'req_site' => $value->req_site]) }}" class="btn btn-info btn-xs">View</a>
                                                <a href="{{ route('requestStock.reportPicking', ['doc_trf' => $value->doc_trf, 'serv_site' => $value->serv_site, 'req_site' => $value->req_site]) }}" class="btn btn-warning btn-xs">Report Pick</a>
                                                <a href="{{ route('requestStock.outboundProduksi', ['doc_trf' => $value->doc_trf, 'serv_site' => $value->serv_site, 'req_site' => $value->req_site]) }}" class="btn btn-success btn-xs">Outbound</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
    <div class="modal fade" id="Outbound_modal" role="dialog">
        <div class="modal-dialog modal-xl">
            <!-- Modal content-->
            <div class="modal-content outbound-modal">
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var checkAllCheckbox = document.getElementById('checkAll');
            var checkboxes = document.getElementsByClassName('checklist');
            checkAllCheckbox.addEventListener('change', function() {
                var isChecked = checkAllCheckbox.checked;
                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = isChecked;
                }
            });
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].addEventListener('change', function() {
                    var isAllChecked = true;
                    for (var j = 0; j < checkboxes.length; j++) {
                        if (!checkboxes[j].checked) {
                            isAllChecked = false;
                            break;
                        }
                    }
                    checkAllCheckbox.checked = isAllChecked;
                });
            }
        });

        function btnPickingList() {
            var checkboxes = document.getElementsByClassName('checklist');
            var selectedValues = [];

            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    selectedValues.push(checkboxes[i].value);
                }
            }
            if (selectedValues != '') {

                var popup = window.open('/transfer-stock/printPickingList_x?data=' + selectedValues, '_blank', "width=800,height=480,toolbar=no,menubar=no,resizable=yes");
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Tidak ada baris yang terpilih',
                    html: 'pilih minimal 1 baris Transfer Stock untuk diprint!',
                });
            }
        }

        function btnOutbound() {
            var checkboxes = document.getElementsByClassName('checklist');
            var selectedValues = [];
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    selectedValues.push(checkboxes[i].value);
                }
            }
            if (selectedValues == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Tidak ada baris yang terpilih',
                    html: 'pilih minimal 1 baris Transfer Stock untuk dientry!',
                });
            } else {
                $('.outbound-modal').html('');
                $('#modal-loader').show();
                $.ajax({
                        url: "{{ route('requestStock.inputOutbound') }}?data=" + selectedValues,
                        // data: {
                        //     data: selectedValues,
                        // },
                        type: 'GET',
                        dataType: 'html'
                    })

                    .done(function(data) {

                        $('.outbound-modal').html('');
                        $('.outbound-modal').html(data); // load response 
                        $('#modal-loader').hide(); // hide ajax loader   
                        console.log(data);


                    })
                    .fail(function() {
                        $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                        $('#modal-loader').hide();
                    });
            }
        }
    </script>
@endsection
