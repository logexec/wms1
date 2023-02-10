@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">ÍTEMS DOCUMENTOS</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('docdet.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> <font style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Agregar Material a Documento</font> </i></a> <br>  <br>               

                    <h4 class="card-title">Listado de Materiales del Documento </h4>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th>Cuenta</th> 
                            <th>Código de Documento</th> 
                            <th>Código Material</th> 
                            <th>Bodega</th> 
                            <th>Lote</th> 
                            <th>Código de Barras</th> 
                            <th> Solicitado</th> 
                            <th>Preparado</th> 
                            <th>Confirmado</th> 
                            <th width="20%">Acción</th>                            
                        </thead>
                        <tbody>
                        	 
                        	@foreach($allData as $key => $item)
                        <tr>
                            <td> {{ $item->id}} </td>
                            <td> {{ $item->namecuenta }} </td> 
                            <td> {{ $item->namedoccab }} ({{ $item->namesolicitante }})</td>                               
                            <td> {{ $item->name }} </td>  
                            <td> {{ $item->namebodega }} </td>  
                            <td> {{ $item->batch }} </td>  
                            <td>{{ $item->barcode }} </td>  
                            <td> {{ $item->total_req }} </td>  
                            <td> {{ $item->total_pre }} </td>  
                            <td> {{ $item->total_con }} </td>                              
                            <td>
                                <a href="{{ route('docdet.edit',$item->id) }}" class="btn btn-info sm" title="Editar">  <i class="fas fa-edit"></i> </a>
                                <a href="{{ route('docdet.delete',$item->id) }}" class="btn btn-danger sm" title="Eliminar" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                <!--<a href="{{ route('docdet.detail',$item->id) }}" class="btn btn-warning sm" title="Agregar Ítem">  <i class="ri-eye-fill"></i> </a>-->
                            </td>
                           
                        </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                     
                        
                    </div> <!-- container-fluid -->
                </div>
 

@endsection