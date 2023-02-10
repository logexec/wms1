@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Ruta N°  {{ $data[0]->name }} </h4>
            
            <form method="post" action="{{ route('ruta.store') }}" id="myForm">
                @csrf
                <div class="row mb-3">                                    
                </div>
             
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Cuenta </label>
                    <div class="col-sm-10">
                        {{ $data[0]->namecuenta }}
                    </div>
                </div>
            <!-- end row -->         

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Bodega </label>
                <div class="col-sm-10">
                    {{ $data[0]->namebodega }}
                </div>
            </div>
        <!-- end row -->               
            
             

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Origen </label>
                        <div class="col-sm-10">
                            {{ $data[0]->oriname }}
                        </div>
                    </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Destino </label>
                    <div class="col-sm-10">
                        {{ $data[0]->desname }}
                    </div>
                </div>
            <!-- end row -->      
            
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Vehículo </label>
                <div class="col-sm-10">
                    {{ $data[0]->namevehiculo }}
                </div>
            </div>
                <!-- end row -->            

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Transportista </label>
                    <div class="col-sm-10">
                        {{ $data[0]->nametransportista }}
                    </div>
                </div>
            <!-- end row -->             

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Estado</label>
                <div class="form-group col-sm-10">
                    {{ $data[0]->status }}
                </div>
            </div>
            <!-- end row -->      
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Fecha Hora de Carga</label>
                {{ $data[0]->upload_date_hour }}
            </div>
           

            <div class="row mb-3">
                
            </div>
            <!-- end row --> 
             
            </form>
             
           
           
        </div>
    </div>
</div> <!-- end col -->
</div>

<!--DOCS ASIGNADOS-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">DOCUMENTOS ASIGNADOS A LA RUTA<hr></h4>

            </div>
        </div>
    </div>
    <!-- end page title -->
    
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">

<br>               

<h4 class="card-title">Documentos Asignados </h4>


<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th width="5%">ID</th>
        <th>Cuenta</th> 
        <th>Número Documento</th> 
        <th>Tipo</th> 
        <th>Fecha Documento</th> 
        <th>Estado</th> 
        <th>Cliente</th> 
        <th>Inicio</th> 
        <th>Fin</th>         
        <th width="20%">Acción</th>
        
    </thead>


    <tbody>
         
        @foreach($docs as $key => $item)
    <tr>
        <td> {{ $item->id}} </td>
        <td> {{ $item->namecuenta }} </td> 
        <td> {{ $item->name }} </td>                               
        <td> {{ $item->type }} </td>  
        <td> {{ $item->record_date }} </td>  
        <td> {{ $item->status }} </td>  
        <td>{{ $item->companynamesolicitante }} ({{ $item->namesolicitante }})</td>  
        <td> {{ $item->start_doc_date }} </td>  
        <td> {{ $item->finish_doc_date }} </td>  
       <!-- <td> {{ $item->order_number }} </td>  
        <td> {{ $item->purchase_number }} </td>  
        <td> {{ $item->comments }} </td>  
        <td> {{ $item->invoice_number }} </td>                             -->

        <td>
            <a href="{{ route('doccab.edit',$item->id) }}" class="btn btn-danger sm" title="Eliminar de la ruta">  <i class="ri-delete-bin-6-fill"></i> </a>
           
        </td>
       
    </tr>
    @endforeach
    
    </tbody>
</table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

 
    
</div> <!-- container-fluid -->
<!-- FIN DOCS ASIGNADOS -->
<br><br>
 <!--DOCS PENDIENTES-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">DOCUMENTOS DISPONIBLES / POR ASIGNAR<hr></h4>

            </div>
        </div>
    </div>
    <!-- end page title -->
    
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">

<br>               

<h4 class="card-title">Documentos Disponibles para Asignar   </h4>


<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <th width="5%">ID</th>
        <th>Cuenta</th> 
        <th>Número Documento</th> 
        <th>Tipo</th> 
        <th>Fecha Documento</th> 
        <th>Estado</th> 
        <th>Cliente</th> 
        <th>Inicio</th> 
        <th>Fin</th>         
        <th width="20%">Acción</th>
        
    </thead>


    <tbody>
         
        @foreach($docs as $key => $item)
    <tr>
        <td> {{ $item->id}} </td>
        <td> {{ $item->namecuenta }} </td> 
        <td> {{ $item->name }} </td>                               
        <td> {{ $item->type }} </td>  
        <td> {{ $item->record_date }} </td>  
        <td> {{ $item->status }} </td>  
        <td>{{ $item->companynamesolicitante }} ({{ $item->namesolicitante }})</td>  
        <td> {{ $item->start_doc_date }} </td>  
        <td> {{ $item->finish_doc_date }} </td>  
       <!-- <td> {{ $item->order_number }} </td>  
        <td> {{ $item->purchase_number }} </td>  
        <td> {{ $item->comments }} </td>  
        <td> {{ $item->invoice_number }} </td>                             -->

        <td>
            <a href="{{ route('ruta.edit',$item->id) }}" class="btn btn-success sm" title="Asignar">  <i class="ri-check-line"></i> </a>
           
        </td>
       
    </tr>
    @endforeach
    
    </tbody>
</table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

 
    
</div> <!-- container-fluid -->
<!-- FIN DOCS PENDIENTES -->
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
                        
                        $.each(res, function(i, option) {
                            $('#warehouse_id').append($('<option/>').attr("value", option.id).text(option.name));
                        });
                    }
               }
    
            });

            $.ajax({
               type:"get",
               url:"{{url('/destino/getdestinos')}}/"+nid,
               success:function(res)
               {       
                
                    if(res)
                    {
                        $("#origen_id").empty();
                        $("#origen_id").append('<option>Seleccionar Origen</option>');

                   
                        
                        $.each(res, function(i, option) {
                            $('#origen_id').append($('<option/>').attr("value", option.id).text(  option.name ));
                        });
                        
                    }
               }
    
            });

            $.ajax({
               type:"get",
               url:"{{url('/destino/getdestinos')}}/"+nid,
               success:function(res)
               {       
                
                    if(res)
                    {
                        $("#destino_id").empty();
                        $("#destino_id").append('<option>Seleccionar Destino</option>');

                   
                        
                        $.each(res, function(i, option) {
                            $('#destino_id').append($('<option/>').attr("value", option.id).text(  option.name ));
                        });
                        
                    }
               }
    
            });            
          
            
            $.ajax({
               type:"get",
               url:"{{url('/vehiculo/getvehiculos')}}/"+nid,
               success:function(res)
               {       
                
                    if(res)
                    {
                        $("#vehiculo_id").empty();
                        $("#vehiculo_id").append('<option>Seleccionar Vehículo</option>');
                     
                        $.each(res, function(i, option) {
                            $('#vehiculo_id').append($('<option/>').attr("value", option.id).text(option.name));
                        });
                    }
               }
    
            });

            $.ajax({
               type:"get",
               url:"{{url('/transportista/gettransportistas')}}/"+nid,
               success:function(res)
               {       
                
                    if(res)
                    {
                        $("#transportista_id").empty();
                        $("#transportista_id").append('<option>Seleccionar Vehículo</option>');
                     
                        $.each(res, function(i, option) {
                            $('#transportista_id').append($('<option/>').attr("value", option.id).text(option.company_name + " (" + option.name + ")"));
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
