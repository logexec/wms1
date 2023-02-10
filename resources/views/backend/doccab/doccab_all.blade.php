@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">DOCUMENTOS</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('doccab.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> <font style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Nuevo Documento</font> </i></a> <br>  <br>               

                    <h4 class="card-title">Listado de Documentos </h4>
                    

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
                            <th>Cantidad</th> 
                            <th>Peso</th> 
                            <th>Volumen</th> 
                            
                            <th width="20%">Acción</th>
                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($allData as $key => $item)
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

                            <td> {{ $item->total_qty }} </td> 
                            <td> {{ $item->total_weight }} </td> 
                            <td> {{ $item->total_volume }} </td> 

                           <!-- <td> {{ $item->order_number }} </td>  
                            <td> {{ $item->purchase_number }} </td>  
                            <td> {{ $item->comments }} </td>  
                            <td> {{ $item->invoice_number }} </td>                             -->

                            <td>
                                <a href="{{ route('doccab.edit',$item->id) }}" class="btn btn-info sm" title="Editar">  <i class="fas fa-edit"></i> </a>
                                <a href="{{ route('doccab.delete',$item->id) }}" class="btn btn-danger sm" title="Eliminar" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                <a href="{{ route('doccab.detail',$item->id) }}" class="btn btn-warning sm" title="Agregar Ítem">  <i class="ri-eye-fill"></i> </a>
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