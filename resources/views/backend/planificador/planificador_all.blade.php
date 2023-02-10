@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">PLANIFICADOR DE RUTAS</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                    
                        
                                        <a href="{{ route('ruta.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> <font style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Nueva Ruta</font> </i></a> <br>  <br>               
                                        <h4 class="card-title">Rutas Confirmadas </h4>
                                        
                    
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th width="5%">ID</th>
                                                <th>Cuenta</th> 
                                                <th>Código Ruta</th> 
                                                <th>Bodega Origen</th> 
                                                <th>Destino</th> 
                                                <th>Vehículo</th> 
                                                <th>Transportista</th> 
                                                <th>Carga</th> 
                                                <th>Inicio Ruta</th> 
                                                <th>Fin Ruta</th>
                                                <th>Estado</th>                                            
                                                <th>Documentos</th>                            
                                                <th>Cantidad Solicitada</th>
                                                <th>Peso</th>
                                                <th>Volumen</th>
                                                <th width="20%">Acción</th>
                                                
                                            </thead>
                    
                    
                                            <tbody>
                                                 
                                                @foreach($rutaConfirmada as $key => $item)
                                            <tr>
                                                <td> {{ $item->id}} </td>
                                                <td> {{ $item->namecuenta }} </td> 
                                                <td> {{ $item->name }} </td>                               
                                                <td> {{ $item->namebodega }} </td>  
                                                <td> {{ $item->desname }} </td>  
                                                <td> {{ $item->namevehiculo }} </td>  
                                                <td>{{ $item->nametransportista }}</td>  
                                                <td> {{ $item->upload_date }} </td>  
                                                <td> {{ $item->start_route }} </td>  
                                                <td> {{ $item->finish_route }} </td>  
                                                <td> {{ $item->status }} </td>  
                                                <td> {{ $item->total_docs }} </td>  
                                                <td> {{ $item->total_qty }} </td>  
                                                <td> {{ $item->total_weight }} </td>  
                                                <td> {{ $item->total_volume }} </td>  
                                                
                    
                                                <td>
                                                   <!-- <a href="{{ route('ruta.edit',$item->id) }}" class="btn btn-info sm" title="Editar">  <i class="fas fa-edit"></i> </a>
                                                    <a href="{{ route('ruta.delete',$item->id) }}" class="btn btn-danger sm" title="Eliminar" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                                    <a href="{{ route('planificador.confirmar',$item->id) }}" class="btn btn-success sm" title="Confirmar">  <i class="ri-check-line"></i> </a>-->
                                                </td>
                                               
                                            </tr>
                                            @endforeach
                                            
                                            </tbody> 
                                        </table>
                            
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
<!--RUTAS PENDIENTES -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    

                    <h4 class="card-title">Rutas Pendientes de Confirmación </h4>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th>Cuenta</th> 
                            <th>Código Ruta</th> 
                            <th>Bodega Origen</th> 
                            <th>Destino</th> 
                            <th>Vehículo</th> 
                            <th>Transportista</th> 
                            <th>Carga</th> 
                            <th>Inicio Ruta</th> 
                            <th>Fin Ruta</th>
                            <th>Estado</th>                                            
                            <th>Documentos</th>                            
                            <th>Cantidad Solicitada</th>
                            <th>Peso</th>
                            <th>Volumen</th>
                            <th width="20%">Acción</th>
                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($rutaPendiente as $key => $item)
                        <tr>
                            <td> {{ $item->id}} </td>
                            <td> {{ $item->namecuenta }} </td> 
                            <td> {{ $item->name }} </td>                               
                            <td> {{ $item->namebodega }} </td>  
                            <td> {{ $item->desname }} </td>  
                            <td> {{ $item->namevehiculo }} </td>  
                            <td>{{ $item->nametransportista }}</td>  
                            <td> {{ $item->upload_date }} </td>  
                            <td> {{ $item->start_route }} </td>  
                            <td> {{ $item->finish_route }} </td>  
                            <td> {{ $item->status }} </td>  
                            <td> {{ $item->total_docs }} </td>  
                            <td> {{ $item->total_qty }} </td>  
                            <td> {{ $item->total_weight }} </td>  
                            <td> {{ $item->total_volume }} </td>  
                            

                            <td>
                               <!-- <a href="{{ route('ruta.edit',$item->id) }}" class="btn btn-info sm" title="Editar">  <i class="fas fa-edit"></i> </a>
                                -->
                                <a href="{{ route('planificador.delete',$item->id) }}" class="btn btn-danger sm" title="Eliminar Ruta" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                <a href="{{ route('planificador.confirmar',$item->id) }}" class="btn btn-success sm" title="Confirmar">  <i class="ri-check-line"></i> </a>
                            </td>
                           
                        </tr>
                        @endforeach
                        
                        </tbody> 
                    </table>
        
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
 
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
      

                    <h4 class="card-title">Documentos Pendientes de Asignar a una Ruta </h4>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th>Cuenta</th> 
                            <th>Número Documento</th> 
                            <th>Tipo</th> 
                            <th>Fecha Documento</th> 
                            <th>Estado</th> 
                            <th>Cliente</th> 
                            <th>Inicio</th> 
                            <th>Fin</th>                             
                            <th>Peso</th> 
                            <th>Volumen</th>                             
                            
                            <th width="20%">Acción</th>
                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($documentoPendiente as $key => $item)
                        <tr>
                            <td> {{ $item->id}} </td>
                            <td> {{ $item->namecuenta }} </td> 
                            <td> {{ $item->name }} </td>                               
                            <td> {{ $item->type }} </td>  
                            <td> {{ $item->record_date }} </td>  
                            <td> {{ $item->status }} </td>  
                            <td>{{ $item->companynamesolicitante }} ({{ $item->namesolicitante }})</td>  
                            <td> {{ $item->start_doc_date }} </td>  
                            <td> {{ $item->finish_doc_date }} </td>  

                            <td> {{ $item->total_weight }} </td>  
                            <td> {{ $item->total_volume }} </td>  
                 
                            <td align="right">
                                <form  method="post" action="{{ route('planificador.asignar') }}" >
                                    @csrf
                                <input type="hidden" name="pedido" value="{{ $item->id }}">
                                <select required name="ruta">
                                    <option value=''>..Rutas</option>
                                    @foreach($rutaPendiente as $key => $item)
                                    <option value='{{ $item->id }}'>{{ $item->name }}</option>
                                    @endforeach
                                
                                
                            </select>
                            <br><input type="submit" class="btn btn-info waves-effect waves-light" value="Asignar" style="margin-top:4px;">
                        </form>
                            </td>
                           
                        </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                     
                        
    </div> <!-- container   -fluid -->
</div>
@endsection