@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">{{ __('belajar') }}</h1>
    </div><!-- /.container-fluid -->
</div>

{{ $data }}
<br>
{{ $sql[0] }}
<br>
{{ $sql[1] }}
<br>
{{ $sql[1]->name }}
{{ $sql[0]->kode }}
{{ $sql[0]->name }}

<br><br>

<button onclick="document.location='sql-ins';">insert</button>
<a href="sql-updated">update</a>
<input type=button onclick="document.location='sql-delete';" value="delete">
{{-- <button>update</button>
<button>delete</button> --}}
<br> <br>

<div class="row">
    <div class="col-lg-6">
        <a href="sql/create" class="btn btn-success"><i class="fa fa-plus-circle nav-icon"></i>
            add</a>
    </div>
    <div class="col-lg-6">
        &nbsp;
    </div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>KODE</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sql as $s)
                            <tr>
                                <td>{{ $s->kode }}</td>
                                <td>{{ $s->name }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-info far fa-edit"
                                            href="/sql/{{ $s->kode }}/edit "title="Edit User"></a>
                                            

                                        <a class="btn btn-secondary far fa-eye " href="/sql/{{ $s->kode }}/view" title="User Detail"></a>
                                        <form action="/sql/{{ $s->kode }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            

                                            <input class="btn btn-danger fa-trash-alt" title="User delete "type="submit"   
                                                value="delete" >

                                        </form>
                                         {{-- <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="hapusData{{ $s->code }}Label">Delete
                                                        Confirmation
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div> --}}
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

@endsection
