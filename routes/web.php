<?php

use App\Http\Controllers\BurnerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MaterialReleasedController;
use App\Http\Controllers\MDepartContoller;
use App\Http\Controllers\MDepartmentController;
use App\Http\Controllers\PickinglistController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductionBatchController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SkuController;
use App\Http\Controllers\Sql_ajiController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TGAApprovedController;
use App\Http\Controllers\THRApprovedController;
use App\Http\Controllers\TROApprovedController;
use App\Http\Controllers\TRoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\WorkOrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PermissionController;
use \App\Http\Controllers\RoleController;
use \App\Http\Controllers\SiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

//Default Route to Login.
Route::get('/', function () {
    //return view('welcome');
    return redirect(route('login'));
});

//Route Authentication
Auth::routes([
    'register' => false, // Register Routes...
    'reset' => false, // Reset Password Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    //Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('sites', SiteController::class);
    Route::resource('users', UserController::class);
    Route::resource('supplier', SupplierController::class);
    Route::get('/supplier/create', [SupplierController::class, 'create']);
    Route::post('/supplier/store', [SupplierController::class, 'store']);
    Route::get('/supplier/{code}/edit', [SupplierController::class, 'edit']);
    Route::get('/supplier/{code}/view', [SupplierController::class, 'view']);
    Route::post('/supplier/{code}', [SupplierController::class, 'update']);
    Route::delete('/supplier/{code}', [SupplierController::class, 'destroy']);

    Route::resource('customer', CustomerController::class);
    // Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');

    Route::get('/sql', [Sql_ajiController::class, 'index'])->name('sql.index');
    Route::get('/sql/create', [Sql_ajiController::class, 'create'])->name('sql.create');
    Route::post('/sql/store', [Sql_ajiController::class, 'store'])->name('sql.store');
    Route::get('/sql/{kode}/edit', [Sql_ajiController::class, 'edit'])->name('sql.edit');
    Route::post('/sql/update/{kode}', [Sql_ajiController::class, 'update'])->name('sql.update');
    Route::get('/sql/{kode}/view', [Sql_ajiController::class, 'view'])->name('sql.view');
    Route::delete('/sql/{kode}', [Sql_ajiController::class, 'destroy'])->name('sql.destroy');

    Route::get('/sql-ins', [Sql_ajiController::class, 'ins']);
    Route::get('/sql-updated', [Sql_ajiController::class, 'updated']);
    Route::get('/sql-delete', [Sql_ajiController::class, 'delete']);

    // Route::get('/supplier/create', [SupplierController::class, 'create']);

    // Route::resource('departments', DepartmentController::class);
    Route::resource('departments', MDepartmentController::class);
    //  Route::delete('departments/{dept}/delete', [DepartmentController::class, 'delete'])->name('departments.delete');
    Route::delete('departments/{dept}/destroy', [\App\Http\Controllers\MDepartmentController::class, 'destroy'])->name('departments.destroy');

});

Route::middleware('auth')->group(function () {
    Route::get('products/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::post('products/{id}/generate_pid', [ProductController::class, 'generatePid'])->name('generate_pid');
    Route::post('products/{id}/update_status', [ProductController::class, 'updateStatus'])->name('update_status');
});

Route::middleware('auth')->group(function () {
    Route::get('skus', [SkuController::class, 'index'])->name('skus');
    Route::get('skus/form-add', [SkuController::class, 'create'])->name('form-add-sku');
    Route::post('skus/create-sku', [SkuController::class, 'store'])->name('create-sku');
});

Route::get('production/init-add', [ProductionController::class, 'init'])->name('production.init-add');
Route::post('production/save-new', [ProductionController::class, 'save'])->name('production.save-new');

Route::get('production/index', [ProductionController::class, 'index'])->name('production.index');
Route::get('/production/view/{pallet}', [\App\Http\Controllers\ProductionController::class, 'view'])->name('production.view');
Route::get('/production/view', [\App\Http\Controllers\ProductionController::class, 'view'])->name('production.view');
Route::get('production/getPallet', [\App\Http\Controllers\ProductionController::class, 'getPallet'])->name('production.getPallet');
Route::post('production/update', [\App\Http\Controllers\ProductionController::class, 'update'])->name('production.update');
Route::get('/update', [\App\Http\Controllers\ProductionController::class, 'update'])->name('update');
Route::get('/production/update-pallet/{pallet}', [\App\Http\Controllers\ProductionController::class, 'update-pallet'])->name('production.update-pallet');

Route::middleware('auth')->group(function () {
    Route::get('burner', [BurnerController::class, 'index'])->name('burner');
    Route::post('burner/burnid', [BurnerController::class, 'burnid'])->name('burnid');

    Route::get('wo/form-add', [WorkOrderController::class, 'create'])->name('wo.form-add');
    Route::get('wo/showAjax', [WorkOrderController::class, 'showAjax'])->name('wo.showAjax');
    Route::post('wo/create-wo', [WorkOrderController::class, 'store'])->name('wo.create');
    Route::post('wo/delete', [WorkOrderController::class, 'drop'])->name('wo.delete');

    Route::get('warehouse/penerimaan', [WarehouseController::class, 'index'])->name('warehouse.penerimaan');
    Route::get('warehouse/penerimaanfg/{id}/{status}', [WarehouseController::class, 'penerimaanfg'])->name('warehouse.penerimaanfg');
    Route::get('warehouse/penyimpanan', [WarehouseController::class, 'pindex'])->name('warehouse.penyimpanan');
    Route::get('warehouse/penyimpananfg/{pid}', [WarehouseController::class, 'penyimpananfg'])->name('warehouse.penyimpananfg');
});

Route::middleware('auth')->group(function () {
    Route::get('bp/productionbatch', [ProductionBatchController::class, 'index'])->name('production.batch');
    Route::get('bp/showAjax', [ProductionBatchController::class, 'showAjax'])->name('bp.showAjax');
    Route::get('bp/batch', [ProductionBatchController::class, 'batch'])->name('bp.batch');
    Route::post('bp/create-batch', [ProductionBatchController::class, 'create'])->name('bp.create');
});

Route::middleware('auth')->group(function () {
    Route::get('mr/materialrealeased', [MaterialReleasedController::class, 'index'])->name('material.released');
    Route::get('mr/showAjax', [MaterialReleasedController::class, 'showAjax'])->name('mr.showAjax');
    Route::post('mr/create-mr', [MaterialReleasedController::class, 'create'])->name('mr.create');
});

// RAHMAT HARIS
Route::middleware('auth')->group(function () {
    Route::get('purchase-order', [\App\Http\Controllers\PurchaseOrderController::class, 'index'])->name('purchaseOrder');
    Route::get('purchase-order/create', [\App\Http\Controllers\PurchaseOrderController::class, 'create'])->name('po.create');
    Route::post('purchase-order/store', [\App\Http\Controllers\PurchaseOrderController::class, 'store'])->name('po.store');

    Route::get('good-receiving', [\App\Http\Controllers\GoodReceivingController::class, 'index'])->name('gr.index');
    Route::get('good-receiving/index', [\App\Http\Controllers\GoodReceivingController::class, 'index'])->name('gr.index');
    Route::get('good-receiving/create', [\App\Http\Controllers\GoodReceivingController::class, 'create'])->name('gr.create');
    Route::post('good-receiving/store', [\App\Http\Controllers\GoodReceivingController::class, 'store'])->name('gr.store');
    Route::get('good-receiving/{po_no}/{seq}/show', [\App\Http\Controllers\GoodReceivingController::class, 'show'])->name('gr.view');
    Route::get('good-receiving/{po_no}/{seq}/edit', [\App\Http\Controllers\GoodReceivingController::class, 'edit'])->name('gr.edit');
    Route::post('good-receiving/update', [\App\Http\Controllers\GoodReceivingController::class, 'update'])->name('gr.update');

    Route::get('labelling-stock', [\App\Http\Controllers\LabellingStockController::class, 'index'])->name('label.index');
    Route::get('labelling-stock/index', [\App\Http\Controllers\LabellingStockController::class, 'index'])->name('label.index');
    Route::get('labelling-stock/create', [\App\Http\Controllers\LabellingStockController::class, 'create'])->name('label.create');
    Route::post('labelling-stock/store', [\App\Http\Controllers\LabellingStockController::class, 'store'])->name('label.store');
});

Route::middleware('auth')->group(function () {
    Route::get('transfer-stock', [\App\Http\Controllers\TransferStockController::class, 'index'])->name('requestStock');
    Route::get('transfer-stock/waiting-approval', [\App\Http\Controllers\TransferStockController::class, 'approval'])->name('requestStock.waitingApproval');
    Route::get('transfer-stock/create', [\App\Http\Controllers\TransferStockController::class, 'create'])->name('requestStock.create');
    Route::get('transfer-stock/{doc_trf}/view', [\App\Http\Controllers\TransferStockController::class, 'view'])->name('requestStock.view');
    Route::post('transfer-stock/action', [\App\Http\Controllers\TransferStockController::class, 'action'])->name('requestStock.action');
    Route::post('transfer-stock/update', [\App\Http\Controllers\TransferStockController::class, 'update'])->name('requestStock.update');
    Route::post('transfer-stock/update-outbound', [\App\Http\Controllers\TransferStockController::class, 'updateOutbound'])->name('requestStock.updateOutbound');
    Route::post('transfer-stock/update-inbound', [\App\Http\Controllers\TransferStockController::class, 'updateInbound'])->name('requestStock.updateInbound');
    Route::get('transfer-stock/{doc_trf}/input-outbound', [\App\Http\Controllers\TransferStockController::class, 'inputOutbound'])->name('requestStock.inputOutbound');
    Route::get('transfer-stock/{doc_trf}/input-inbound', [\App\Http\Controllers\TransferStockController::class, 'inputInbound'])->name('requestStock.inputInbound');
    // Route::get('transfer-stock/delete', [\App\Http\Controllers\TransferStockController::class, 'delete'])->name('requestStock.delete');
    Route::post('transfer-stock/store', [\App\Http\Controllers\TransferStockController::class, 'store'])->name('requestStock.store');
});

Route::middleware('auth')->group(function () {
    Route::get('pickinglist', [PickinglistController::class, 'index'])->name('pickinglist.index');
    Route::get('pickinglist/view', [PickinglistController::class, 'view'])->name('pickinglist.view');
    Route::post('pickinglist/update', [PickinglistController::class, 'update'])->name('pickinglist.update');

});

Route::middleware('auth', 'UserRole:Staff-IT')->group(function () {
    Route::get('RO', [TRoController::class, 'index'])->name('RO.index');
    Route::get('RO/create', [TRoController::class, 'create'])->name('RO.create');
    Route::post('RO/store', [TRoController::class, 'store'])->name('RO.store');
    Route::get('RO/{doc_ro}/edit', [TRoController::class, 'edit'])->name('RO.edit');
    Route::post('RO/update', [TRoController::class, 'update'])->name('RO.update');
    Route::get('RO/{doc_ro}/accepted', [TRoController::class, 'accepted'])->name('RO.accepted');
    Route::get('RO/{doc_ro}/view', [TRoController::class, 'view'])->name('RO.view');
    Route::delete('RO/{doc_ro}', [TRoController::class, 'destroy'])->name('RO.destroy');
    Route::get('RO/filter', [TRoController::class, 'filter'])->name('RO.filter');
    Route::get('RO/showAjax', [TRoController::class, 'showAjax'])->name('RO.showAjax');
    Route::get('RO/getRoAjax', [TRoController::class, 'getRoAjax'])->name('RO.getRoAjax');

});

Route::middleware('auth')->group(function () {
    Route::get('depart', [MDepartContoller::class, 'index'])->name('depart.index');
    Route::get('depart/create', [MDepartContoller::class, 'create'])->name('depart.create');

});

Route::middleware('auth', 'UserRole:Manager-IT')->group(function () {
    Route::get('ROApproved', [TROApprovedController::class, 'index'])->name('ROApproved.index');
    Route::get('ROApproved/{doc_ro}/show', [TROApprovedController::class, 'show'])->name('ROApproved.show');
    Route::post('ROApproved/updatest', [TROApprovedController::class, 'updatest'])->name('ROApproved.updatest');
    Route::get('ROApproved/filter', [TROApprovedController::class, 'filter'])->name('ROApproved.filter');
    Route::get('ROApproved/getRoAjax', [TROApprovedController::class, 'getRoAjax'])->name('ROApproved.getRoAjax');
    Route::post('ROApproved/reject', [TROApprovedController::class, 'reject'])->name('ROApproved.reject');

});

Route::middleware('auth')->group(function () {
    Route::get('HRApproved', [THRApprovedController::class, 'index'])->name('HRApproved.index');
    Route::get('HRApproved/{doc_ro}/show', [THRApprovedController::class, 'show'])->name('HRApproved.show');
    Route::post('HRApproved/updatest', [THRApprovedController::class, 'updatest'])->name('HRApproved.updatest');
    Route::get('HRApproved/filter', [THRApprovedController::class, 'filter'])->name('HRApproved.filter');
    Route::get('HRApproved/getRoAjax', [THRApprovedController::class, 'getRoAjax'])->name('HRApproved.getRoAjax');
    Route::post('HRApproved/reject', [THRApprovedController::class, 'reject'])->name('HRApproved.reject');

});

Route::middleware('auth')->group(function () {
    Route::get('GAApproved', [TGAApprovedController::class, 'index'])->name('GAApproved.index');
    Route::get('GAApproved/{doc_ro}/show', [TGAApprovedController::class, 'show'])->name('GAApproved.show');
    Route::post('GAApproved/updatest', [TGAApprovedController::class, 'updatest'])->name('GAApproved.updatest');
    Route::get('GAApproved/filter', [TGAApprovedController::class, 'filter'])->name('GAApproved.filter');
    Route::get('GAApproved/getRoAjax', [TGAApprovedController::class, 'getRoAjax'])->name('GAApproved.getRoAjax');
    Route::post('GAApproved/reject', [TGAApprovedController::class, 'reject'])->name('GAApproved.reject');

});

Route::middleware('auth')->group(function () {
    // Route::get('report', [Report::class, 'index'])->name('report.index');
    Route::get('report', [ReportController::class, 'index'])->name('report.index');
    Route::get('report/filter', [ReportController::class, 'filter'])->name('report.filter');
    Route::get('report/getAjax', [ReportController::class, 'getAjax'])->name('report.getAjax');
    Route::get('report/TfinQty', [ReportController::class, 'index'])->name('report.TfinQty');
    // Route::get('report/exporToExcel/{sku}', [ReportController::class, 'exportToExcel'])->name('report.exportToExcel');
    Route::get('report/exportToExcel/{sku}/{tgl}/{type}/{site}', [ReportController::class, 'exportToExcel'])->name('report.exportToExcel');
    Route::get('report/exportAllToExcel/{sku}/{tgl}/{type}/{site}', [ReportController::class, 'exportAllToExcel'])->name('report.exportAllToExcel');
    Route::get('report/exportAllToExcel', [ReportController::class, 'exportAllToExcel'])->name('report.exportAllToExcel');

});
