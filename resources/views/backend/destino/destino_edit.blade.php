@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Editar Destino</h4><br><br>
        
            <form method="post" action="{{ route('destino.update') }}" id="myForm">
                @csrf

                <input type="hidden" name="id" value="{{$destino->id}}">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Destino </label>
                    <div class="col-sm-10">
                        <select name="account_id" class="form-group form-select" aria-label="Default select example">
                            <option selected="" value="">Abrir este menú de selección</option>
                            @foreach($cuenta as $cta)
                            <option value="{{ $cta->id }}"  @if ($destino->account_id == $cta->id) {{ 'selected' }} @endif>{{ $cta->name }}</option>
                           @endforeach
                            </select>
                    </div>
                </div>
            <!-- end row -->                

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Nombre Destino</label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text" value="{{ $destino->name }}">
                </div>
            </div>
            <!-- end row -->            

           
                        

                <input type="submit" class="btn btn-info waves-effect waves-light" value="Actualizar Destino">
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
                          
                                            
                 
            },
            messages :{
                name: {
                    required : 'Por favor ingrese el nombre del destino',
                },
                account_id: {
                    required : 'Por favor seleccione la Cuenta del producto',
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
                        $("#solicitante_id").append('<option>Seleccionar Solicitante</option>');
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
