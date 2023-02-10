@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Editar Bodega</h4><br><br>
        
            <form method="post" action="{{ route('bodega.update') }}" id="myForm">
                @csrf

                <input type="hidden" name="id" value="{{$bodega->id}}">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Cuenta </label>
                    <div class="col-sm-10">
                        <select name="account_id" class="form-select" aria-label="Default select example">
                            <option selected="" value="">Abrir este menú de selección</option>
                            @foreach($cuenta as $cta)
                                @if ($bodega->account_id == $cta->id)
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
                <label for="example-text-input" class="col-sm-2 col-form-label">Nombre de la Bodega</label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text" value="{{ $bodega->name }}">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Correo Electrónico</label>
                <div class="form-group col-sm-10">
                    <input name="email" class="form-control" type="email" value="{{ $bodega->email }}">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Teléfono</label>
                <div class="form-group col-sm-10">
                    <input name="phone" class="form-control" type="phone" value="{{ $bodega->phone }}">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Nombre Completo Responsable</label>
                <div class="form-group col-sm-10">
                    <input name="responsible" class="form-control" type="text" value="{{ $bodega->responsible }}">
                </div>
            </div>
            <!-- end row -->
        
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Metros Cuadrados</label>
                <div class="form-group col-sm-10">
                    <input name="m2" class="form-control" type="number"  value="{{ $bodega->m2 }}">
                </div>
            </div>
            <!-- end row -->     

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Metros Cúbicos</label>
                <div class="form-group col-sm-10">
                    <input name="m3" class="form-control" type="number"  value="{{ $bodega->m3 }}">
                </div>
            </div>
            <!-- end row -->     
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Capacidad Pallets</label>
                <div class="form-group col-sm-10">
                    <input name="pallet_capacity" class="form-control" type="number"  value="{{ $bodega->pallet_capacity }}">
                </div>
            </div>
            <!-- end row -->     
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-control" name="status">
                        @if ($bodega->status == 'ACTIVA')
                        <option selected value="ACTIVA">ACTIVA</option>
                        @else
                            <option value="ACTIVA">ACTIVA</option>
                        @endif
                        
                        @if ($bodega->status == 'INACTIVA')
                            <option selected value="INACTIVA">INACTIVA</option>
                        @else
                            <option value="INACTIVA">INACTIVO</option>
                        @endif
                    </select>
                </div>
            </div>
            <!-- end row -->            

                <input type="submit" class="btn btn-info waves-effect waves-light" value="Actualizar Bodega">
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
                email: {
                    required : true,
                }, 
                phone: {
                    required : true,
                }, 
                responsible: {
                    required : true,
                }, 
                m3: {
                    required : true,
                }, 
                m2: {
                    required : true,
                }, 
                pallet_capacity: {
                    required : true,
                }, 
                
                 
            },
            messages :{
                name: {
                    required : 'Por favor ingrese el Nombre de la Bodega',
                },
                name: {
                    required : 'Por favor seleccione la Cuenta de la Bodega',
                },
                email: {
                    required : 'Por favor ingrese el Correo Electrónico de la Bodega',
                },
                phone: {
                    required : 'Por favor ingrese el Teléfono de la Bodega',
                },
                responsible: {
                    required : 'Por favor ingrese el Nombre y Apellido del Responsable de la Bodega.',
                },
                m3: {
                    required : 'Por favor ingrese la capacidad total  en metros cúbicos.',
                },
                m2: {
                    required : 'Por favor ingrese la capacidad total  en metros cúbicos cuadrados.',
                },
                pallet_capacity: {
                    required : 'Por favor ingrese la capacidad total en pallets.',
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
