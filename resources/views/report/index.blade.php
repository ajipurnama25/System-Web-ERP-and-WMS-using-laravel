@extends('layouts.app')

@section('title', 'Request Order')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        Item Report
                    </div>
                </div>
            </div>

           <!-- Filtering Form -->
           <div class="row mb-3 justify-content-end">
            <div class="col-lg-5 col-md-2">
                <form action="{{ route('report.filter') }}" method="GET">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="sr-only" for="sortColumn">Sort By</label>
                            <select class="form-control" id="sortColumn" name="sortColumn">
                                <option value="sku">NO SKU</option>
                                <option value="delv_date">Tanggal</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <label class="sr-only" for="sortOrder">Sort report</label>
                            <select class="form-control" id="sortOrder" name="sortOrder">
                                <option value="asc">Ascending</option>
                                <option value="desc">Descending</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Sort</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Filtering Form -->

            <a href="{{ url('report/exportAllToExcel') }}" class="btn btn-success">Export to Excel</a>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">Date</th>
                                        <th style="text-align: center">SKU</th>
                                        <th style="text-align: center">Purchase Inbound Qty</th>
                                        <th style="text-align: center">Transfer Inbound Qty</th>
                                        <th style="text-align: center">Transfer Outbound Qty</th>
                                        <th style="text-align: center">Consume Outbound Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($combinedResult as $rep)
                                        <tr>
                                            <td>{{ $rep->delv_date }}</td>
                                            <td>
                                                @php
                                                    $skuData = explode(',', $rep->sku);
                                                    $skuNameData = explode(',', $rep->sku_name);
                                                @endphp

                                                @for ($i = 0; $i < count($skuData); $i++)
                                                    SKU: {{ $skuData[$i] }} - SKU Name: {{ $skuNameData[$i] }}<br>
                                                @endfor
                                            </td>

                                            <td>
                                                <!-- Modal untuk purchase_qty -->
                                                @if ($rep->purchase > 0)
                                                    <a href="#" style="text-align: right; float: right;"
                                                        onClick="detailReport('{{ $rep->sku }}', '{{ $rep->delv_date }}', 'Purchase', '{{ Auth::user()->site }}')"
                                                        data-toggle="modal" data-target="#myModalgeneral">
                                                        {{ $rep->purchase }}
                                                    </a>
                                                @else
                                                    {{ $rep->purchase }}
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Modal untuk transfer_qty -->
                                                @if ($rep->inbound > 0)
                                                    <a href="#" style="text-align: right; float: right;"
                                                        onClick="detailReport('{{ $rep->sku }}', '{{ $rep->delv_date }}', 'Inbound', '{{ Auth::user()->site }}')"
                                                        data-toggle="modal" data-target="#myModalgeneral">
                                                        {{ $rep->inbound }}
                                                    </a>
                                                @else
                                                    {{ $rep->inbound }}
                                                @endif
                                            </td>
                                            <td style="text-align: right; float: right;">
                                                <!-- Modal untuk transfer_outbound_qty -->
                                                @if ($rep->outbound > 0)
                                                    <a href="#" style="text-align: right; float: right;"
                                                        onClick="detailReport('{{ $rep->sku }}', '{{ $rep->delv_date }}', 'Outbound', '{{ Auth::user()->site }}')"
                                                        data-toggle="modal" data-target="#myModalgeneral">
                                                        {{ $rep->outbound }}
                                                    </a>
                                                @else
                                                    {{ $rep->outbound }}
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Modal untuk consume_outbound_qty -->
                                                @if ($rep->consume > 0)
                                                    <a href="#" style="text-align: right; float: right;"
                                                        onClick="detailReport('{{ $rep->sku }}', '{{ $rep->delv_date }}', 'Consume', '{{ Auth::user()->site }}')"
                                                        data-toggle="modal" data-target="#myModalgeneral">
                                                        {{ $rep->consume }}
                                                    </a>
                                                @else
                                                    {{ $rep->consume }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModalgeneral" tabindex="-1" role="dialog" aria-labelledby="hapusDataLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Detail Report : <span id='modalTitleGeneral' style="text-transform: uppercase;"></span></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="400px">SKU</th>
                                        <th width="400px">Nama Barang</th>
                                        <th width="200px">Jumlah</th>
                                        <th width="200px">Kode Barang</th>
                                        <th width="200px">Satuan</th>
                                    </tr>
                                </thead>
                                <tbody id="content">
                                </tbody>
                            </table>
                            {{-- <h6 align="center"><span id='modalSite'
                                    style="text-transform: uppercase; item-align:center"></span></h6> --}}
                            {{-- <div align="center">
                                <a href="#" id="exportToExcelLink" class="btn btn-success">Export to Excel</a>
                            </div> --}}
                        </div>
                        <div class="row">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="#" id="exportToExcelLink" class="btn btn-success">Export to Excel</a>
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-end">
                    </div>

                </div>
            </div>

            <div class="col-lg-12">
                {{-- <a href="{{ route('report.exportAllToExcel', ['date' => $filterDate, 'sku' => $filterSku]) }}" class="btn btn-success">Export to Excel</a> --}}
                {{-- <a href="#" id="exportAllToExcel" class="btn btn-success">Export to Excel</a> --}}
            </div>

            <script>
                function detailReport(sku, tgl, type, site) {
                    if (sku === '#') {
                        return false;
                    }
                    $.ajax({
                        url: "{{ url('report/getAjax') }}",
                        method: "GET",
                        data: {
                            sku: sku,
                            delv_date: tgl,
                            type: type,
                            site: site, // Mengirim jenis kolom ke controller
                        },
                        dataType: "json",
                        cache: false,
                        success: function(response) {
                            console.log(response);
                            var modalTitle = $("#modalTitleGeneral");
                            var modalBody = $("#content");
                            // var modalSite = $("#modalSite");
                            var exportToExcelLink = $("#exportToExcelLink");
                            var exportAllToExcel = $("#exportAllToExcel");

                            // Reset modal content
                            modalTitle.text("Detail Report");
                            modalBody.empty(); // Kosongkan isi modal sebelum menambahkan data baru

                            // Tambahkan data ke modal
                            $.each(response, function(key, item) {
                                var tableSub = '<tr>';
                                tableSub += '<td>' + item.sku + '</td>';
                                tableSub += '<td>' + item.sku_name + '</td>';
                                tableSub += '<td>' + item.qty + '</td>';
                                tableSub += '<td>' + item.code + '</td>';
                                tableSub += '<td>' + item.uom + '</td>';
                                tableSub += '</tr>';
                                modalBody.append(tableSub);
                            });

                            // Tampilkan modal
                            $('#myModalgeneral').modal('show');

                            // Tampilkan tombol "Export to Excel"
                            var button = "<a href='{{ url('report/exportToExcel') }}/" + sku + "/" + tgl + "/" + type +
                                "/" + site + "' class='btn btn-info'>Eksport Excel</a>";
                            exportToExcelLink.html(button);

                            
                        },
                        error: function(error) {
                            console.error(error);
                            alert(error.message);
                        },
                    });
                }
            </script>
        </div>
    </div>
@endsection
