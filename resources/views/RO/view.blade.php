@extends('layouts.app')

@section('title', 'Request Order')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0">View Data Request Order</h1>
                </div><!-- /.col -->
                <div align=right class="col-sm-4">
                    @can('create po')
                        <a href="{{ route('RO.index') }}" class="btn btn-secondary">
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
                    <script>
                        function lineChanged(par) {
                            alert('sff = ' + par);
                        }
                    </script>

                    <div class="card">
                        <div class="card-body text-capitalize">
                            <form action="{{ route('RO.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-xs-10 col-sm-10 col-md-10">
                                        <div class="form-group">
                                            <label for="line"><strong>Department</strong></label>
                                            <input type="text" name="doc_ro" value="{{ $dept_select }}"
                                                class="form-control" placeholder="" disabled>

                                        </div>
                                    </div>
                                </div>

                                <table id="table" class="table table-bordered" !style="display:none" align="right">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">Permintaan</th>
                                            <th style="text-align: center">Jumlah</th>
                                            <th style="text-align: center">Keterangan</th>
                                            
                                        </tr>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->req_desc }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->rem }}</td>
                                            </tr>
                                        @endforeach


                                    </thead>
                                    <tbody id="konten"></tbody>
                                </table>

                                {{-- <div align=right class="col-sm-15">
                                    <button type="submit" class="btn btn-sm btn-primary" id="btn-pallet">Save</button>
                                </div> --}}
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        function getDept() {
            var obj = document.getElementById("line").value;
            if (obj != '#') {
                $('#content').show();
            } else {
                $('#content').hide();
            }

        }

        function callAjax() {
            var obj = document.getElementById("line").value;
            var value = obj; //[0];
            if (value == '#') {
                return false;
            }
            $.ajax({
                type: "GET",
                url: "{{ url('RO/getRoAjax') }}",
                data: {
                    dept: '{{ $t_ro }}',
                },
                dataType: "json",
                cache: false,
                success: function(response) {
                    $('#konten').empty();
                    // form = '';
                    if (response.length > 0) {
                        jumlah = response.length;
                        $.each(response, function(i, item) {

                            if (item.status == 2) {
                                var status = 'disabled';
                            }
                            // form += '--' + '<br>';
                            form = '<tr><td><input type="hidden" name="reqid[]" title="' + i +
                                '" value="' + item.req_id + '">' + item.req_desc + '</td>';
                            form += '<td><input ' ' type="text" name="jml[]" value="' +item.qty + '"></td>';
                            form += '<td><input '' type="text" name="ket[]" value="' + item.rem + '"></td>';
                            form += '<td></td></tr>';
                            $('#konten').append(form);

                        });
                        // setTimeout(function() {
                        //     restore_data();
                        // }, 100);
                    }
                    // alert(form);
                }
            });
        }

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
    </script> --}}

@endsection
