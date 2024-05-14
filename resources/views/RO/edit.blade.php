@extends('layouts.app')

@section('title', 'Request Order')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0">Edit Request Order</h1>
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
                                            <select onchange="callAjax()" disabled class="form-control" required
                                                id="line" name="line">
                                                {{-- onchange="getDept();"> ==== comment --}}
                                                <option value="#">Pilih Departement</option>
                                                @foreach ($depts1 as $dept)
                                                    <option value="{{ $dept->dept }}"
                                                        @if ($dept_select == $dept->dept) selected @endif>
                                                        {{ $dept->dept_name }}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="doc_ro" value="{{ $t_ro }}"
                                                class="form-control" placeholder="">
                                            {{-- <input type=button onclick=callAjax() value=CLICK> commet --}}
                                        </div>
                                    </div>
                                </div>



                                <table id="table" class="table list" !style="display:none" align="right">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">Permintaan</th>
                                            <th style="text-align: center">Jumlah</th>
                                            <th style="text-align: center">Keterangan</th>
                                            <th></th>
                                        </tr>


                                    </thead>
                                    <tbody id="konten"></tbody>
                                </table>

                                @php
                                    if ($status == 0) {
                                        $st = 'display:block';
                                    } else {
                                        $st = 'display:none';
                                    }
                                @endphp

                                <div align=right class="col-sm-15">
                                    <button type="submit" style="{{ $st }}" class="btn btn-sm btn-primary"
                                        id="btn-pallet">Save</button>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
                    ro: '{{ $t_ro }}',
                },
                dataType: "json",
                cache: false,
                success: function(response) {
                    $('#konten').empty();
                    // form = '';
                    if (response.length > 0) {
                        jumlah = response.length;
                        $.each(response, function(i, item) {

                            // alert('--' + item.status + '__');
                            if (item.status != 0) {
                                var status = 'disabled';
                            }
                            // form += '--' + '<br>';
                            form = '<tr><td><input type="hidden" name="reqid[]" title="' + i +
                                '" value="' + item.req_id + '">' + item.req_desc + '</td>';
                            form += '<td><input ' + status + ' type="text" name="jml[]" value="' +
                                item.qty +
                                '"></td>';
                            form += '<td><input ' + status + ' type="text" name="ket[]" value="' + item
                                .rem +
                                '"></td>';
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
    </script>

@endsection
