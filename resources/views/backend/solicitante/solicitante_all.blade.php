@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">SOLICITANTES</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('solicitante.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> <font style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Nuevo Solicitante</font> </i></a> <br>  <br>               

                    <h4 class="card-title">Listado de Solicitantes </h4>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th>Cuenta</th> 
                            <th>Código Solicitante</th>                                          
                            <th>Nombre Soliitante</th>                                          
                            <th>RUC</th>
                            <th>Ciudad</th>
                            <th>Provincia</th>
                            <th>Dirección</th>
                            <th>Lat/Lon</th>
                            <th>Teléfono</th>
                            <th>Correo Electrónico</th>
                            <th width="20%">Acción</th>                            
                        </thead>
                        <tbody>
                        	 
                        	@foreach($allData as $key => $item)
                        <tr>
                            <td> {{ $item->id}} </td>
                            <td> {{ $item->namecuenta }} </td> 
                            <td> {{ $item->name }} </td>                               
                            <td> {{ $item->company_name }} </td>                               
                            <td> {{ $item->fiscal_identification }} </td>                               
                            <td> {{ $item->city }} </td>                               
                            <td> {{ $item->state }} </td>                               
                            <td> {{ $item->address }} </td>                               
                            <td> {{ $item->lat }}, {{ $item->lon }} </td>                               
                            <td> {{ $item->phone }} </td>                               
                            <td> {{ $item->email }} </td>                               
                                                    
                            <td>
                                <a href="{{ route('solicitante.edit',$item->id) }}" class="btn btn-info sm" title="Editar">  <i class="fas fa-edit"></i> </a>
                                <a href="{{ route('solicitante.delete',$item->id) }}" class="btn btn-danger sm" title="Eliminar" id="delete">  <i class="fas fa-trash-alt"></i> </a>
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