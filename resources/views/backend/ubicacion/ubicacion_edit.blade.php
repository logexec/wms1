@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Editar Ubicación</h4><br><br>
        
            <form method="post" action="{{ route('ubicacion.update') }}" id="myForm">
                @csrf
                
                <input type="hidden" name="id" value="{{$ubicacion->id}}">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Cuenta </label>
                    <div class="col-sm-10">
                        <select name="account_id" id="account_id" class="form-group form-select" aria-label="Default select example">
                            <option selected="" value="">Abrir este menú de selección</option>
                            @foreach($cuenta as $cta)
                            @if ($ubicacion->account_id == $cta->id)
                                <option selected value="{{ $cta->id }}">{{ $cta->name }}</option>
                            @else
                                <option value="{{ $cta->id }}">{{ $cta->name }}</option>
                            @endif                            
                        @endforeach   
                            </select>
                    </div>
                </div>
            <!-- end row -->       
            
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Bodega </label>
                <div class="col-sm-10">
                    <select id="warehouse_id" name="warehouse_id" class="form-group form-select" aria-label="Default select example">
                        <option selected="" value="">Abrir este menú de selección</option>
                        @foreach($bodega as $bod)
                            @if ($ubicacion->warehouse_id == $bod->id)
                                <option selected value="{{ $bod->id }}">{{ $bod->name }}</option>
                            @else
                                <option value="{{ $bod->id }}">{{ $bod->name }}</option>
                            @endif                            
                        @endforeach                       
                        </select>
                </div>
            </div>
        <!-- end row -->                

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Nombre de la Ubicación</label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text" value="{{$ubicacion->name}}">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Ancho (metros)</label>
                <div class="form-group col-sm-10">
                    <input name="width" class="form-control" type="number" value="{{$ubicacion->width}}">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Alto (metros)</label>
                <div class="form-group col-sm-10">
                    <input name="high" class="form-control" type="number" value="{{$ubicacion->high}}">
                </div>
            </div>
            <!-- end row -->          
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Profundidad (metros)</label>
                <div class="form-group col-sm-10">
                    <input name="long" class="form-control" type="number" value="{{$ubicacion->long}}">
                </div>
            </div>
            <!-- end row -->      
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">SKUs Exclusivos</label>
                <div class="form-group col-sm-10">
                    <input name="sku" class="form-control" type="text" value="{{$ubicacion->sku}}">
                </div>
            </div>
            <!-- end row -->   

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Ranking</label>
                <div class="form-group col-sm-10">
                    <input name="ranking" class="form-control" type="number" value="{{$ubicacion->ranking}}">
                </div>
            </div>
            <!-- end row -->  
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Capacidad Pallets</label>
                <div class="form-group col-sm-10">
                    <input name="total_pallets" class="form-control" type="number" value="{{$ubicacion->total_pallets}}">
                </div>
            </div>
            <!-- end row -->     
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-control" name="status">
                        @if ($ubicacion->status == 'ACTIVA')
                        <option selected value="ACTIVA">ACTIVA</option>
                        @else
                            <option value="ACTIVA">ACTIVA</option>
                        @endif
                        
                        @if ($ubicacion->status == 'INACTIVA')
                            <option selected value="INACTIVA">INACTIVA</option>
                        @else
                            <option value="INACTIVA">INACTIVA</option>
                        @endif
                    </select>
                </div>
            </div>
            <!-- end row -->        

                    

                <input type="submit" class="btn btn-info waves-effect waves-light" value="Actualizar Ubicación">
            </form>
             
           
           
        </div>
    </div>
</div> <!-- end col -->
</div>
 


</div>
</div>
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
            }
    });
    </script>
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                account_id: {
                    required : true,
                }, 
                warehouse_id: {
                    required : true,
                }, 
                width: {
                    required : true,
                }, 
                high: {
                    required : true,
                }, 
                long: {
                    required : true,
                },               
                ranking: {
                    required : true,
                }, 
                total_pallets: {
                    required : true,
                },  
                status: {
                    required : true,
                }, 
                
                 
            },
            messages :{
                name: {
                    required : 'Por favor ingrese el Nombre de la Ubicación',
                },
                account_id: {
                    required : 'Por favor seleccione la Cuenta de la Ubcación',
                },
                warehouse_id: {
                    required : 'Por favor seleccione la bodega de la ubicación',
                },
                width: {
                    required : 'Por favor ingrese el ancho de la ubicación en metros',
                },
                high: {
                    required : 'Por favor ingrese el alto de la ubicación en metros',
                },
                long: {
                    required : 'Por favor ingrese la profundidad de la ubicación en metros',
                },                
                ranking: {
                    required : 'Por favor ingrese el ranking de la ubicación.',
                },     
                total_pallets: {
                    required : 'Por favor ingrese la capacidad total en pallets de la ubicación.',
                },        
                status: {
                    required : 'Por favor seleccione el estado de la ubicación.',
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
 
@endsection 
