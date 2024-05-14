@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="pull-right">
            <a class="btn btn-secondary" href="{{ route('sql.index') }}"><i
                    class="fas fa-chevron-left"></i>
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
                <form action="{{ route('sql.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="form-group">
                                <label for="kode"><strong>Kode:</strong></label>
                                <input type="text" name="kode" class="form-control"
                                    placeholder=" Code. 123" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="name"><strong> Name:</strong></label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Site Name. ex. Muara Baru, Majalengka, Semarang, Medan.">
                            </div>

                            <button type="submit" class="btn btn-primary ml-3">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>

            </div>

        </div>

    </div>





@endsection