@extends('layouts.app')

@section('styles')

@endsection

@section('title', 'Create Transfer Stock')

@section('content')
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Update Status Request') }} : {{ $tr_stock->doc_trf }}</h1>
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
                        Update Status Request
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="padding: 1.3em">
                        <div class="card-body p-0">
                            <form action="{{ route('requestStock.updateInbound') }}" method="POST" enctype="multipart/form-data" id="form-requestStock">
                                @csrf
                                <input type="hidden" value="{{ $tr_stock->req_site }}" name="req_site">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Inbound On</label>
                                            <input type="date" name="inbound_on" class="form-control" required>
                                            <input type="hidden" name="doc_trf" class="form-control" value="{{ $tr_stock->doc_trf }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Inbound By</label>
                                            <select class="form-control" name="inbound_by" required>
                                                <option value="">--SELECT --</option>
                                                @foreach($m_employee as $key => $value)
                                                    <option value="{{ $value->emp_id }}">{{ $value->emp_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Inbound Doc QC</label>
                                            <input type="text" name="inbound_doc_qc" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Inbound QC Checker</label>
                                            <select class="form-control" name="inbound_qc_checker" required>
                                                <option value="">--SELECT --</option>
                                                @foreach($m_employee as $key => $value)
                                                    <option value="{{ $value->emp_id }}">{{ $value->emp_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Doc Trf</th>
                                            <th rowspan="2">SKU</th>
                                            <th rowspan="2">UOM</th>
                                            <th rowspan="2">Exp Date</th>
                                            <th rowspan="2">Req QTY</th>
                                            <th rowspan="2">Acc QTY</th>
                                            <th>Received</th>
                                        </tr>
                                        <tr>
                                            <th>Good QTY</th>
                                            <th>Bad QTY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tr_stockItem as $key => $value)
                                            <tr>
                                                <td>{{ $value->doc_trf }}</td>
                                                <td>{{ $value->sku }}</td>
                                                <td>{{ $value->uom }}</td>
                                                <td>{{ date('d F Y', strtotime($value->exp_date)) }}</td>
                                                <td>{{ number_format($value->req_qty) }}</td>
                                                <td>{{ number_format($value->acc_qty) }}</td>
                                                <td><input type="number" name="skuGood[{{$value->sku}}]" class="form-control inputQty" data-max="{{ $value->acc_qty }}" required></td>
                                                <td><input type="number" name="skuBad[{{$value->sku}}]" class="form-control inputQty" data-max="{{ $value->acc_qty }}" required></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary ml-3" id="main-form">Submit</button>
                                <a class="btn btn-secondary" href="{{ route('sites.index') }}"><i class="fas fa-chevron-left"></i>Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')

<script>
    $(document).on('keyup', '.inputQty', function(){
        var sku = $(this).val();
        var max = $(this).data('max');

        if(sku < 0){
            $(this).val(0);
        }

        if(sku > max){
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Max Quantity is ' + max,
            });

            $(this).val(max);
        }
        
    });

    $(document).on('change', '.inputQty', function(){
        var sku = $(this).val();
        var max = $(this).data('max');

        if(sku < 0){
            $(this).val(0);
        }

        if(sku > max){
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Max Quantity is ' + max,
            });

            $(this).val(max);
        }
        
    });

</script>
@endsection
