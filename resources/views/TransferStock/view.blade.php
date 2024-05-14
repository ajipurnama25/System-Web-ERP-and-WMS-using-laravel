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
                        List of Request Transfer Stock
                    </div>
                </div>
            </div>
            <div class="row">
                @if($tt->serv_site == Auth::user()->site AND $tt->status == 1)
                <div class="col-sm-4">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Approve</button>
                        <button type="submit" value="reject" class="btn btn-danger" name="reject">Reject</button>
                    </form>
                </div>
                @endif

                @if($tt->serv_site == Auth::user()->site AND $tt->status == 2)
                <div class="col-sm-4">
                    <a href="{{ route('requestStock.inputOutbound', ['doc_trf' => $tt->doc_trf]) }}" class="btn btn-warning">Input Outbound</a>
                </div>
                @endif

                @if($tt->req_site == Auth::user()->site AND $tt->status == 3)
                <div class="col-sm-4">
                    <a href="{{ route('requestStock.inputInbound', ['doc_trf' => $tt->doc_trf]) }}" class="btn btn-warning">Input Inbound</a>
                </div>
                @endif
                <div class="col-sm-8">
                    &nbsp;
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="padding: 1.3em">
                        <div class="card-body p-0">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Doc. Transfer</td>
                                        <td>: {{ $tt->doc_trf }}</td>
                                    </tr>
                                    <tr>
                                        <td>Serv. Site</td>
                                        <td>: {{ $tt->m2 }}</td>
                                    </tr>
                                    <tr>
                                        <td>Req. Site</td>
                                        <td>: {{ $tt->m1 }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>: @if($tt->status == 1)
                                                    <button class="btn btn-info btn-sm" disabled>Waiting for Approval</button>
                                                @elseif($tt->status == 2)
                                                    <button class="btn btn-success btn-sm" disabled>Approved</button>
                                                @elseif($tt->status == 3)
                                                    <button class="btn btn-warning btn-sm" disabled>Receiving</button>
                                                @elseif($tt->status == 4)
                                                    <button class="btn btn-primary btn-sm" disabled>Received</button>
                                                @else
                                                    <button class="btn btn-danger btn-sm" disabled>Rejected</button>
                                                @endif</td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Doc Trf</th>
                                        <th>SKU</th>
                                        <th>UOM</th>
                                        <th>Exp Date</th>
                                        <th>Req QTY</th>
                                        @if($tt->status > 1)
                                            <th>ACC QTY</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tItem as $key => $value)
                                        <tr>
                                            <td>{{ $value->doc_trf }}</td>
                                            <td>{{ $value->sku }}</td>
                                            <td>{{ $value->uom }}</td>
                                            <td>{{ date('d F Y', strtotime($value->exp_date)) }}</td>
                                            <td>{{ number_format($value->req_qty) }}</td>
                                            @if($tt->status > 1)
                                                <td>{{ number_format($value->acc_qty) }}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br><br>
                            <hr>
                            @php
                                $arr = [
                                    1 => 12,
                                    2 => 6,
                                    3 => 4,
                                    4 => 3,
                                    99 => 6
                                ];
                            @endphp
                            <div class="row">
                                <div class="col-{{ $arr[$tt->status] }} text-center">
                                    <p>Request By:</p>
                                    <br>
                                    <br>
                                    <p>{{ $tt->req_by }}</p>
                                    <p><b><i>Submitted</i></b></p>
                                    <p>{{ date('d F Y', strtotime($tt->req_on)) }}</p>
                                </div>

                                @if($tt->acc_on !== NULL AND $tt->status > 1 AND $tt->status != 99)
                                    <div class="col-{{ $arr[$tt->status] }} text-center">
                                        <p>Response By:</p>
                                        <br>
                                        <br>
                                        <p>{{ $tt->acc_by }}</p>
                                        <p><b><i>{{ ($tt->status != 99 ? 'Approved' : 'Rejected') }}</i></b></p>
                                        <p>{{ date('d F Y', strtotime($tt->acc_on)) }}</p>
                                    </div>
                                @endif

                                @if($tt->outbound_on !== NULL AND $tt->status > 2 AND $tt->status != 99)
                                    <div class="col-{{ $arr[$tt->status] }} text-center">
                                        <p>Receiving By:</p>
                                        <br>
                                        <br>
                                        <p>{{ $tt->outbound_by }}</p>
                                        <p><b><i>Success</i></b></p>
                                        <p>{{ date('d F Y', strtotime($tt->outbound_on)) }}</p>
                                    </div>
                                @endif

                                @if($tt->inbound_on !== NULL AND $tt->status > 3 AND $tt->status != 99)
                                    <div class="col-{{ $arr[$tt->status] }} text-center">
                                        <p>Received By:</p>
                                        <br>
                                        <br>
                                        <p>{{ $tt->inbound_by }}</p>
                                        <p><b><i>Success</i></b></p>
                                        <p>{{ date('d F Y', strtotime($tt->inbound_on)) }}</p>
                                    </div>
                                @endif
                            </div>
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
    <!-- /.content -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Approve Request</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="{{ route('requestStock.action') }}">
            @csrf
            <input type="hidden" value="{{ $tt->doc_trf }}" name="doc_trf">
            <input type="hidden" value="{{ $tt->serv_site }}" name="serv_site">
          <div class="modal-body">     
            <table class="table">
                <thead>
                    <tr>
                        <th>Doc Trf</th>
                        <th>SKU</th>
                        <th>UOM</th>
                        <th>Exp Date</th>
                        <th>Req QTY</th>
                        <th>Acc QTY</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tItem as $key => $value)
                        <tr>
                            <td>{{ $value->doc_trf }}</td>
                            <td>{{ $value->sku }}</td>
                            <td>{{ $value->uom }}</td>
                            <td>{{ date('d F Y', strtotime($value->exp_date)) }}</td>
                            <td>{{ number_format($value->req_qty) }}</td>
                            <td><input type="number" name="sku[{{$value->sku}}]" class="form-control inputQty" data-max="{{ $value->req_qty }}" required></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
          </div>
          <div class="modal-footer">
            <button type="submit" value="approve" class="btn btn-success" name="approve">Approve</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          </form>
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