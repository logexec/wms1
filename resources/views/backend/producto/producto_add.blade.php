@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Crear Producto</h4><br><br>
        
            <form method="post" action="{{ route('producto.store') }}" id="myForm">
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
                <label for="example-text-input" class="col-sm-2 col-form-label">Código Interno</label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text">
                </div>
            </div>
            <!-- end row -->            

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Código de Barras</label>
                <div class="form-group col-sm-10">
                    <input name="barcode" class="form-control" type="text">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Tipo deCódigo de Barras</label>
                <div class="form-group col-sm-10">
                    <select class="form-control" name="type_barcode">
                        <option value="EAN13">EAN13</option>
                        <option value="EAN13">EAN14</option>
                        <option value="ITF">ITF</option>
                        <option value="CODE39">CODE39</option>
                        <option value="CODE93">CODE93</option>
                        <option value="CODABAR">CODABAR</option>
                        <option value="CODE128">CODE128</option>
                        <option value="CODE128">QR</option>
                        <option value="GS1">GS1</option>
                        
                    </select>
                </div>
            </div>
            <!-- end row -->            

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Descripción Corta</label>
                <div class="form-group col-sm-10">
                    <input name="sdescription" class="form-control" type="text">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Descripción Larga</label>
                <div class="form-group col-sm-10">
                    <input name="description" class="form-control" type="text">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Unidad de Carga Default</label>
                <div class="form-group col-sm-10">
                    <select class="form-control" name="um_default">
                        
                        <option value="UNIDAD">UNIDAD</option>
                        <option value="CAJA">CAJA</option>
                        <option value="PESO">PESO</option>
                        <option value="VOLUMEN">VOLUMEN</option>
                        <option value="BALDE">BALDE</option>
                        <option value="FUNDA">FUNDAS</option>
                        <option value="BULTO">BULTO</option>
                        <option value="PIEZA">PIEZA</option>
                        
                        
                    </select>
                </div>
            </div>
            <!-- end row -->   
        
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Especificaciones</label>
                <div class="form-group col-sm-10">
                    <input name="specifications" class="form-control" type="text">
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
                        
                        <option value="KG">KG</option>
                                                       
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
                <label for="example-text-input" class="col-sm-2 col-form-label">Ancho</label>
                <div class="form-group col-sm-10">
                    <input name="width" class="form-control" type="number">
                </div>
            </div>
            <!-- end row -->               
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">UM Ancho</label>
                <div class="col-sm-10">
                    <select class="form-control" name="um_width">
                        <option value="metros">metros</option>                        
                    </select>
                </div>
            </div>
            <!-- end row -->             

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Alto</label>
                <div class="form-group col-sm-10">
                    <input name="high" class="form-control" type="number">
                </div>
            </div>
            <!-- end row -->               
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">UM Alto</label>
                <div class="col-sm-10">
                    <select class="form-control" name="um_high">
                        <option value="metros">metros</option>                        
                    </select>
                </div>
            </div>
            <!-- end row -->   
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Largo</label>
                <div class="form-group col-sm-10">
                    <input name="long" class="form-control" type="number">
                </div>
            </div>
            <!-- end row -->               
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">UM Largo</label>
                <div class="col-sm-10">
                    <select class="form-control" name="um_long">
                        <option value="metros">metros</option>                        
                    </select>
                </div>
            </div>
            <!-- end row -->              

               

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Categoría</label>
                <div class="form-group col-sm-10">
                    <input name="category" class="form-control" type="text">
                </div>
            </div>
            <!-- end row -->    
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Subcategoría</label>
                <div class="form-group col-sm-10">
                    <input name="subcategory" class="form-control" type="text">
                </div>
            </div>
            <!-- end row -->     
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Unidades/Caja</label>
                <div class="form-group col-sm-10">
                    <input name="units_box" class="form-control" type="number">
                </div>
            </div>
            <!-- end row -->     
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Unidades/Pallet</label>
                <div class="form-group col-sm-10">
                    <input name="units_pallet" class="form-control" type="number">
                </div>
            </div>
            <!-- end row -->     
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Días de inventario</label>
                <div class="form-group col-sm-10">
                    <input name="inventory_days" class="form-control" type="number">
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
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Serial</label>
                <div class="col-sm-10">
                    <select class="form-control" name="serial">
                        <option value="NO">NO</option>
                        <option value="SI">SI</option>
                    </select>
                </div>
            </div>
            <!-- end row -->          

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Lote</label>
                <div class="col-sm-10">
                    <select class="form-control" name="batch">
                        <option value="NO">NO</option>
                        <option value="SI">SI</option>
                    </select>
                </div>
            </div>
            <!-- end row -->                
             
            <input type="submit" class="btn btn-info waves-effect waves-light" value="Agregar Producto">
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
