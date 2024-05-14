@extends('layouts.app')

@section('title', 'Request Order')

@section('content')



    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        Request Order
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <a href="RO/create" class="btn btn-success"><i class="fa fa-plus-circle nav-icon"></i>
                        Request Order</a>
                </div>
                <div class="col-lg-6">
                    &nbsp;
                </div>
            </div>

            <!-- Sorting Form -->
            <div class="row mb-3 justify-content-end">
                <div class="col-lg-5 col-md-5">
                    <form action="{{ route('RO.filter') }}" method="GET">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <label class="sr-only" for="sortColumn">Sort By</label>
                                <select class="form-control" id="sortColumn" name="sortColumn">
                                    <option value="doc_ro">NO RO</option>
                                    <option value="doc_date">Tanggal RO</option>
                                    <option value="dept_name">Nama Departement</option>
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
                                        <th>Accepted</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($depts as $dep)
                                        <tr>
                                            {{-- <td>{{ $dep->req_desc }}</td> --}}
                                            <td>{{ $dep->doc_ro }}</td>
                                            <td>{{ $dep->doc_date }}</td>
                                            <td>{{ $dep->dept_name }}</td>

                                            <td>
                                                @php
                                                    $statusText = [
                                                        0 => 'Permohonan Baru',
                                                        1 => 'Disetujui Atasan',
                                                        2 => 'Disetujui Dept. ' . $dep->dept_name,
                                                        3 => 'Disediakan Dept. ' . $dep->dept_name,
                                                        4 => 'Rejected by Direct Superior' . $dep->dept_name,
                                                        5 => 'Rejected by Providing Department' . $dep->dept_name,
                                                        6 => 'Rejected by Providing Department' . $dep->dept_name,
                                                        7 => 'Rejection Acknowledged',
                                                        8 => 'Accepted by Requesting User',
                                                    ];
                                                @endphp
                                                {{ $statusText[$dep->status] }}
                                            </td>


                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a class="btn btn-info far fa-edit"
                                                        href="RO/{{ $dep->doc_ro }}/edit "title="Edit User"></a>&ensp;


                                                    <a class="btn btn-secondary far fa-eye "
                                                        href="/RO/{{ $dep->doc_ro }}/view" title="User Detail"></a>
                                                    &ensp;

                                                    <form action="{{ route('RO.destroy', $dep->doc_ro) }}" method="POST">
                                                        @csrf
                                                        @method('delete')

                                                        @if ($dep->status > 0)
                                                            <button type="submit" class="btn btn-danger fa fa-trash"
                                                                title="User delete" type="submit" value="delete"
                                                                disabled></button>
                                                            {{-- <input class="btn btn-danger" title="User delete" type="submit" value="delete" disabled>   --}}
                                                        @else
                                                            {{-- <input class="btn btn-danger fa fa-trash" title="User delete"
                                                                type="submit" value="delete"> --}}
                                                            <button type="submit" class="btn btn-danger" title="User delete" type="submit" value="delete"><i
                                                                    class="fa fa-trash"></i></button>
                                                        @endif
                                                    </form>
                                                    &ensp;
                                                    
                                                </div>
                                            </td>
                                            <td>
                                                <a class="btn btn-success fa fa-check-circle nav-icon"
                                                href="/RO/{{ $dep->doc_ro }}/accepted" title="accepted"></a> 
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
