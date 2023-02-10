@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Crear Solicitante</h4><br><br>
        
            <form method="post" action="{{ route('solicitante.store') }}" id="myForm">
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
                <label for="example-text-input" class="col-sm-2 col-form-label">Código Solicitante</label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text">
                </div>
            </div>
            <!-- end row -->            

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Nombre Solicitante</label>
                <div class="form-group col-sm-10">
                    <input name="company_name" class="form-control" type="text">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Identificación Fiscal</label>
                <div class="form-group col-sm-10">
                    <input name="fiscal_identification" class="form-control" type="text">
                </div>
            </div>
            <!-- end row -->   

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Ciudad</label>
                <div class="form-group col-sm-10">
                    <select class="form-control" name="city">
                        <option value="">..</option>
                        <option value="QUITO">QUITO</option>
                        <option value="GUAYAQUIL">GUAYAQUIL</option>                                           
                    </select>
                </div>
            </div>
            <!-- end row -->      

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Provincia</label>
                <div class="form-group col-sm-10">
                    <select class="form-control" name="state">
                        <option value="">..</option>
                        <option value="PICHINCHA">PICHINCHA</option>
                        <option value="GUAYAS">GUAYAS</option>                                           
                    </select>
                </div>
            </div>
            <!-- end row -->                
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">País</label>
                <div class="form-group col-sm-10">
                    <select class="form-control" name="country">                        
                        <option value="ECUADOR">ECUADOR</option>                                                                
                    </select>
                </div>
            </div>
            <!-- end row -->  

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Código Postal</label>
                <div class="form-group col-sm-10">
                    <input name="zip" class="form-control" type="text">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Dirección</label>
                <div class="form-group col-sm-10">
                    <input name="address" class="form-control" type="text" maxlength="255">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Latitud</label>
                <div class="form-group col-sm-10">
                    <input name="lat" class="form-control" type="number">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Longitud</label>
                <div class="form-group col-sm-10">
                    <input name="lon" class="form-control" type="number">
                </div>
            </div>
            <!-- end row -->     
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Teléfono</label>
                <div class="form-group col-sm-10">
                    <input name="phone" class="form-control" type="number">
                </div>
            </div>
            <!-- end row -->             
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Correo Electrónico</label>
                <div class="form-group col-sm-10">
                    <input name="email" class="form-control" type="email">
                </div>
            </div>
            <!-- end row -->                  
            
             
            <input type="submit" class="btn btn-info waves-effect waves-light" value="Agregar Solicitante">
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
                company_name: {
                    required : true,
                }, 
                fiscal_identification: {
                    required : true,
                }, 
                city: {
                    required : true,
                }, 
                state: {
                    required : true,
                }, 
                country: {
                    required : true,
                }, 
                zip: {
                    required : true,
                }, 
                address: {
                    required : true,
                }, 
                lat: {
                    required : true,
                }, 
                lon: {
                    required : true,
                }, 
                phone: {
                    required : true,
                }, 
                email: {
                    required : true,
                },                 
                                            
                 
            },
            messages :{
                name: {
                    required : 'Por favor ingrese el Código Interno del Solicitante',
                },
                account_id: {
                    required : 'Por favor seleccione la Cuenta del Solicitante',
                },
                company_name: {
                    required : 'Por favor ingrese el Nombre del Solicitante',
                },
                fiscal_identification: {
                    required : 'Por favor ingrese la identificación fiscal del Solicitante.',
                },
                city: {
                    required : 'Por favor ingrese la ciudad corta del Solicitante.',
                },
                state: {
                    required : 'Por favor ingrese la provincia larga del Solicitante.',
                },
                country: {
                    required : 'Por favor ingrese el país del Solicitante.',
                },                
                zip: {
                    required : 'Por favor ingrese el código postal del Solicitante.',
                },  
                address: {
                    required : 'Por favor seleccione la dirección del Solicitante.',
                },  
                lat: {
                    required : 'Por favor ingrese la latitud del Solicitante.',
                },  
                lon: {
                    required : 'Por favor ingrese la longitud del Solicitante.',
                },  
                phone: {
                    required : 'Por favor ingrese el teléfono del Solicitante.',
                },  
                email: {
                    required : 'Por favor seleccione el email del Solicitante.',
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
