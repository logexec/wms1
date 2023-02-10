@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Modificar Ruta </h4><br><br>                
            <form method="post" action="{{ route('ruta.update') }}" id="myForm">
                @csrf
                <input type="hidden" name="id" value="{{$ruta->id}}">
                <div class="row mb-3">                                    
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Código de Ruta</label>
                    <div class="form-group col-sm-10">
                        <input name="name" class="form-control" type="text" value="{{ $ruta->name }}" >
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Cuenta </label>
                    <div class="col-sm-10">
                        <select name="account_id" id="account_id" class="form-group form-select" aria-label="Default select example">
                            <option selected="" value="">Abrir este menú de selección</option>
                            @foreach($cuenta as $cta)
                            <option value="{{ $cta->id }}" @if ($ruta->account_id == $cta->id) {{ 'selected' }} @endif>{{ $cta->name }}</option>
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
                            <option value="{{ $bod->id }}" @if ($ruta->warehouse_id == $bod->id) {{ 'selected' }} @endif>{{ $bod->name }} </option>
                       @endforeach
                        </select>
                </div>
            </div>
        <!-- end row -->               
            
             

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Origen </label>
                        <div class="col-sm-10">
                            <select name="origen_id" id="origen_id" class="form-group form-select" aria-label="Default select example">
                                <option selected="" value="">Abrir este menú de selección</option>
                                @foreach($origen as $ori)
                                <option value="{{ $ori->id }}" @if ($ruta->origen_id == $ori->id) {{ 'selected' }} @endif>{{ $ori->name }} </option>
                                @endforeach
                                </select>
                        </div>
                    </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Destino </label>
                    <div class="col-sm-10">
                        <select name="destino_id" id="destino_id" class="form-group form-select" aria-label="Default select example">
                            <option selected="" value="">Abrir este menú de selección</option>
                            @foreach($destino as $des)
                            <option value="{{ $des->id }}" @if ($ruta->destino_id == $des->id) {{ 'selected' }} @endif>{{ $des->name }} </option>
                            @endforeach
                            </select>
                    </div>
                </div>
            <!-- end row -->      
            
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Vehículo </label>
                <div class="col-sm-10">
                    <select name="vehiculo_id" id="vehiculo_id" class="form-group form-select" aria-label="Default select example">
                        <option selected="" value="">Abrir este menú de selección</option>
                        @foreach($vehiculo as $veh)
                        <option value="{{ $veh->id }}" @if ($ruta->vehiculo_id == $veh->id) {{ 'selected' }} @endif>{{ $veh->name }} </option>
                        @endforeach
                        </select>
                </div>
            </div>
                <!-- end row -->            

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Transportista </label>
                    <div class="col-sm-10">
                        <select name="transportista_id" id="transportista_id" class="form-group form-select" aria-label="Default select example">
                            <option selected="" value="">Abrir este menú de selección</option>
                            @foreach($transportista as $tra)
                            <option value="{{ $tra->id }}" @if ($ruta->transportista_id == $tra->id) {{ 'selected' }} @endif>{{ $tra->name }} </option>
                            @endforeach
                            </select>
                    </div>
                </div>
            <!-- end row -->             

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Estado</label>
                <div class="form-group col-sm-10">
                    <select name="status" class="form-control" name="plan">
                        <option value="Pendiente" @if ($ruta->estado == "Pendiente") {{ 'selected' }} @endif>PENDIENTE</option>
                        <option value="En_Proceso"  @if ($ruta->estado == "En_Proceso") {{ 'selected' }} @endif>EN PROCESO</option>
                        <option value="Finalizado"  @if ($ruta->estado == "Finalizado") {{ 'selected' }} @endif>FINALIZADO</option>                        
                    </select>
                </div>
            </div>
            <!-- end row -->      
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Fecha Hora de Carga</label>
                <div class="form-group col-sm-10">
                    <input name="upload_date_hour" class="form-control" type="datetime-local" value="{{ $ruta->upload_date_hour }}">
                </div>
            </div>

            <div class="row mb-3">
                
                <div class="form-group col-sm-10">
                    <input name="upload_date" class="form-control" type="hidden" >
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Orden de Carga</label>
                <div class="form-group col-sm-10">
                    <input name="order_upload" class="form-control" type="number" value="{{ $ruta->order_upload }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Inicio de Ruta</label>
                <div class="form-group col-sm-10">
                    <input name="start_route" class="form-control" type="date"  value="{{ $ruta->start_route }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Fin de Ruta</label>
                <div class="form-group col-sm-10">
                    <input name="finish_route" class="form-control" type="date"  value="{{ $ruta->finish_route }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Comentarios</label>
                <div class="form-group col-sm-10">
                    <textarea name="comments" class="form-control" type="text">{{ $ruta->comments }}</textarea>
                </div>
            </div>
            <!-- end row --> 
                <input type="submit" class="btn btn-info waves-effect waves-light" value="Actualizar Ruta">
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
