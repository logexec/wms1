<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\PurchaseController;
use App\Http\Controllers\Pos\DefaultController;
use App\Http\Controllers\Pos\InvoiceController;
use App\Http\Controllers\Pos\StockController;
use App\Http\Controllers\Pos\CuentaController;
use App\Http\Controllers\Pos\BodegaController;
use App\Http\Controllers\Pos\UbicacionController;
use App\Http\Controllers\Pos\ProductoController;
use App\Http\Controllers\Pos\DestinoController;
use App\Http\Controllers\Pos\DestinatarioController;
use App\Http\Controllers\Pos\SolicitanteController;
use App\Http\Controllers\Pos\TipotransaccionController;
use App\Http\Controllers\Pos\VehiculoController;
use App\Http\Controllers\Pos\TransportistaController;
use App\Http\Controllers\Pos\DoccabController;
use App\Http\Controllers\Pos\DocdetController;
use App\Http\Controllers\Pos\RutaController;
use App\Http\Controllers\Pos\TransaccionController;
use App\Http\Controllers\Pos\SaldoController;
use App\Http\Controllers\Pos\PlanificadorController;



Route::get('/', function () {
    return view('welcome');
});
 

Route::controller(DemoController::class)->group(function () {
    Route::get('/about', 'Index')->name('about.page')->middleware('check');
    Route::get('/contact', 'ContactMethod')->name('cotact.page');
});


 Route::middleware('auth')->group(function(){



 // Admin All Route 
Route::controller(AdminController::class)->group(function () {

    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');

    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');

    Route::get('/admin/all', 'AdminAll')->name('admin.all');
    Route::get('/admin/useradd', 'Useradd')->name('admin.useradd');
    Route::post('/admin/store', 'Store')->name('admin.store');
    
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');  
     
});


 // Supplier All Route 
Route::controller(SupplierController::class)->group(function () {
    Route::get('/supplier/all', 'SupplierAll')->name('supplier.all'); 
    Route::get('/supplier/add', 'SupplierAdd')->name('supplier.add'); 
    Route::post('/supplier/store', 'SupplierStore')->name('supplier.store');
    Route::get('/supplier/edit/{id}', 'SupplierEdit')->name('supplier.edit'); 
    Route::post('/supplier/update', 'SupplierUpdate')->name('supplier.update');
    Route::get('/supplier/delete/{id}', 'SupplierDelete')->name('supplier.delete');
});


// Customer All Route 
Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer/all', 'CustomerAll')->name('customer.all'); 
    Route::get('/customer/add', 'CustomerAdd')->name('customer.add');
    Route::post('/customer/store', 'CustomerStore')->name('customer.store');
    Route::get('/customer/edit/{id}', 'CustomerEdit')->name('customer.edit');
    Route::post('/customer/update', 'CustomerUpdate')->name('customer.update');
    Route::get('/customer/delete/{id}', 'CustomerDelete')->name('customer.delete');

    Route::get('/credit/customer', 'CreditCustomer')->name('credit.customer');
    Route::get('/credit/customer/print/pdf', 'CreditCustomerPrintPdf')->name('credit.customer.print.pdf');

    Route::get('/customer/edit/invoice/{invoice_id}', 'CustomerEditInvoice')->name('customer.edit.invoice');
     Route::post('/customer/update/invoice/{invoice_id}', 'CustomerUpdateInvoice')->name('customer.update.invoice');

     Route::get('/customer/invoice/details/{invoice_id}', 'CustomerInvoiceDetails')->name('customer.invoice.details.pdf');

      Route::get('/paid/customer', 'PaidCustomer')->name('paid.customer');
      Route::get('/paid/customer/print/pdf', 'PaidCustomerPrintPdf')->name('paid.customer.print.pdf');

       Route::get('/customer/wise/report', 'CustomerWiseReport')->name('customer.wise.report');
       Route::get('/customer/wise/credit/report', 'CustomerWiseCreditReport')->name('customer.wise.credit.report');
       Route::get('/customer/wise/paid/report', 'CustomerWisePaidReport')->name('customer.wise.paid.report');
     
});


// Unit All Route 
Route::controller(UnitController::class)->group(function () {
    Route::get('/unit/all', 'UnitAll')->name('unit.all'); 
    Route::get('/unit/add', 'UnitAdd')->name('unit.add');
    Route::post('/unit/store', 'UnitStore')->name('unit.store');
    Route::get('/unit/edit/{id}', 'UnitEdit')->name('unit.edit');
    Route::post('/unit/update', 'UnitUpdate')->name('unit.update');
    Route::get('/unit/delete/{id}', 'UnitDelete')->name('unit.delete');
     
});


// Category All Route 
Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/all', 'CategoryAll')->name('category.all'); 
    Route::get('/category/add', 'CategoryAdd')->name('category.add');
    Route::post('/category/store', 'CategoryStore')->name('category.store');
    Route::get('/category/edit/{id}', 'CategoryEdit')->name('category.edit');
    Route::post('/category/update', 'CategoryUpdate')->name('category.update');
    Route::get('/category/delete/{id}', 'CategoryDelete')->name('category.delete');
     
});


// Product All Route 
Route::controller(ProductController::class)->group(function () {
    Route::get('/product/all', 'ProductAll')->name('product.all'); 
    Route::get('/product/add', 'ProductAdd')->name('product.add');
    Route::post('/product/store', 'ProductStore')->name('product.store');
    Route::get('/product/edit/{id}', 'ProductEdit')->name('product.edit');
    Route::post('/product/update', 'ProductUpdate')->name('product.update');
    Route::get('/product/delete/{id}', 'ProductDelete')->name('product.delete');
     
});


  
// Purchase All Route 
Route::controller(PurchaseController::class)->group(function () {
    Route::get('/purchase/all', 'PurchaseAll')->name('purchase.all'); 
    Route::get('/purchase/add', 'PurchaseAdd')->name('purchase.add');
    Route::post('/purchase/store', 'PurchaseStore')->name('purchase.store');
    Route::get('/purchase/delete/{id}', 'PurchaseDelete')->name('purchase.delete');
    Route::get('/purchase/pending', 'PurchasePending')->name('purchase.pending');
    Route::get('/purchase/approve/{id}', 'PurchaseApprove')->name('purchase.approve');

    Route::get('/daily/purchase/report', 'DailyPurchaseReport')->name('daily.purchase.report');
    Route::get('/daily/purchase/pdf', 'DailyPurchasePdf')->name('daily.purchase.pdf');
     
});


// Invoice All Route 
Route::controller(InvoiceController::class)->group(function () {
    Route::get('/invoice/all', 'InvoiceAll')->name('invoice.all'); 
    Route::get('/invoice/add', 'invoiceAdd')->name('invoice.add');
    Route::post('/invoice/store', 'InvoiceStore')->name('invoice.store');

    Route::get('/invoice/pending/list', 'PendingList')->name('invoice.pending.list');
    Route::get('/invoice/delete/{id}', 'InvoiceDelete')->name('invoice.delete');
    Route::get('/invoice/approve/{id}', 'InvoiceApprove')->name('invoice.approve');

    Route::post('/approval/store/{id}', 'ApprovalStore')->name('approval.store');
    Route::get('/print/invoice/list', 'PrintInvoiceList')->name('print.invoice.list');
    Route::get('/print/invoice/{id}', 'PrintInvoice')->name('print.invoice');

    Route::get('/daily/invoice/report', 'DailyInvoiceReport')->name('daily.invoice.report');
    Route::get('/daily/invoice/pdf', 'DailyInvoicePdf')->name('daily.invoice.pdf');
    
     
});

//Cuenta All Route
Route::controller(CuentaController::class)->group(function () {
    Route::get('/cuenta/all', 'CuentaAll')->name('cuenta.all');      
    Route::get('/cuenta/add', 'CuentaAdd')->name('cuenta.add');      
    Route::post('/cuenta/store', 'CuentaStore')->name('cuenta.store');
    Route::get('/cuenta/edit/{id}', 'CuentaEdit')->name('cuenta.edit');
    Route::post('/cuenta/update', 'CuentaUpdate')->name('cuenta.update');
    Route::get('/cuenta/delete/{id}', 'CuentaDelete')->name('cuenta.delete');
    
});

//Bodega All Route
Route::controller(BodegaController::class)->group(function () {
    Route::get('/bodega/all', 'BodegaAll')->name('bodega.all');      
    Route::get('/bodega/add', 'BodegaAdd')->name('bodega.add');      
    Route::post('/bodega/store', 'BodegaStore')->name('bodega.store');
    Route::get('/bodega/edit/{id}', 'BodegaEdit')->name('bodega.edit');
    Route::post('/bodega/update', 'BodegaUpdate')->name('bodega.update');
    Route::get('/bodega/delete/{id}', 'BodegaDelete')->name('bodega.delete');
    
});

//Ubicacion All Route
Route::controller(UbicacionController::class)->group(function () {
    Route::get('/ubicacion/all', 'UbicacionAll')->name('ubicacion.all');      
    Route::get('/ubicacion/add', 'UbicacionAdd')->name('ubicacion.add');      
    Route::post('/ubicacion/store', 'UbicacionStore')->name('ubicacion.store');
    Route::get('/ubicacion/edit/{id}', 'UbicacionEdit')->name('ubicacion.edit');
    Route::post('/ubicacion/update', 'UbicacionUpdate')->name('ubicacion.update');
    Route::get('/ubicacion/delete/{id}', 'UbicacionDelete')->name('ubicacion.delete');
    Route::get('/ubicacion/getbodegas/{id}', 'UbicacionGetbodegas')->name('ubicacion.getbodegas');
    Route::get('/ubicacion/getubicaciones/{id}', 'GetUbicaciones')->name('ubicacion.getubicaciones');
    
});

//Producto All Route
Route::controller(ProductoController::class)->group(function () {
    Route::get('/producto/all', 'ProductoAll')->name('producto.all');      
    Route::get('/producto/add', 'ProductoAdd')->name('producto.add');      
    Route::post('/producto/store', 'ProductoStore')->name('producto.store');
    Route::get('/producto/edit/{id}', 'ProductoEdit')->name('producto.edit');
    Route::post('/producto/update', 'ProductoUpdate')->name('producto.update');
    Route::get('/producto/delete/{id}', 'ProductoDelete')->name('producto.delete');
    Route::get('/producto/getproductos/{id}', 'GetProductos')->name('producto.getproductos');   
    Route::get('/producto/getproducto/{id}', 'GetProducto')->name('producto.getproducto');       
    
});

//Destino All Route
Route::controller(DestinoController::class)->group(function () {
    Route::get('/destino/all', 'DestinoAll')->name('destino.all');      
    Route::get('/destino/add', 'DestinoAdd')->name('destino.add');      
    Route::post('/destino/store', 'DestinoStore')->name('destino.store');
    Route::get('/destino/edit/{id}', 'DestinoEdit')->name('destino.edit');
    Route::post('/destino/update', 'DestinoUpdate')->name('destino.update');
    Route::get('/destino/delete/{id}', 'DestinoDelete')->name('destino.delete');
    Route::get('/destino/getdestinos/{id}', 'GetDestinos')->name('doccab.getdestinos');   
    
});

//Destinatario All Route
Route::controller(DestinatarioController::class)->group(function () {
    Route::get('/destinatario/all', 'DestinatarioAll')->name('destinatario.all');      
    Route::get('/destinatario/add', 'DestinatarioAdd')->name('destinatario.add');      
    Route::post('/destinatario/store', 'DestinatarioStore')->name('destinatario.store');
    Route::get('/destinatario/edit/{id}', 'DestinatarioEdit')->name('destinatario.edit');
    Route::post('/destinatario/update', 'DestinatarioUpdate')->name('destinatario.update');
    Route::get('/destinatario/delete/{id}', 'DestinatarioDelete')->name('destinatario.delete');
    Route::get('/destinatario/getdestinatarios/{id}', 'GetDestinatarios')->name('destinatario.getdestinatarios');
});

//Solicitante All Route
Route::controller(SolicitanteController::class)->group(function () {
    Route::get('/solicitante/all', 'SolicitanteAll')->name('solicitante.all');      
    Route::get('/solicitante/add', 'SolicitanteAdd')->name('solicitante.add');      
    Route::post('/solicitante/store', 'SolicitanteStore')->name('solicitante.store');
    Route::get('/solicitante/edit/{id}', 'SolicitanteEdit')->name('solicitante.edit');
    Route::post('/solicitante/update', 'SolicitanteUpdate')->name('solicitante.update');
    Route::get('/solicitante/delete/{id}', 'SolicitanteDelete')->name('solicitante.delete');
    Route::get('/solicitante/getsolicitantes/{id}', 'GetSolicitantes')->name('solicitante.getsolicitantes');
    
});

//Vehiculo All Route
Route::controller(VehiculoController::class)->group(function () {
    Route::get('/vehiculo/all', 'VehiculoAll')->name('vehiculo.all');      
    Route::get('/vehiculo/add', 'VehiculoAdd')->name('vehiculo.add');      
    Route::post('/vehiculo/store', 'VehiculoStore')->name('vehiculo.store');
    Route::get('/vehiculo/edit/{id}', 'VehiculoEdit')->name('vehiculo.edit');
    Route::post('/vehiculo/update', 'VehiculoUpdate')->name('vehiculo.update');
    Route::get('/vehiculo/delete/{id}', 'VehiculoDelete')->name('vehiculo.delete');    
    Route::get('/vehiculo/getvehiculos/{id}', 'GetVehiculos')->name('vehiculo.getvehiculos');   
    
    
});

//Transportista All Route
Route::controller(TransportistaController::class)->group(function () {
    Route::get('/transportista/all', 'TransportistaAll')->name('transportista.all');      
    Route::get('/transportista/add', 'TransportistaAdd')->name('transportista.add');      
    Route::post('/transportista/store', 'TransportistaStore')->name('transportista.store');
    Route::get('/transportista/edit/{id}', 'TransportistaEdit')->name('transportista.edit');
    Route::post('/transportista/update', 'TransportistaUpdate')->name('transportista.update');
    Route::get('/transportista/delete/{id}', 'TransportistaDelete')->name('transportista.delete');  
    Route::get('/transportista/gettransportistas/{id}', 'GetTransportistas')->name('transportista.gettransportista');     
    
});

//TipoTransaccion All Route
Route::controller(TipotransaccionController::class)->group(function () {
    Route::get('/tipotransaccion/all', 'TipotransaccionAll')->name('tipotransaccion.all');      
    Route::get('/tipotransaccion/add', 'TipotransaccionAdd')->name('tipotransaccion.add');      
    Route::post('/tipotransaccion/store', 'TipotransaccionStore')->name('tipotransaccion.store');
    Route::get('/tipotransaccion/edit/{id}', 'TipotransaccionEdit')->name('tipotransaccion.edit');
    Route::post('/tipotransaccion/update', 'TipotransaccionUpdate')->name('tipotransaccion.update');
    Route::get('/tipotransaccion/delete/{id}', 'TipotransaccionDelete')->name('tipotransaccion.delete');    
    Route::get('/tipotransaccion/gettipotransaccions/{id}', 'GetTipotransaccions')->name('tipotransaccion.gettipotransaccions');     
    
    
});

//Doccab All Route
Route::controller(DoccabController::class)->group(function () {
    Route::get('/doccab/all', 'DoccabAll')->name('doccab.all');      
    Route::get('/doccab/add', 'DoccabAdd')->name('doccab.add');      
    Route::post('/doccab/store', 'DoccabStore')->name('doccab.store');
    Route::get('/doccab/edit/{id}', 'DoccabEdit')->name('doccab.edit');
    Route::post('/doccab/update', 'DoccabUpdate')->name('doccab.update');
    Route::get('/doccab/delete/{id}', 'DoccabDelete')->name('doccab.delete');    
    Route::get('/doccab/detail/{id}', 'DoccabDetail')->name('doccab.detail'); 
    Route::get('/doccab/getdocumentos/{id}', 'GetDocumentos')->name('doccab.getdocumentos');   
    Route::get('/doccab/getdocumentostype/{id}/{account_id}', 'GetDocumentosType')->name('doccab.getdocumentostype');   
    Route::get('/doccab/getitemsdoc/{id}/{account_id}', 'GetItemsDoc')->name('doccab.getitemsdoc');   
    Route::get('/doccab/getitemdoc/{id}/{prod_id}', 'GetItemDoc')->name('doccab.getitemdoc');   

    
    
    
    
});

//Docdet All Route
Route::controller(DocdetController::class)->group(function () {
    Route::get('/docdet/all', 'DocdetAll')->name('docdet.all');      
    Route::get('/docdet/add', 'DocdetAdd')->name('docdet.add');      
    Route::post('/docdet/store', 'DocdetStore')->name('docdet.store');
    Route::get('/docdet/edit/{id}', 'DocdetEdit')->name('docdet.edit');
    Route::post('/docdet/update', 'DocdetUpdate')->name('docdet.update');
    Route::get('/docdet/delete/{id}', 'DocdetDelete')->name('docdet.delete');    
    Route::get('/docdet/detail/{id}', 'DocdetDetail')->name('docdet.detail');    
    
});


//Docdet All Route
Route::controller(RutaController::class)->group(function () {
    Route::get('/ruta/all', 'RutaAll')->name('ruta.all');      
    Route::get('/ruta/add', 'RutaAdd')->name('ruta.add');      
    Route::post('/ruta/store', 'RutaStore')->name('ruta.store');
    Route::get('/ruta/edit/{id}', 'RutaEdit')->name('ruta.edit');
    Route::post('/ruta/update', 'RutaUpdate')->name('ruta.update');
    Route::get('/ruta/delete/{id}', 'RutaDelete')->name('ruta.delete');    
    Route::get('/ruta/detail/{id}', 'RutaDetail')->name('ruta.detail');    
        
});

//Transaccion All Route
Route::controller(TransaccionController::class)->group(function () {
    Route::get('/transaccion/all', 'TransaccionAll')->name('transaccion.all');      
    Route::get('/transaccion/add', 'TransaccionAdd')->name('transaccion.add');      
    Route::post('/transaccion/store', 'TransaccionStore')->name('transaccion.store');
                  
});

//Transaccion All Route
Route::controller(SaldoController::class)->group(function () {
    Route::get('/saldo/all', 'SaldoAll')->name('saldo.all');          
});

//Planificador All Route
Route::controller(PlanificadorController::class)->group(function () {
    Route::get('/planificador/all', 'PlanificadorAll')->name('planificador.all');  
    Route::post('/planificador/asignar', 'PlanificadorAsignar')->name('planificador.asignar');  
    Route::get('/planificador/confirmar/{id}', 'PlanificadorConfirmar')->name('planificador.confirmar');  
    Route::get('/planificador/delete/{id}', 'PlanificadorDelete')->name('planificador.delete');  
});

// Stock All Route 
Route::controller(StockController::class)->group(function () {
    Route::get('/stock/report', 'StockReport')->name('stock.report');
    Route::get('/stock/report/pdf', 'StockReportPdf')->name('stock.report.pdf'); 

    Route::get('/stock/supplier/wise', 'StockSupplierWise')->name('stock.supplier.wise'); 
    Route::get('/supplier/wise/pdf', 'SupplierWisePdf')->name('supplier.wise.pdf');
    Route::get('/product/wise/pdf', 'ProductWisePdf')->name('product.wise.pdf');

 
});



 }); // End Group Middleware




// Default All Route 
Route::controller(DefaultController::class)->group(function () {
    Route::get('/get-category', 'GetCategory')->name('get-category'); 
    Route::get('/get-product', 'GetProduct')->name('get-product'); 
    Route::get('/check-product', 'GetStock')->name('check-product-stock'); 
     
});


 


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
