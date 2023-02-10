@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">CUENTAS</h4>

                                     

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('cuenta.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> <font style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Nueva Cuenta</font> </i></a> <br>  <br>               

                    <h4 class="card-title">Listado Cuentas </h4>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th>Nombre</th> 
                            <th>Correo Electrónico</th> 
                            <th>Responsable</th> 
                            <th>Plan</th> 
                            <th>Estado</th> 
                            <th width="20%">Acción</th>
                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($allData as $key => $item)
                        <tr>
                            <td> {{ $item->id}} </td>
                            <td> {{ $item->name }} </td>  
                            <td> {{ $item->email }} </td>  
                            <td> {{ $item->responsible }} </td>  
                            <td> {{ $item->plan }} </td>  
                            <td> {{ $item->status }} </td>  
                            <td>
                                <a href="{{ route('cuenta.edit',$item->id) }}" class="btn btn-info sm" title="Editar">  <i class="fas fa-edit"></i> </a>
                                <a href="{{ route('cuenta.delete',$item->id) }}" class="btn btn-danger sm" title="Eliminar" id="delete">  <i class="fas fa-trash-alt"></i> </a>
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