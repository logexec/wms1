@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">BODEGAS</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
    @if (str_contains(Auth::user()->rol, 'super'))
    <a href="{{ route('bodega.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> <font style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Nueva Bodega</font> </i></a> <br> 
    @endif
     
    <br>               

                    <h4 class="card-title">Listado Bodegas </h4>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th>Nombre</th> 
                            <th>Cuenta</th> 
                            <th>Correo Electrónico</th> 
                            <th>Teléfono</th> 
                            <th>Responsable</th> 
                            <th>Estado</th> 
                            <th>m2</th> 
                            <th>m3</th> 
                            <th>Capacidad Pallets</th>                             
                            <th width="20%">Acción</th>
                            
                        </thead>


                        <tbody>
                       
                        	@foreach($allData as $key => $item)
                        <tr>
                            <td> {{ $item->id}} </td>
                            <td> {{ $item->name }} </td>  
                            <td> {{ $item->namecuenta }} </td>  
                            <td> {{ $item->email }} </td>  
                            <td> {{ $item->phone }} </td>  
                            <td> {{ $item->responsible }} </td>  
                            <td> {{ $item->status }} </td>  
                            <td> {{ $item->m3 }} </td>  
                            <td> {{ $item->m2 }} </td>  
                            <td> {{ $item->pallet_capacity }} </td>  
                            <td>
                                @if (str_contains(Auth::user()->rol, 'super'))
                                    <a href="{{ route('bodega.edit',$item->id) }}" class="btn btn-info sm" title="Editar">  <i class="fas fa-edit"></i> </a>
                                    <a href="{{ route('bodega.delete',$item->id) }}" class="btn btn-danger sm" title="Eliminar" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                @endif
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