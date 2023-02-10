@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Crear Usuario </h4><br><br>
            

    


            <form class="form-horizontal mt-3" method="POST" action="{{ route('admin.store') }}">
                @csrf
    
        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" id="name" type="text" name="name" required="" placeholder="Nombre y Apellido">
            </div>
        </div>
    
        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" id="username" type="text" name="username" required="" placeholder="Nombre de Usuario">
            </div>
        </div>
    
         <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" id="email" type="email" name="email" required="" placeholder="Correo Electrónico">
            </div>
        </div>
    
        <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" id="password" type="password" name="password" required="" placeholder="Contraseña">
            </div>
        </div>
    
    
         <div class="form-group mb-3 row">
            <div class="col-12">
                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required="" placeholder="Confirmación de Contraseña">
            </div>
        </div>
        <div class="row mb-3">
            
            <div class="col-sm-12">
                <select multiple name="account_id[]" id="account_id" class="form-group form-select" aria-label="Default select example">
                    
                    @foreach($cuenta as $cta)
                    <option value="{{ $cta->id }}">{{ $cta->name }}</option>
                   @endforeach
                    </select>
            </div>
        </div>
        <!-- end row -->       
    
        <div class="row mb-3">        
            <div class="col-sm-12">
                <select multiple id="warehouse_id" name="warehouse_id[]" class="form-group form-select" aria-label="Default select example">               
                    @foreach($bodega as $bod)
                    <option value="{{ $bod->id }}">{{ $bod->namecuenta }} -{{ $bod->namebodega }}</option>
                @endforeach
                    </select>
            </div>
        </div>
        <!-- end row --> 
    
        <div class="row mb-3">
            <label for="example-text-input" class="col-sm-2 col-form-label">Rol</label>
            <div class="col-sm-10">
                <select multiple class="form-control" name="rol[]" required>
                    <option selected="" value="">Abrir este menú de selección</option>
                    <option value="super">Administrador Total</option>
                    <option value="adct">Administrador Cuenta</option>
                    <option value="adbo">Administrador Bodega</option>
                    <option value="plan">Planificador de Viajes</option>
                    <option value="prep">Aux. Preparador</option>                                
                    <option value="veri">Aux. Verificador</option>                                
                    <option value="ubic">Aux. Alm. Interno</option>                                
                    <option value="ingr">Aux. Recepción Carga</option>                                
                    <option value="audi">Auditor</option>                                
                </select>
            </div>
        </div>
        <!-- end row -->     
        <div class="form-group mb-3 row">
            <div class="col-12">
                <div class="custom-control custom-checkbox">
                    
                </div>
            </div>
        </div>
    
        <div class="form-group text-center row mt-3 pt-1">
            <div class="col-12">
                <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Registrar</button>
            </div>
        </div>
    
        <div class="form-group mt-2 mb-0 row">
            <div class="col-12 mt-3 text-center">
                <a href="{{ route('login') }}" class="text-muted">Ya tienes una cuenta?</a>
            </div>
        </div>
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
                email: {
                    required : true,
                }, 
                phone: {
                    required : true,
                }, 
                responsible: {
                    required : true,
                }, 

                 
            },
            messages :{
                name: {
                    required : 'Por favor ingrese el Nombre de la Cuenta',
                },
                email: {
                    required : 'Por favor ingrese el Correo Electrónico de la Cuenta',
                },
                phone: {
                    required : 'Por favor ingrese el Teléfono de la Cuenta',
                },
                responsible: {
                    required : 'Por favor ingrese el Nombre y Apellido del Responsable de la Cuenta.',
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
