@extends('layouts.app')

@section('title', 'Input Nomer Pallet')

@section('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <style>
        #form-gr {
            display: none;
        }

        .table td {
            vertical-align: top;
        }

        .table td div {
            padding-top: 7px;
        }
    </style>
@endsection



@section('content')
    <!-- content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0">Penerimaan FG Produksi</h1>
                </div><!-- /.col -->
                <div align=right class="col-sm-4">
                    @can('create po')
                        <a href="{{ route('production.init-add') }}" class="btn btn-secondary">
                            <i class="fa fa-chevron-left nav-icon"></i> &nbsp; Kembali ke Pengepakan FG Pallet
                        </a>
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
                <div class="col-lg-12">
                    <div class="card" style="padding: 1.3em">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-8">
                                    <div class="form-group">

                                      
                                         
                                         <form action="{{ url('/production/view') }}" method="GET">
                                        <div class="form-group">
                                            <label for="name"><strong>Nomor Pallet:</strong></label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="" name="pallet"
                                                    id="pallet" required> <br>

                                                
                                                    <div align= left class="col-sm-4"> 
                                                        <button type="submit" class="btn btn-sm btn-primary"
                                                            id="btn-pallet" !onclick="redirect()">Klik di
                                                            sini<br>- atau -<br>tekan <b>Enter</b></button>
                                                    </div>
                                            </div>

                                        </form>
                                            {{-- sampai disini --}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        // function redirect() {
        //     var pallet = document.getElementById('pallet').value;
        //     window.location.href = "{{ url('/production/view') }}/" + pallet;
        // }
        // $(document).on('click', '#btn-pallet', function(e) {
        //     var pallet = document.getElementById('pallet').value;
        //     $.ajax({
        //         type: "GET",
        //         url: "{{ url('/production/getPallet') }}",
        //         data: "pallet=" + pallet,
        //         dataType: "json",
        //         cache: false,
        //         success: function(response) {
        //             $('#konten').empty();
        //             $.each(response, function(key, item) {

        //                 tableSub = "<tr id='row'>";
        //                 tableSub += "<td>" + item.sku + "</td>";
        //                 tableSub += "<td>" + item.batch + "</td>";
        //                 tableSub += "<td>" + item.exp_date + "</td>";
        //                 tableSub += "<td>" + item.pallet + "</td>";
        //                 tableSub += "<td>" + item.pid + "</td>";
        //                 // tableSub += "<td><button class="btn btn-sm btn-primary" type="submit" id="btn-pallet" name="pallet"> Klik di
        //                 // sini<br>- atau -<br>tekan <b>Enter</b><a class='btn btn-secondary far fa-eye' href='{{ url('/production/view') }}/"+item.pallet+"' title='Detail Barang'></a></button></td>";
        //                 tableSub +=
        //                     "<td><a class='btn btn-sm btn-primary' href='{{ url('/production/view') }}/" +
        //                     item.pallet + "' title='Detail Barang'></a></td>";
        //                 tableSub += "</tr>";
        //                 $('#konten').append(tableSub);

        //             });
        //         }
        //     });
        // });
    </script>
@endsection
