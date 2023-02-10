@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Actualizar Documento </h4><br><br>
            
            <form method="post" action="{{ route('doccab.store') }}" id="myForm">
                @csrf
                
                <input type="hidden" name="id" value="{{$doccab->id}}">

                <div class="row mb-3">                
                    <div class="form-group col-sm-12">
                        <span class='text-secondary'>Cabecera del Documento</span><hr>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Cuenta </label>
                    <div class="col-sm-10">
                        <select name="account_id" id="account_id" class="form-group form-select" aria-label="Default select example">
                            <option selected="" value="">Abrir este menú de selección</option>
                            @foreach($cuenta as $cta)
                            <option @if ($doccab->account_id == $cta->id) {{ 'selected' }} @endif value="{{ $cta->id }}">{{ $cta->name }}</option>
                           @endforeach
                            </select>
                    </div>
                </div>
            <!-- end row -->         
            
             

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Cliente </label>
                <div class="col-sm-10">
                    
                    <select name="solicitante_id" id="solicitante_id" class="form-group form-select" aria-label="Default select example">
                        <option selected="" value="">Abrir este menú de selección</option>
                        @foreach($solicitante as $sol)
                       <option @if ($doccab->solicitante_id == $sol->id) {{ 'selected' }} @endif  value="{{ $sol->id }}">{{ $sol->company_name }} ({{ $sol->name }})</option>
                       @endforeach
                        </select>
                </div>
            </div>
        <!-- end row -->
        
       

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Punto de Entrega </label>
            <div class="col-sm-10">
                <select name="destinatario_id" id="destinatario_id" class="form-group form-select" aria-label="Default select example">
                    <option selected="" value="">Abrir este menú de selección</option>
                    @foreach($destinatario as $des)
                    <option value="{{ $des->id }}" @if ($doccab->destinatario_id == $des->id) {{ 'selected' }} @endif >{{ $des->company_name }} ({{ $des->name }})</option>
                   @endforeach
                    </select>
            </div>
        </div>
    <!-- end row -->  
    
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Bodega </label>
        <div class="col-sm-10">
            <select name="warehouse_id" id="warehouse_id" class="form-group form-select" aria-label="Default select example">
                <option selected="" value="">Abrir este menú de selección</option>
                @foreach($bodega as $bod)
                <option value="{{ $bod->id }}" @if ($doccab->warehouse_id == $bod->id) {{ 'selected' }} @endif >{{ $bod->name }} </option>
               @endforeach
                </select>
        </div>
    </div>
<!-- end row -->    

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Código de Documento</label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text" value="{{ $doccab->name }}">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Tipo de Documento</label>
                <div class="form-group col-sm-10">
                    <select name="type" class="form-control" name="plan">
                        <option value="Ingreso" @if ($doccab->type == "I") {{ 'selected' }} @endif >INGRESO</option>
                        <option value="Egreso" @if ($doccab->type == "E") {{ 'selected' }} @endif >EGRESO</option>
                        <option value="Inventario" @if ($doccab->type == "V") {{ 'selected' }} @endif >INVENTARIO</option>                        
                    </select>
                </div>
            </div>
            <!-- end row -->  
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Estado</label>
                <div class="form-group col-sm-10">
                    <select name="status" class="form-control" name="plan">
                        <option value="Pendiente" @if ($doccab->status == "Pendiente") {{ 'selected' }} @endif >PENDIENTE</option>
                        <option value="En_Proceso" @if ($doccab->status == "En_Proceso") {{ 'selected' }} @endif >EN PROCESO</option>
                        <option value="Finalizado" @if ($doccab->status == "Finalizado") {{ 'selected' }} @endif >FINALIZADO</option>                        
                    </select>
                </div>
            </div>
            <!-- end row -->              



            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Usuario Documento</label>
                <div class="form-group col-sm-10">
                    <input name="doc_creator_user" class="form-control" type="text"  value="{{ $doccab->doc_creator_user }}">
                </div>
            </div>
            <!-- end row -->         

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Fecha Registro</label>
                <div class="form-group col-sm-10">
                    <input name="record_date" class="form-control" type="date"  value="{{ $doccab->record_date }}">
                </div>
            </div>
            <!-- end row -->      

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Fecha Inicio</label>
                <div class="form-group col-sm-10">
                    <input name="start_doc_date" class="form-control" type="date"  value="{{ $doccab->start_doc_date }}">
                </div>
            </div>
            <!-- end row -->      
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Fecha Hora Inicio</label>
                <div class="form-group col-sm-10">
                    <input name="start_doc_date_hour" class="form-control" type="datetime-local"  value="{{ $doccab->start_doc_date_hour }}">
                </div>
            </div>
            <!-- end row -->   
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Fecha Fin</label>
                <div class="form-group col-sm-10">
                    <input name="finish_doc_date" class="form-control" type="date"   value="{{ $doccab->finish_doc_date }}">
                </div>
            </div>
            <!-- end row -->      
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Fecha Hora Fin</label>
                <div class="form-group col-sm-10">
                    <input name="finish_doc_date_hour" class="form-control" type="datetime-local" value="{{ $doccab->finish_doc_date_hour }}">
                </div>
            </div>
            <!-- end row -->       
                  
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Cantidad Total </label>
                <div class="form-group col-sm-10">
                    <input name="total_qty" class="form-control" type="number" value="{{ $doccab->total_qty }}">
                </div>
            </div>
            <!-- end row -->  
            
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Peso Total</label>
                <div class="form-group col-sm-10">
                    <input name="total_weight" class="form-control" type="number" value="{{ $doccab->total_weight }}">
                </div>
            </div>
            <!-- end row -->      

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Volumen Total</label>
                <div class="form-group col-sm-10">
                    <input name="total_volume" class="form-control" type="number" value="{{ $doccab->total_volume }}">
                </div>
            </div>
            <!-- end row --> 

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Comentarios</label>
                <div class="form-group col-sm-10">
                    <textarea name="comments" class="form-control" type="text">{{ $doccab->comments }}</textarea>
                </div>
            </div>
            <!-- end row -->                 

            <div class="row mb-3">                
                <div class="form-group col-sm-12">
                    <br><span class='text-secondary'>Datos del Pedido</span><hr>
                </div>
            </div>
            
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Código de Pedido</label>
                <div class="form-group col-sm-10">
                    <input name="order_number" class="form-control" type="text" value="{{ $doccab->order_number }}">
                </div>
            </div>
            <!-- end row -->             
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Fecha Pedido</label>
                <div class="form-group col-sm-10">
                    <input name="doc_creator_user" class="form-control" type="date" value="{{ $doccab->doc_creator_user }}">
                </div>
            </div>
            <!-- end row -->  

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Punto de Venta</label>
                <div class="form-group col-sm-10">
                    <input name="point_sale" class="form-control" type="text" value="{{ $doccab->point_sale }}">
                </div>
            </div>
            <!-- end row -->   
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Canal</label>
                <div class="form-group col-sm-10">
                    <input name="sales_channel" class="form-control" type="text" value="{{ $doccab->sales_channel }}">
                </div>
            </div>
            <!-- end row -->              
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Código OC</label>
                <div class="form-group col-sm-10">
                    <input name="purchase_number" class="form-control" type="text" value="{{ $doccab->purchase_number }}">
                </div>
            </div>
            <!-- end row -->        
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Usuario Pedido</label>
                <div class="form-group col-sm-10">
                    <input name="order_creator_user" class="form-control" type="text" value="{{ $doccab->order_creator_user }}">
                </div>
            </div>
            <!-- end row -->            
            
            <div class="row mb-3">                
                <div class="form-group col-sm-12">
                    <br><span class='text-secondary'>Datos de Facturación</span><hr>
                </div>
            </div>            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Código de Factura</label>
                <div class="form-group col-sm-10">
                    <input name="invoice_number" class="form-control" type="text" value="{{ $doccab->invoice_number }}">
                </div>
            </div>
            <!-- end row -->    
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Autorización de Factura</label>
                <div class="form-group col-sm-10">
                    <input name="invoice_auth_number" class="form-control" type="text" value="{{ $doccab->invoice_auth_number }}">
                </div>
            </div>
            <!-- end row -->      
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Fecha Emisión de Factura</label>
                <div class="form-group col-sm-10">
                    <input name="invoice_print_date" class="form-control" type="text" value="{{ $doccab->invoice_print_date }}">
                </div>
            </div>
            <!-- end row -->        
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Número interno de Factura</label>
                <div class="form-group col-sm-10">
                    <input name="erp_invoice_number" class="form-control" type="text" value="{{ $doccab->erp_invoice_number }}">
                </div>
            </div>
            <!-- end row -->              
            
                <input type="submit" class="btn btn-info waves-effect waves-light" value="Actualizar Documento">
            </form>
             
           
           
        </div>
    </div>
</div> <!-- end col -->
</div>
 


</div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                type: {
                    required : true,
                }, 
                account_id: {
                    required : true,
                }, 
                solicitante_id: {
                    required : true,
                }, 
                destinatario_id: {
                    required : true,
                }, 
                warehouse_id: {
                    required : true,
                },      
                status: {
                    required : true,
                },                                 
            },
            messages :{
                name: {
                    required : 'Por favor ingrese el código de documento',
                },
                type: {
                    required : 'Por favor ingrese tipo de documento',
                },
                account_id: {
                    required : 'Por favor seleccione la cuenta relacionada.',
                },
                solicitante_id: {
                    required : 'Por favor seleccione el cliente relacionado',
                },                
                warehouse_id: {
                    required : 'Por favor seleccione la bodega relacionada.',
                },
                status: {
                    required : 'Por favor seleccione el estado.',
                },                
                 
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
<script type="text/javascript">
    $("#account_id").change(function(){
        var nid = $(this).val();
        
        if(nid){
            $.ajax({
               type:"get",
               url:"{{url('/ubicacion/getbodegas')}}/"+nid,
               success:function(res)
               {       
                
                    if(res)
                    {
                        $("#warehouse_id").empty();
                        $("#warehouse_id").append('<option>Seleccionar Bodega</option>');
                        /*$.each(res,function(key,value){
                            alert(JSON.stringify(value));
                            
                            $("#warehouse_id").append('<option value="'+key+'">'+value+'</option>');
                        });*/
                        $.each(res, function(i, option) {
                            $('#warehouse_id').append($('<option/>').attr("value", option.id).text(option.name));
                        });
                    }
               }
    
            });

            $.ajax({
               type:"get",
               url:"{{url('/solicitante/getsolicitantes')}}/"+nid,
               success:function(res)
               {       
                
                    if(res)
                    {
                        $("#solicitante_id").empty();
                        $("#solicitante_id").append('<option>Seleccionar Cliente</option>');
                        /*$.each(res,function(key,value){
                            alert(JSON.stringify(value));
                            
                            $("#warehouse_id").append('<option value="'+key+'">'+value+'</option>');
                        });*/
                        $.each(res, function(i, option) {
                            $('#solicitante_id').append($('<option/>').attr("value", option.id).text(option.company_name + " (" + option.name + ")"));
                        });
                    }
               }
    
            });
                   

        }
    });


    $("#solicitante_id").change(function(){
        var nid = $(this).val();
        
        if(nid){
            $.ajax({
               type:"get",
               url:"{{url('/destinatario/getdestinatarios')}}/"+nid,
               success:function(res2)
               {       
                
                    if(res2)
                    {
                        $("#destinatario_id").empty();
                        $("#destinatario_id").append('<option>Seleccionar Punto de Entrega</option>');
                        /*$.each(res,function(key,value){
                            alert(JSON.stringify(value));
                            
                            $("#warehouse_id").append('<option value="'+key+'">'+value+'</option>');
                        });*/
                        $.each(res2, function(i, option) {
                            $('#destinatario_id').append($('<option/>').attr("value", option.id).text(option.company_name + " (" + option.name + ")"));
                        });
                    }
               }
    
            });                

        }
    });    

    </script>
@endsection 
