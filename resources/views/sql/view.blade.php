@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="pull-right">
            <a class="btn btn-secondary" href="{{ route('sql.index') }}"><i class="fas fa-chevron-left"></i>
                Back</a>
        </div>
    </div>
    <div class="col-lg-6">
        &nbsp;
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card" style="padding: 1.3em">
            <div class="card-body p-0">
    @foreach ($sql as $s)
                

                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong> Kode:</strong>
                                <input type="text" name="kode" readonly value="{{ $s->kode }}"
                                    class="form-control" placeholder="kode" autofocus>
                            </div>
                            <div class="form-group">
                                <strong> Name:</strong>
                                <input type="text" name="name" readonly value="{{ $s->name }}"
                                    class="form-control" placeholder="name">
                            </div>
                            
                
    @endforeach

            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer clearfix">

        </div>
    </div>
</div>
</div>

@endsection