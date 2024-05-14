@extends('layouts.app')

@section('title', 'Request Order')

@section('content')



    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        Request Order Approved by HR
                    </div>
                </div>
            </div>
 
            <!-- Sorting Form -->
        <div class="row mb-3">
            <div class="col-lg-12">
                <form action="{{ route('HRApproved.filter') }}" method="GET">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="sr-only" for="sortColumn">Sort By</label>
                            <select class="form-control" id="sortColumn" name="sortColumn">
                                <option value="doc_ro">NO RO</option>
                                <option value="doc_date">Tanggal RO</option>
                                {{-- <option value="dept_name">Nama Departement</option> --}}
                                <!-- Add more options for other columns if needed -->
                            </select>
                        </div>
                        <div class="col-auto">
                            <label class="sr-only" for="sortOrder">Sort Order</label>
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
                                        <th>NO RO</th>
                                        <th>tanggal RO</th>
                                        <th>Nama Departement</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hr as $ap)
                                        <tr>
                                            <td>{{ $ap->doc_ro }}</td>
                                            <td>{{ $ap->doc_date }}</td>
                                            <td>{{ $ap->dept_name }}</td>

                                            <td>
                                                @php
                                                    $statusText = [
                                                        0 => 'Permohonan Baru',
                                                        1 => 'Disetujui Atasan',
                                                        2 => 'Disetujui Dept. ' . $ap->dept_name,
                                                        3 => 'Disediakan Dept. ' . $ap->dept_name,
                                                        4 => 'Rejected by Direct Superior'. $ap->dept_name,
                                                        5 => 'Rejected by Providing Department'. $ap->dept_name,
                                                        6 => 'Rejected by Providing Department'. $ap->dept_name,
                                                        7 => 'Rejection Acknowledged',
                                                        8 => 'Accepted by Requesting User',
                                                    ];
                                                @endphp
                                                {{ $statusText[$ap->status] }}
                                            </td>


                                             <td>

                                                {{-- <a class="btn btn-secondary far fa-eye "
                                                href="ROApproved/{{ $ap->doc_ro }}/show" title="Show Data"></a> --}}

                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a class="btn btn-info far fa-edit"
                                                        href="HRApproved/{{$ap->doc_ro}}/show " title="Approved"></a>
                                                </div>
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
    <!-- /.content -->
@endsection
