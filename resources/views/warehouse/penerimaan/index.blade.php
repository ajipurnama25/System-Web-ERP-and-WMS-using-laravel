@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">{{ __('Penerimaan Finished Goods Hasil Produksi') }}</h1>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" !style="padding: 1.3em">
                        <div class="card-body p-0">
                            <table class="table text-capitalize">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>PID</th>
                                        <th>SKU</th>
                                        <th>Exp. Date</th>
                                        <th>qty</th>
                                        <th>pallet</th>
                                        <th>QC Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($products AS $product)
                                        <tr>
                                            <td>{{ $no++; }}</td>
                                            <td>{{ $product->pid; }}</td>
                                            <td>{{ $product->sku }} - {{ $product->sku_name }}</td>
                                            <td>{{ date('Y-m-d', strtotime($product->exp_date)) }}</td>
                                            <td>{{ $product->qty; }}</td>
                                            <td>{{ $product->pallet; }}</td>
                                            <td><select onchange="this.parentNode.nextSibling.childNodes[0].href=this.parentNode.nextSibling.childNodes[0].href.slice(0,-1)+this.value;" class="form-select" aria-label="Default select example">
                                                <option value="-">-</option>
                                                <option value="0">Released</option>
                                                <option value="1">Hold</option>
                                              </select>
                                            </td><td><a href="{{ route('warehouse.penerimaanfg', ['id' => $product->doc_no, 'status' => '-']) }}" class="btn btn-primary">Terima</a></td>
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
    <!-- /.content -->
@endsection


