@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Crear Transacción </h4><br><br>
                
            <form method="post" action="{{ route('transaccion.store') }}" id="myForm">
                @csrf
                <div class="row mb-3">                                    
                </div>        
                       
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Cuenta </label>
                    <div class="col-sm-10">
                        <select name="account_id" id="account_id" class="form-group form-select" aria-label="Default select example">
                            <option selected="" value="">Abrir este menú de selección</option>
                            @foreach($cuenta as $cta)
                            <option value="{{ $cta->id }}">{{ $cta->name }}</option>
                           @endforeach
                            </select>
                    </div>
                </div>
            <!-- end row -->     
            
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Transacción </label>
                <div class="col-sm-10">
                    <select name="tcode_id" id="tcode_id" class="form-group form-select" aria-label="Default select example">
                        <option value="">Abrir este menú de selección</option>                            
                        @foreach($tipos as $tipo)
                        <option value="{{ $tipo->name }}-{{ $tipo->type }}-{{ $tipo->id }} ">{{ $tipo->alphacode }} - {{ $tipo->description }} </option>
                       @endforeach
                        </select>
                </div>
            </div>
        <!-- end row -->               

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Documento </label>
                <div class="col-sm-10">
                    <select name="doc_id" id="doc_id" class="form-group form-select" aria-label="Default select example">
                        <option selected="" value="">Abrir este menú de selección</option>
                       
                        </select>
                </div>
            </div>
        <!-- end row -->              

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Producto </label>
            <div class="col-sm-10">
                <select name="prod_id" id="prod_id" class="form-group form-select" aria-label="Default select example">
                    <option selected="" value="">Abrir este menú de selección</option>
                  
                    </select>
            </div>
        </div>
    <!-- end row --> 

        
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Ubicación Origen </label>
            <div class="col-sm-10">
                <select name="ubic_ori_id" id="ubic_ori_id" class="form-group form-select" aria-label="Default select example">
                    <option selected="" value="">Abrir este menú de selección</option>
                  
                    </select>
            </div>
        </div>
    <!-- end row --> 
    
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Ubicación Destino </label>
        <div class="col-sm-10">
            <select name="ubic_des_id" id="ubic_des_id" class="form-group form-select" aria-label="Default select example">
                <option selected="" value="">Abrir este menú de selección</option>
              
                </select>
        </div>
    </div>
<!-- end row --> 
<div class="row mb-3">
    <label class="col-sm-2 col-form-label">Bodega </label>
    <div class="col-sm-10">
        <select name="warehouse_id" id="warehouse_id" class="form-group form-select" aria-label="Default select example">
            <option selected="" value="">Abrir este menú de selección</option>
           
            </select>
    </div>
</div>
<!-- end row -->    
   

    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Lote</label>
        <div class="form-group col-sm-10">
            <input name="batch" id="batch" class="form-control" type="text">
        </div>
    </div>
    <!-- end row -->     

    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Serial</label>
        <div class="form-group col-sm-10">
            <input name="serial" id="serial" class="form-control" type="text">
        </div>
    </div>
    <!-- end row -->     

    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Unidad de Medida</label>
        <div class="form-group col-sm-10">
            <input name="um" id="um"  class="form-control" type="text">
        </div>
    </div>
    <!-- end row -->  

    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Cantidad</label>
        <div class="form-group col-sm-10">
            <input name="qty" class="form-control" type="number">
        </div>
    </div>
    <!-- end row -->  
        
                <input type="submit" class="btn btn-info waves-effect waves-light" value="Generar Transacción">
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
                        
                        $.each(res, function(i, option) {
                            $('#warehouse_id').append($('<option/>').attr("value", option.id).text(option.name));
                        });
                    }
               }
    
            });

            

            $.ajax({
               type:"get",
               url:"{{url('/producto/getproductos')}}/"+nid,
               success:function(res)
               {       
                
                    if(res)
                    {
                        $("#prod_id").empty();
                        $("#prod_id").append('<option>Seleccionar Producto</option>'); 
                        $.each(res, function(i, option) {
                            $('#prod_id').append($('<option/>').attr("value", option.id).text( option.name + " (" + option.sdescription  + ")")) ;
                        });
                    }
               }
    
            });

            $.ajax({
               type:"get",
               url:"{{url('/ubicacion/getubicaciones')}}/"+nid,
               success:function(res)
               {       
                
                    if(res)
                    {
                        $("#ubic_ori_id").empty();
                        $("#ubic_ori_id").append('<option>Seleccionar Ubicación Origen</option>'); 
                        $.each(res, function(i, option) {
                            $('#ubic_ori_id').append($('<option/>').attr("value", option.id).text( option.name )) ;
                        });
                    }
               }
    
            });

            $.ajax({
               type:"get",
               url:"{{url('/ubicacion/getubicaciones')}}/"+nid,
               success:function(res)
               {       
                
                    if(res)
                    {
                        $("#ubic_des_id").empty();
                        $("#ubic_des_id").append('<option>Seleccionar Ubicación Destino</option>'); 
                        $.each(res, function(i, option) {
                            $('#ubic_des_id').append($('<option/>').attr("value", option.id).text( option.name )) ;
                        });
                    }
               }
    
            });

            $.ajax({
               type:"get",
               url:"{{url('/doccab/getdocumentos')}}/"+nid,
               success:function(res)
               {       
                
                    if(res)
                    {
                        $("#doc_id").empty();
                        $("#doc_id").append('<option>Seleccionar Documento</option>'); 
                        $.each(res, function(i, option) {
                            $('#doc_id').append($('<option/>').attr("value", option.id).text( option.name +' - '+ option.namesolicitante + ' - Tipo: ' + option.type )) ;
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
                        $.each(res2, function(i, option) {
                            $('#destinatario_id').append($('<option/>').attr("value", option.id).text(option.company_name + " (" + option.name + ")"));
                        });
                    }
               }
    
            });                

        }
    });    

    $("#tcode_id").change(function(){
        var nid = $(this).val();
        values=nid.split('-');
        var aid = $("#account_id").val();

        alert("{{url('/doccab/getdocumentostype')}}/"+values[1]+"/"+aid);
            switch (values[0]) {
                case '1000':
                    console.log('Transaccion 1000.');
                    $("#ubic_ori_id").prop('disabled',true);
                    break;
                case '1001':
                console.log('Transaccion 1001.');
                break;            
                default:
                    console.log(`Sorry, we are out of ${expr}.`);
            }
        
        
        if(nid){
            $.ajax({
               type:"get",
               url:"{{url('/doccab/getdocumentostype')}}/"+values[1]+"/"+aid ,
               success:function(res2)
               {       
                    
                    if(res2)
                    {
                        $("#doc_id").empty();
                        $("#doc_id").append('<option>Seleccionar Documento</option>');    
                        $.each(res2, function(i, option) {
                            $('#doc_id').append($('<option/>').attr("value", option.id).text( option.name +' - '+ option.namesolicitante + ' - Tipo: ' + option.type )) ;
                        });
                    }
               }
    
            });                

        }
    });    

    $("#doc_id").change(function(){
        var nid = $(this).val();
        var aid = $("#account_id").val();
        
        if(nid){
            $.ajax({
               type:"get",
               url:"{{url('/doccab/getitemsdoc')}}/"+nid+"/"+aid ,
               success:function(res2)
               {       
                
                    if(res2)
                    {
                        $("#prod_id").empty();
                        $("#prod_id").append('<option>Seleccionar Producto</option>');                        
                        $.each(res2, function(i, option) {
                            $('#prod_id').append($('<option/>').attr("value", option.prod_id).text( option.material_code +' - '+ option.material_det + ' / S: ' + option.total_req + ' / P: ' + option.total_pre + ' / C: ' + option.total_con )) ;
                        });
                    }
               }
    
            });                

        }
    }); 

    $("#prod_id").change(function(){
        var nid = $(this).val();
        var aid = $("#account_id").val();
        
        if(nid){
            $.ajax({
               type:"get",
               url:"{{url('/doccab/getitemdoc')}}/"+nid+"/"+aid ,
               success:function(res2)
               {       
                
                    if(res2)
                    {
                        //$("#prod_id").empty();
                        //$("#prod_id").append('<option>Seleccionar Producto</option>');                        
                        $.each(res2, function(i, option) {
                            
                            if(option.batch == '0'){
                                $("#batch").prop('disabled',true);
                            }else{
                                $("#batch").prop('disabled',false);
                            }

                            if(option.serial == 'NO'){
                                $("#serial").prop('disabled',true);
                            }else{
                                $("#serial").prop('disabled',false);
                            }
                            $('#um').val(option.um_default);



                            //$('#prod_id').append($('<option/>').attr("value", option.id).text( option.material_code +' - '+ option.material_det + ' / S: ' + option.total_req + ' / P: ' + option.total_pre + ' / C: ' + option.total_con )) ;
                        });
                    }
               }
    
            });                

        }
    }); 

    </script>
@endsection 
