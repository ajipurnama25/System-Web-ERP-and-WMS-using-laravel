@extends('layouts.app')

@section('title', 'New Good Receiving')

@section('styles')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" /> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- <style>
    .datepicker td{
        width: 30px;
        height: 30px;
    }

    .datepicker{
        padding:  10px;
    }
</style> -->
<!-- <style>
    #form-gr{
        /*display: none;*/
    }
</style> -->
@endsection

@section('content')
    <!-- content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0">Persiapan Penyimpanan Raw Material</h1>
                </div><!-- /.col -->
                <div align=right class="col-sm-4">
                    @can('create po')
                        <!-- <a href="{{ route('gr.index') }}" class="btn btn-secondary">
                            <i class="fa fa-chevron-left nav-icon"></i> &nbsp; Kembali ke Daftar Barang di Anterum
                        </a> -->
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
                            <form action="{{ route('label.store') }}" method="POST" enctype="multipart/form-data" id="form-label">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-8">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-8">
                                                <div class="form-group">
                                                    <label for="kode"><strong>Pallet Number :</strong></label>
                                                    <input type="text" name="pallet_number" class="form-control @error('pallet_number') is-invalid @enderror"
                                                        placeholder="" autofocus maxlength="10" value="{{ old('pallet_number') }}" required>
                                                        <input type="text" name="list_sku" id="list_sku" hidden value="{{ old('list_sku') }}" >
                                                    @error('pallet_number')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <table class="table table-bordered" id="dynamicAddRemove">
                                            <tr>
                                                <th colspan="6" class="table-primary">RAW MATERIAL</th>
                                            </tr>
                                                
                                            <tr>
                                                <th>SKU Code</th>
                                                <th>SKU Name</th>
                                                <th>Exp. Date</th>
                                                <th>Quantity</th>
                                                <th>
                                                    <button type="button" name="add" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalLong">+</button>
                                                </th>
                                                
                                            </tr>
                                            <tbody id="clone">

                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary ml-3" id="main-form">Submit</button>
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
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Barang yang akan disimpan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formMR">
            <div class="form-group">
                <label for="name">Raw Material</label>
                <select class="form-control" name="sku" id="sku" required>
                    <option value="">-- Pilih --</option>
                    @foreach($m_rm as $key => $value)
                        <option value="{{ $value->sku }}" id="{{ $value->sku }}" data-name="{{ $value->sku_name }}">{{ $value->sku_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Exp. Date</label>
                <input type="date" name="exp_date" id="exp_date" class="form-control date" required>
            </div>
            <div class="form-group">
                <label for="name">Jumlah</label>
                <input type="number" name="qty" id="qty" class="form-control" placeholder="" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="insert">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script>
    // $(document).ready(function(){
        // $(document).on('click', '.datepicker', function(){
            $('.datepicker',).datepicker({  
                // console.log(this);
            // $(this).datepicker({  
                   format: 'yyyy-mm-dd',
                   autoclose: true,
                   todayHighlight : true,
                   enableOnReadonly : true,
                   toggleActive: true,
                   keyboardNavigation: false,
                    forceParse: false
                });
        // });
        // });

        if($('#list_sku').val() !== ''){
            $("#clone").append($('#list_sku').val());
        }

        $('#main-form').click(function(){
            var sku = $('#list_sku').val();
            console.log(sku);

            if(sku == ''){
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Please Add Min 1 Raw Material !!',
                });

                return false;
            }

            return true;
        });

        $('#formMR').on('submit', function (e) {
            var sku = $('#sku').val();
            var list_sku = $('#list_sku').val();
            var exp_date = $('#exp_date').val();
            var qty = $('#qty').val();

            $("#clone").append('<tr><td>'+ sku +'</td><td>'+ $('#' + sku).data('name') +'</td><td>'+ exp_date +'</td><td>'+ qty +'</td><td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td></tr>');

            $('#list_sku').val($("#clone").html());
            // var sku = $('#sku').val('');
            var exp_date = $('#exp_date').val('');
            var qty = $('#qty').val('');

            $('#exampleModalLong').modal('toggle');
            return false;
        })

        var i = 0;
        $(document).on('click', '.remove-input-field', function () {
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $(this).parents('tr').remove();
                $('#list_sku').val($("#clone").html().trim());
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })
            
        });
    // });

</script>


@endsection
