@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Crear Cuenta de WMS </h4><br><br>
            

    


            <form method="post" action="{{ route('cuenta.store') }}" id="myForm">
                @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Nombre de la Cuenta</label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text">
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

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Teléfono</label>
                <div class="form-group col-sm-10">
                    <input name="phone" class="form-control" type="phone">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Nombre Completo Responsable</label>
                <div class="form-group col-sm-10">
                    <input name="responsible" class="form-control" type="text">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Plan WMS</label>
                <div class="form-group col-sm-10">
                    <select class="form-control" name="plan">
                        <option value="ILIMITADO">ILIMITADO</option>
                    </select>
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-control" name="status">
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
                    </select>
                </div>
            </div>
            <!-- end row -->

 


        
<input type="submit" class="btn btn-info waves-effect waves-light" value="Agregar Cuenta">
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
