@extends('layouts.app')
@section('content')
    <!-- content -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0">Data Pengepakan FG ke Pallet</h1>
                </div><!-- /.col -->
                <div align=right class="col-sm-4">
                    @can('create po')
                        <a href="{{ route('pickinglist.index') }}" class="btn btn-secondary">
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
                    <div class="card">
                        <div class="card-body text-capitalize">

                         <form id="pallet" action="{{ url('pickinglist/update') }}" method="POST">     
                            @csrf
                                
                                         <tr>

                                             <td colspan=3>
                                                <div class="form-group">
                                                    <label for="line"><strong>Nama Barang</strong></label>
                                                    <input type="text" name="sku_name" readonly 
                                                    value="{{ $picking_list[0]->sku_name }}" class="form-control">
                                                    <label for="line"><strong>Nomor SKU</strong></label>
                                                    <input type="text" name="sku" readonly 
                                                        value="{{ $picking_list[0]->sku }}" class="form-control">
                                            </div> 
                                   
                                        <td>
                                            <div class="form-group">    
                                                <label for="exp_date">Tgl Kadaluarsa</label>
                                                <input type="text" id="exp_date" name="exp_date" readonly
                                                    value="{{  $picking_list[0]->exp_date }}" class="form-control">
                                                <input type="hidden" id="site" name="site" readonly
                                                    value="{{  $picking_list[0]->site }}" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr valign=bottom>
                                        <td>
                                            <div class="form-group">
                                                <label for="qty">Jumlah Karton</label>
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="qty" readonly
                                                                value="{{  $picking_list[0]->qty }}"
                                                                class="form-control"></td>
                                                     
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="pallet">nomor pallet</label>
                                                <input type="text" id="pallet" name="pallet" readonly
                                                    value="{{  $picking_list[0]->pallet }}" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                        </td>

                                        <td>
                                            <div class="mt-3 mb-3 float-right">
                                                <button type="submit" class="btn btn-sm btn-primary">Klik di
                                                    sini<br>- atau -<br>tekan <b>Enter</b></button>
                                            </div>
                                        </td>
                                   
                                    </tr>
                
                    
                            </div>
                        </form> 
                    
                        </div>
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


{{-- 
route pickinglist
Route::middleware('auth')->group(function () {
    Route::get('pickinglist', [PickinglistController::class, 'index'])->name('pickinglist.index');
    Route::get('pickinglist/view', [PickinglistController::class, 'view'])->name('pickinglist.view');
    Route::post('pickinglist/update', [PickinglistController::class, 'update'])->name('pickinglist.update');

}); --}}
