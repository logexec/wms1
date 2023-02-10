@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Agregar Ítem a Documento </h4><br><br>
            

    


            <form method="post" action="{{ route('docdet.update') }}" id="myForm">
                @csrf
                <input type="hidden" name="id" value="{{$docdet->id}}">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Cuenta </label>
                    <div class="col-sm-10">
                        <select name="account_id" id="account_id" class="form-group form-select" aria-label="Default select example">
                            <option selected="" value="">Abrir este menú de selección</option>
                            @foreach($cuenta as $cta)
                            <option value="{{ $cta->id }}" @if ($docdet->account_id == $cta->id) {{ 'selected' }} @endif>{{ $cta->name }}</option>
                           @endforeach
                            </select>
                    </div>
                </div>
            <!-- end row -->         
            
             

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Documento </label>
                <div class="col-sm-10">
                    <select name="doccab_id" id="doccab_id" class="form-group form-select" aria-label="Default select example">
                        <option selected="" value="">Abrir este menú de selección</option>
                        @foreach($doccab as $doc)
                       <option value="{{ $doc->id }}" @if ($docdet->doccab_id == $doc->id) {{ 'selected' }} @endif>{{ $doc->name }} </option>
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
                        <option value="{{ $bod->id }}" @if ($docdet->warehouse_id == $bod->id) {{ 'selected' }} @endif>{{ $bod->name }} </option>
                    @endforeach
                        </select>
                </div>
            </div>
        <!-- end row -->    

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Producto </label>
                <div class="col-sm-10">
                    <select name="prod_id" id="prod_id" class="form-group form-select" aria-label="Default select example">
                            <option selected="" value="">Abrir este menú de selección</option>
                            @foreach($producto as $prod)
                            <option value="{{ $prod->id }}" @if ($docdet->prod_id == $prod->id) {{ 'selected' }} @endif>{{ $prod->name }} </option>
                            @endforeach                      
                        </select>
                </div>
            </div>
            <!-- end row --> 

            <div class="row mb-3">
                <div class="col">
                    <label for="example-text-input" class="col-sm-12 col-form-label">Código de Barras</label>
                    <div class="form-group col-sm-12">
                        <input name="name" id="name" class="form-control" type="text" value="{{ $docdet->barcode }}">
                    </div>
                  </div>
                  <div class="col">
                    <label for="example-text-input" class="col-sm-12 col-form-label">Código de Material</label>
                    <div class="form-group col-sm-12">
                        <input name="material_code" id="material_code" class="form-control" type="text" value="{{ $docdet->name }}">
                    </div>
                  </div>
                  <div class="col">
                    <label for="example-text-input" class="col-sm-12 col-form-label" >Descripción</label>
                    <div class="form-group col-sm-12">
                        <input name="material_det" id="material_det" class="form-control" type="text"  value="{{ $docdet->material_det }}">
                    </div>
                  </div>

                                                                        
                
            </div>
            <!-- end row -->   
            
            <div class="row mb-3">
                <label class="col-sm-12 col-form-label">Lote </label>
                <div class="col-sm-4">
                    <input name="batch" id="batch" class="form-control" type="text" value='0'  value="{{ $docdet->batch }}">
                </div>
            </div>
            <!-- end row -->            
            
            <div class="row mb-3">
                <div class="col">
                    <label for="example-text-input" class="col-sm-12 col-form-label">Solicitado</label>
                    <div class="form-group col-sm-12">
                        <input name="total_req" id="total_req" class="form-control" type="number"  value="{{ $docdet->total_req }}">
                    </div>
                    <div class="form-group col-sm-12">
                        <select class="form-control" name="um_total_req">
                        
                            <option value="UNIDAD" @if ($docdet->um_total_req == "UNIDAD") {{ 'selected' }} @endif>UNIDADES</option>
                            <option value="CAJA" @if ($docdet->um_total_req == "UNIDAD") {{ 'selected' }} @endif>CAJAS</option>
                            <option value="KG" @if ($docdet->um_total_req == "UNIDAD") {{ 'selected' }} @endif>KG</option>                            
                            <option value="BALDE" @if ($docdet->um_total_req == "UNIDAD") {{ 'selected' }} @endif>BALDES</option>
                            <option value="FUNDA" @if ($docdet->um_total_req == "FUNDA") {{ 'selected' }} @endif>FUNDAS</option>
                            <option value="BULTO" @if ($docdet->um_total_req == "BULTO") {{ 'selected' }} @endif>BULTOS</option>
                            <option value="PIEZA" @if ($docdet->um_total_req == "PIEZA") {{ 'selected' }} @endif>PIEZAS</option>
                            <option value="LITRO" @if ($docdet->um_total_req == "LITRO") {{ 'selected' }} @endif>LITROS</option>
                            <option value="HECTOLITRO" @if ($docdet->um_total_req == "HECTOLITRO") {{ 'selected' }} @endif>HECTOLITROS</option>
                                                        
                        </select>
                    </div>
                    
                  </div>     
                  <div class="col">
                    <label for="example-text-input" class="col-sm-12 col-form-label">Preparado</label>
                    <div class="form-group col-sm-12">
                        <input name="total_pre" id="total_pre" class="form-control" type="number"  value="{{ $docdet->total_pre }}">
                    </div>                                        
                  </div> 
                  <div class="col">
                    <label for="example-text-input" class="col-sm-12 col-form-label">Confirmado</label>
                    <div class="form-group col-sm-12">
                        <input name="total_con" id="total_con" class="form-control" type="number"  value="{{ $docdet->total_con }}">
                    </div>                                        
                  </div>  
            </div>
            <!-- end row -->            
            
            <div class="row mb-3">
                <label class="col-sm-12 col-form-label">Comentarios </label>
                <div class="col-sm-12">
                    <textarea cols="100" rows="3" name="comments" id="comments">{{ $docdet->comments }}</textarea>
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
               url:"{{url('/doccab/getdocumentos')}}/"+nid,
               success:function(res)
               {       
                
                    if(res)
                    {
                        $("#doccab_id").empty();
                        $("#doccab_id").append('<option>Seleccionar Documento</option>'); 
                        $.each(res, function(i, option) {
                            $('#doccab_id').append($('<option/>').attr("value", option.id).text( option.name + " (" + option.companynamesolicitante  + ")")) ;
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
                   

        }
    });

    </script>
    <script type="text/javascript">
        $("#prod_id").change(function(){
            var nid = $(this).val();
            
            if(nid){
                $.ajax({
                   type:"get",
                   url:"{{url('/producto/getproducto')}}/"+nid,
                   success:function(res)
                   {       
                    
                        if(res)
                        {
                            //alert(res['name']);
                            $('#name').val(res['barcode']);
                            $('#material_code').val(res['name']);
                            $('#material_det').val(res['description']);
                          
                        }
                   }
        
                });
                       
    
            }
        });
    
        </script>
@endsection 
