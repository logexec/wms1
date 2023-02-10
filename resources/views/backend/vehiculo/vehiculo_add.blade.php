@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Crear Vehículo</h4><br><br>
        
            <form method="post" action="{{ route('vehiculo.store') }}" id="myForm">
                @csrf

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Cuenta </label>
                    <div class="col-sm-10">
                        <select name="account_id" class="form-group form-select" aria-label="Default select example">
                            <option selected="" value="">Abrir este menú de selección</option>
                            @foreach($cuenta as $cta)
                            <option value="{{ $cta->id }}">{{ $cta->name }}</option>
                           @endforeach
                            </select>
                    </div>
                </div>
            <!-- end row -->                

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Placa</label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text" maxlength="7" minlength="7">
                </div>
            </div>
            <!-- end row -->            

              

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Peso</label>
                <div class="form-group col-sm-10">
                    <input name="weight" class="form-control" type="number">
                </div>
            </div>
            <!-- end row -->     
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">UM Peso</label>
                <div class="form-group col-sm-10">
                    <select class="form-control" name="um_weight">
                        
                        <option value="Tn">Tn</option>
                                                       
                    </select>
                </div>
            </div>
            <!-- end row -->     

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Volumen</label>
                <div class="form-group col-sm-10">
                    <input name="volume" class="form-control" type="number">
                </div>
            </div>
            <!-- end row -->               
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">UM Volumen</label>
                <div class="col-sm-10">
                    <select class="form-control" name="um_volume">
                        <option value="m3">m3</option>                        
                    </select>
                </div>
            </div>
            <!-- end row -->          
                                
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Capacidad Pallets</label>
                <div class="form-group col-sm-10">
                    <input name="pallets" class="form-control" type="number">
                </div>
            </div>
            <!-- end row -->     
            
          
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-10">
                    <select class="form-control" name="status">
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
                    </select>
                </div>
            </div>
            <!-- end row -->                 
             
            <input type="submit" class="btn btn-info waves-effect waves-light" value="Agregar Vehículo">
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
                account_id: {
                    required : true,
                }, 
               
                weight: {
                    required : true,
                }, 
                um_weight: {
                    required : true,
                }, 
                volume: {
                    required : true,
                }, 
                um_volume: {
                    required : true,
                }, 
                
                pallets: {
                    required : true,
                }, 
               
                status: {
                    required : true,
                }, 
                                            
                 
            },
            messages :{
                name: {
                    required : 'Por favor ingrese la placa del vehículo',
                },
                account_id: {
                    required : 'Por favor seleccione la Cuenta del vehículo',
                },
                    
                weight: {
                    required : 'Por favor ingrese el peso del vehículo.',
                },  
                um_weight: {
                    required : 'Por favor seleccione la unidad de medida del peso.',
                },  
                volume: {
                    required : 'Por favor ingrese el volumen del vehículo.',
                },  
                um_volume: {
                    required : 'Por favor seleccione la unidad de medida del volumen.',
                },  
                
                pallets: {
                    required : 'Por favor ingrese la cantidad total de unidades del pallet.',
                },  
  
                status: {
                    required : 'Por favor seleccione el estado del vehículo.',
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
