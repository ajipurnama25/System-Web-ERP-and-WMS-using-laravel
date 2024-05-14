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

            <!-- Sorting Form -->
            <div class="row mb-3 justify-content-end">
                <div class="col-lg-4 col-md-2">
                    <form action="{{ route('report.filter') }}" method="GET">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <label class="sr-only" for="sortColumn">Sort By</label>
                                <select class="form-control" id="sortColumn" name="sortColumn">
                                    <option value="doc_ro">NO SKU</option>
                                    <option value="doc_date">Tanggal </option>
                                    {{-- <option value="dept_name">Nama Departement</option> --}}
                                    <!-- Add more options for other columns if needed -->
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
            <!-- End Sorting Form -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">Date</th>
                                        <th style="text-align: center">SKU</th>
                                        <th style="text-align: center">Purchase Inbound Qty</th> {{-- pembelian yang masuk --}}
                                        <th style="text-align: center">Transfer Inbound Qty</th> {{-- tf yang masuk --}}
                                        <th style="text-align: center">Transfer Outbound Qty</th> {{-- tf yang keluar --}}
                                        <th style="text-align: center">Consume Outbound Qty</th> {{-- jumlah penggunaaan yang dikeluarkan --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($rept as $index => $item) --}}
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
                                                <!-- Modal untuk purchin_qty -->
                                                <a href="#" data-toggle="modal"
                                                    data-target="#myModalPurchinQty{{ $rep->sku }}">
                                                    {{ $rep->purchase }}
                                                </a>
                                                <!-- Modal Purchin Qty -->
                                                <div class="modal fade" id="myModalPurchinQty{{ $rep->sku }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabelPurchinQty{{ $rep->sku }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"
                                                                    id="myModalLabelPurchinQty{{ $rep->sku }}">
                                                                    @php
                                                                        $skuData = explode(',', $rep->sku);
                                                                        $skuNameData = explode(',', $rep->sku_name);
                                                                    @endphp

                                                                    @for ($i = 0; $i < count($skuData); $i++)
                                                                        SKU: {{ $skuData[$i] }} - SKU Name:
                                                                        {{ $skuNameData[$i] }}<br>
                                                                    @endfor
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <!-- Tampilkan informasi detail Purchase Inbound Qty di sini -->
                                                                {{ $combinedResult }}

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <!-- Tambahkan modal untuk tfin_qty, tfout_qty, dan consout_qty sesuai dengan pola yang sama -->
                                            <td>
                                                <!-- Modal untuk tfin_qty -->
                                                <a href="#" data-toggle="modal"
                                                    data-target="#myModalTfinQty{{ $rep->sku }}">
                                                    {{ $rep->inbound }}
                                                </a>
                                                <!-- Modal Tfin Qty -->
                                                <div class="modal fade" id="myModalTfinQty{{ $rep->sku }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabelTfinQty{{ $rep->sku }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"
                                                                    id="myModalLabelTfinQty{{ $rep->sku }}">
                                                                    @php
                                                                        $skuData = explode(',', $rep->sku);
                                                                        $skuNameData = explode(',', $rep->sku_name);
                                                                    @endphp

                                                                    @for ($i = 0; $i < count($skuData); $i++)
                                                                        SKU: {{ $skuData[$i] }} - SKU Name:
                                                                        {{ $skuNameData[$i] }}<br>
                                                                    @endfor
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Tampilkan informasi detail Transfer Inbound Qty di sini -->
                                                                {{ $combinedResult }}
                                                             
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <!-- Tambahkan modal untuk tfout_qty dan consout_qty sesuai dengan pola yang sama -->
                                            <td>
                                                <!-- Modal untuk tfout_qty -->
                                                <a href="#" data-toggle="modal"
                                                    data-target="#myModalTfoutQty{{ $rep->sku }}">
                                                    {{ $rep->outbound }}
                                                </a>
                                                <!-- Modal Tfout Qty -->
                                                <div class="modal fade" id="myModalTfoutQty{{ $rep->sku }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabelTfoutQty{{ $rep->sku }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"
                                                                    id="myModalLabelTfoutQty{{ $rep->sku }}">
                                                                    @php
                                                                        $skuData = explode(',', $rep->sku);
                                                                        $skuNameData = explode(',', $rep->sku_name);
                                                                    @endphp

                                                                    @for ($i = 0; $i < count($skuData); $i++)
                                                                        SKU: {{ $skuData[$i] }} - SKU Name:
                                                                        {{ $skuNameData[$i] }}<br>
                                                                    @endfor
                                                                </h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Tampilkan informasi detail Transfer Outbound Qty di sini -->
                                                                {{-- {{ $rept }} --}}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <!-- Tambahkan modal untuk consout_qty sesuai dengan pola yang sama -->
                                            <td>
                                                <!-- Modal untuk consout_qty -->
                                                <a href="#" data-toggle="modal"
                                                    data-target="#myModalConsoutQty{{ $rep->sku }}">
                                                    {{ $rep->consume }}
                                                </a>
                                                <!-- Modal Consout Qty -->
                                                <div class="modal fade" id="myModalConsoutQty{{ $rep->sku }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabelConsoutQty{{ $rep->sku }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"
                                                                    id="myModalLabelConsoutQty{{ $rep->sku }}">Detail
                                                                    Consume Outbound Qty</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Tampilkan informasi detail Consume Outbound Qty di sini -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div id="result-container">
        <!-- Hasil dari AJAX akan ditampilkan di sini -->
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            // Membuat permintaan AJAX saat dokumen siap
            $.ajax({
                url: "{{ route('report.getAjax') }}", // Ganti dengan URL rute yang sesuai di Laravel
                method: "GET",
                data: {
                    rpt: '{{ $combinedResult }}',
                },
                dataType: "json",
                cache: false,
                success: function(response) {
                    // Menampilkan hasil AJAX di dalam kontainer
                    $("#content").html(response);
                },
                error: function(error) {
                    console.error(error);
                },
            });
        });
        $(document).ready(function() {
            callAjax();

            setTimeout(function() {
                // var obj = document.getElementById("line");
                // if (document.getElementById("line").value != '') {
                //     obj.value = document.getElementById("line").value;
                // } else {
                //     obj.selectedIndex = 1;
                // }
            }, 100);
        });
    </script>


@endsection
