@extends('layouts.app')

@section('title', 'Input Nomer Pallet')

@section('styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style>
    #form-gr{
        display: none;
    }

    .table td{
        vertical-align: top;
    }
    .table td div{
        padding-top: 7px;
    }
</style>
@endsection

{{-- <head>
    <title>Laravel 9 Ajax Post Request Example - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
    <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                Laravel 9 Ajax Post Request Example - ItSolutionStuff.com
            </div>
            <div class="card-body">
      
                <table class="table table-bordered mt-3">
                    <tr>
                        <th colspan="3">
                            List Of Posts
                            <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#postModal">
                              Create Post
                            </button>
                        </th>
                    </tr>
                    <tr>
                        <th>doc_no</th>
                        <th>machine</th>
                        <th>batch</th>
                        <th>sku</th>
                        <th>exp_date</th>
                        <th>qty</th>
                        <th>pallet</th>
                        <th>pid</th>
                        <th>created_by</th>
                        <th>updated_by</th>

                    </tr>
                    @foreach($production as $p)
                    <tr>
                        <td>{{ $p->doc_no }}</td>
                        <td>{{ $p->machine }}</td>
                        <td>{{ $p->batch }}</td>
                        <td>{{ $p->sku }}</td>
                        <td>{{ $p->exp_date }}</td>
                        <td>{{ $p->qty }}</td>
                        <td>{{ $p->pallet }}</td>
                        <td>{{ $p->pid }}</td>
                        <td>{{ $p->created_by }}</td>
                        <td>{{ $p->updated_by }}</td>
                    </tr>
                    @endforeach
                </table>
      
            </div>
        </div>
    </div>
      
    <!-- Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form >
      
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
        
                <div class="mb-3">
                    <label for="titleID" class="form-label">Title:</label>
                    <input type="text" id="titleID" name="name" class="form-control" placeholder="Name" required="">
                </div>
      
                <div class="mb-3">
                    <label for="bodyID" class="form-label">Body:</label>
                    <textarea name="body" class="form-control" id="bodyID"></textarea>
                </div>
         
                <div class="mb-3 text-center">
                    <button class="btn btn-success btn-submit">Submit</button>
                </div>
        
            </form>
          </div>
        </div>
      </div>
    </div>
         
    </body>
      
    <script type="text/javascript">
          
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      
        $(".btn-submit").click(function(e){
        
            e.preventDefault();
         
            // var title = $("#titleID").val();
            // var body = $("#bodyID").val();
         
            $.ajax({
               type:'POST',
               url:"{{ route('production.store') }}",
               data:{title:title, body:body},
               success:function(data){
                    if($.isEmptyObject(data.error)){
                        alert(data.success);
                        location.reload();
                    }else{
                        printErrorMsg(data.error);
                    }
               }
            });
        
        });
      
        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
      
    </script> --}}














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
                            <form id="search-form">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-8">
                                        <div class="form-group">
                                            <label for="name"><strong>Nomor Pallet:</strong></label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="" name="po_no" id="po_no" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-info" type="submit" id="search-po"><i class="fa fa-search"></i></button>
                                                </div> 

                                               


                                                
                                                {{-- <table class="table table-bordered mt-3">
                                                    <tr>
                                                        <th colspan="3">
                                                            List Of Posts
                                                            <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#postModal">
                                                              Create Post
                                                            </button>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>doc_no</th>
                                                        <th>machine</th>
                                                        <th>batch</th>
                                                        <th>sku</th>
                                                        <th>exp_date</th>
                                                        <th>qty</th>
                                                        <th>pallet</th>
                                                        <th>pid</th>
                                                        <th>created_by</th>
                                                        <th>updated_by</th>
                                
                                                    </tr> --}}


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="" method="POST" enctype="multipart/form-data" id="form-gr">
                                @csrf
                </div>

            </div>

        </div>

    </div>
</div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SKU</th>
                            <th>Nomor Batch</th>
                            <th>Tgl Kadaluarsa</th>
                            <th>Nomor Pallet</th>
                            <th>Nomor PID</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection