@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Modificar Punto de Entrega</h4><br><br>
        
            <form method="post" action="{{ route('destinatario.update') }}" id="myForm">
                @csrf

                <input type="hidden" name="id" value="{{$destinatario->id}}">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Cuenta </label>
                    <div class="col-sm-10">
                        <select name="account_id" id="account_id" class="form-group form-select" aria-label="Default select example">
                            <option selected="" value="">Abrir este menú de selección</option>
                            @foreach($cuenta as $cta)
                            <option value="{{ $cta->id }}"  @if ($destinatario->account_id == $cta->id) {{ 'selected' }} @endif>{{ $cta->name }}</option>
                           @endforeach
                            </select>
                    </div>
                </div>
            <!-- end row -->   

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Solicitante </label>
                <div class="col-sm-10">
                    <select id="solicitante_id" name="solicitante_id" class="form-group form-select" aria-label="Default select example">
                        <option selected="" value="">Abrir este menú de selección</option>
                        @foreach($solicitante as $sol)
                        <option value="{{ $sol->id }}"  @if ($destinatario->solicitante_id == $sol->id) {{ 'selected' }} @endif>{{ $sol->company_name }} ({{ $sol->name }}) </option>
                       @endforeach
                        </select>
                </div>
            </div>
        <!-- end row -->                  

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Código Destinatario</label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text" value="{{ $destinatario->name }}">
                </div>
            </div>
            <!-- end row -->            

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Nombre Destinatario</label>
                <div class="form-group col-sm-10">
                    <input name="company_name" class="form-control" type="text" value="{{ $destinatario->company_name }}">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Identificación Fiscal</label>
                <div class="form-group col-sm-10">
                    <input name="fiscal_identification" class="form-control" type="text"  value="{{ $destinatario->fiscal_identification }}">
                </div>
            </div>
            <!-- end row -->   

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Ciudad</label>
                <div class="form-group col-sm-10">
                    <select class="form-control" name="city">
                        <option value="">..</option>
                        <option value="QUITO"  @if ($destinatario->city == "QUITO") {{ 'selected' }} @endif>QUITO</option>
                        <option value="GUAYAQUIL" @if ($destinatario->city == "GUAYAQUIL") {{ 'selected' }} @endif>GUAYAQUIL</option>                                           
                    </select>
                </div>
            </div>
            <!-- end row -->      

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Provincia</label>
                <div class="form-group col-sm-10">
                    <select class="form-control" name="state">
                        <option value="">..</option>
                        <option value="PICHINCHA"  @if ($destinatario->state == "PICHINCHA") {{ 'selected' }} @endif>PICHINCHA</option>
                        <option value="GUAYAS"  @if ($destinatario->state == "GUAYAS") {{ 'selected' }} @endif>GUAYAS</option>                                           
                    </select>
                </div>
            </div>
            <!-- end row -->                
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">País</label>
                <div class="form-group col-sm-10">
                    <select class="form-control" name="country">                        
                        <option value="ECUADOR"  @if ($destinatario->country == "ECUADOR") {{ 'selected' }} @endif>ECUADOR</option>                                                                
                    </select>
                </div>
            </div>
            <!-- end row -->  

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Código Postal</label>
                <div class="form-group col-sm-10">
                    <input name="zip" class="form-control" type="text"  value="{{ $destinatario->zip }}">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Dirección</label>
                <div class="form-group col-sm-10">
                    <input name="address" class="form-control" type="text" maxlength="255"  value="{{ $destinatario->address }}">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Latitud</label>
                <div class="form-group col-sm-10">
                    <input name="lat" class="form-control" type="number" value="{{ $destinatario->lat }}">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Longitud</label>
                <div class="form-group col-sm-10">
                    <input name="lon" class="form-control" type="number" value="{{ $destinatario->lon }}">
                </div>
            </div>
            <!-- end row -->     
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Teléfono</label>
                <div class="form-group col-sm-10">
                    <input name="phone" class="form-control" type="number" value="{{ $destinatario->phone }}">
                </div>
            </div>
            <!-- end row -->             
            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Correo Electrónico</label>
                <div class="form-group col-sm-10">
                    <input name="email" class="form-control" type="email" value="{{ $destinatario->email }}">
                </div>
            </div>
            <!-- end row -->                  
            
             
            <input type="submit" class="btn btn-info waves-effect waves-light" value="Actualizar Punto de Entrega">
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
                solicitante_id: {
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
                    required : 'Por favor ingrese el Código Interno del Destinatario',
                },
                account_id: {
                    required : 'Por favor seleccione la Cuenta del Destinatario',
                },
                solicitante_id: {
                    required : 'Por favor seleccione cliente solicitante',
                },
                company_name: {
                    required : 'Por favor ingrese el Nombre del Destinatario',
                },
                fiscal_identification: {
                    required : 'Por favor ingrese la identificación fiscal del Destinatario.',
                },
                city: {
                    required : 'Por favor ingrese la ciudad corta del Destinatario.',
                },
                state: {
                    required : 'Por favor ingrese la provincia larga del Destinatario.',
                },
                country: {
                    required : 'Por favor ingrese el país del destinatario.',
                },                
                zip: {
                    required : 'Por favor ingrese el código postal del Destinatario.',
                },  
                address: {
                    required : 'Por favor seleccione la dirección del destinatario.',
                },  
                lat: {
                    required : 'Por favor ingrese la latitud del Destinatario.',
                },  
                lon: {
                    required : 'Por favor ingrese la longitud del Destinatario.',
                },  
                phone: {
                    required : 'Por favor ingrese el teléfono del Destinatario.',
                },  
                email: {
                    required : 'Por favor seleccione el email del Destinatario.',
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
        //alert(nid);
        if(nid){
            $.ajax({
               type:"get",
               url:"{{url('/solicitante/getsolicitantes')}}/"+nid,
               success:function(res)
               {       
                
                    if(res)
                    {
                        $("#solicitante_id").empty();
                        $("#solicitante_id").append('<option value=\'\'>Seleccionar Solicitante</option>');
                        /*$.each(res,function(key,value){
                            alert(JSON.stringify(value));
                            
                            $("#warehouse_id").append('<option value="'+key+'">'+value+'</option>');
                        });*/
                        $.each(res, function(i, option) {
                            $('#solicitante_id').append($('<option/>').attr("value", option.id).text(option.company_name + " (" + option.name + ")" ));
                        });
                    }
               }
    
            });
            }
    });
    </script>
@endsection 
