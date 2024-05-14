@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Administration') }}</h1>
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
                    <div class="alert alert-info text-center">
                        <span class="text-capitalize font-weight-bold">Terminal ID Burner {{ $val }}</span>
                    </div>
                </div>
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
                    <div class="card">
                        <div class="card-body text-capitalize">
                            <form action="{{ route('burnid') }}" method="POST">
                                @csrf                                    
                                <div class="row justify-content-center">
                                    <div class="col-xs-10 col-sm-8 col-md-8">
                                        <div class="form-group">
                                            <label for="name"><strong>Terminal ID</strong></label>
                                            <input type="text"  name="id" required id="ID" class="form-control" >
                                        </div>
                                        <div class="mt-3 mb-3 float-right">
                                            <button type="submit" class="btn btn-sm btn-primary text-capitalize">Submit</button>
                                        </div>
                                    </div>
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
    <!-- /.end content -->
@endsection
