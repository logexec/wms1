@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Crear Tipo de Transacción</h4><br><br>
        
            <form method="post" action="{{ route('tipotransaccion.store') }}" id="myForm">
                @csrf

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Cuenta </label>
                    <div class="col-sm-10">
                        <select name="account_id" class="form-group form-select" aria-label="Default select example">                            
                            @foreach($cuenta as $cta)
                            <option value="{{ $cta->id }}">{{ $cta->name }}</option>
                            @endforeach
                            </select>
                    </div>
                </div>
            <!-- end row -->  
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Tipo</label>
                <div class="form-group col-sm-10">
                    <select class="form-control" name="type">
                        <option value="">Abrir este menú de selección</option>
                        <option value="I">INGRESO</option>
                        <option value="E">EGRESO</option>
                        <option value="M">MOVIMIENTOS INTERNOS</option>
                        <option value="A">AJUSTE</option> 
                        <option value="V">INVENTARIO</option>                                              
                    </select>
                </div>
            </div>
            <!-- end row -->  

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Código Transacción Numérico</label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" maxlength="4" minlength="4" type="number">
                </div>
            </div>
            <!-- end row -->  
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Código Alfanumérico</label>
                <div class="form-group col-sm-10">
                    <input name="alphacode" class="form-control" maxlength="4" minlength="4" type="string">
                </div>
            </div>
            <!-- end row -->              

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Descripción</label>
                <div class="form-group col-sm-10">
                    <input name="description" class="form-control" type="text">
                </div>
            </div>
            <!-- end row -->
        
            <input type="submit" class="btn btn-info waves-effect waves-light" value="Agregar Tipo de Transacción">
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
                description: {
                    required : true,
                }, 
                type: {
                    required : true,
                },                                               
            },
            messages :{
                name: {
                    required : 'Por favor ingrese el código de transacción',
                },
                account_id: {
                    required : 'Por favor seleccione cuenta',
                },
                description: {
                    required : 'Por favor ingrese la descripción',
                },
                type: {
                    required : 'Por favor ingrese el tipo.',
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
