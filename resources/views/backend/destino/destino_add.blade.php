@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Crear Destino</h4><br><br>
        
            <form method="post" action="{{ route('destino.store') }}" id="myForm">
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
                <label for="example-text-input" class="col-sm-2 col-form-label">Nombre Destino</label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text">
                </div>
            </div>
            <!-- end row -->                        
             
            <input type="submit" class="btn btn-info waves-effect waves-light" value="Agregar Destino">
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
                barcode: {
                    required : true,
                }, 
                type_barcode: {
                    required : true,
                }, 
                sdescription: {
                    required : true,
                }, 
                description: {
                    required : true,
                }, 
                um_default: {
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
                width: {
                    required : true,
                }, 
                um_width: {
                    required : true,
                }, 
                high: {
                    required : true,
                }, 
                um_high: {
                    required : true,
                }, 
                long: {
                    required : true,
                }, 
                um_long: {
                    required : true,
                }, 
                category: {
                    required : true,
                }, 
                subcategory: {
                    required : true,
                }, 
                units_box: {
                    required : true,
                }, 
                units_pallet: {
                    required : true,
                }, 
                inventory_days: {
                    required : true,
                }, 
                status: {
                    required : true,
                }, 
                                            
                 
            },
            messages :{
                name: {
                    required : 'Por favor ingrese el Código Interno del Producto',
                },
                account_id: {
                    required : 'Por favor seleccione la Cuenta del producto',
                },
                barcode: {
                    required : 'Por favor ingrese el Correo Electrónico del Producto',
                },
                type_barcode: {
                    required : 'Por favor ingrese el tipo de Código de Barras.',
                },
                sdescription: {
                    required : 'Por favor ingrese la descripción corta del producto.',
                },
                description: {
                    required : 'Por favor ingrese la descripción larga del producto.',
                },
                um_default: {
                    required : 'Por favor ingrese la unidad de carga predeterminada.',
                },                
                weight: {
                    required : 'Por favor ingrese el peso del producto.',
                },  
                um_weight: {
                    required : 'Por favor seleccione la unidad de medida del peso.',
                },  
                volume: {
                    required : 'Por favor ingrese el volumen del producto.',
                },  
                um_volume: {
                    required : 'Por favor seleccione la unidad de medida del volumen.',
                },  
                width: {
                    required : 'Por favor ingrese el ancho del producto.',
                },  
                um_width: {
                    required : 'Por favor seleccione la unidad de medida del ancho de producto.',
                },  
                high: {
                    required : 'Por favor ingrese el alto del producto.',
                },  
                um_high: {
                    required : 'Por favor ingrese la unidad de medida del alto del producto.',
                },  
                long: {
                    required : 'Por favor ingrese el largo del producto.',
                },  
                um_long: {
                    required : 'Por favor seleccione la unidad de medida del largo del producto.',
                },  
                category: {
                    required : 'Por favor ingrese la categoría del producto.',
                },  
                subcategory: {
                    required : 'Por favor ingrese la subcategoría del producto.',
                },  
                units_box: {
                    required : 'Por favor ingrese la cantidad de unidades de la caja principal.',
                },  
                units_pallet: {
                    required : 'Por favor ingrese la cantidad total de unidades del pallet.',
                },  
                inventory_days: {
                    required : 'Por favor ingrese cuántos días de inventario debe tener el producto.',
                },  
                status: {
                    required : 'Por favor seleccione el estado del producto.',
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
