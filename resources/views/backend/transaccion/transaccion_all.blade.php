@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">TRANSACCIONES</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('transaccion.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> <font style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Nueva Transaccion</font> </i></a> <br>  <br>               

                    <h4 class="card-title">Listado de Transacciones </h4>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th>Cuenta</th> 
                            <th>Fecha/Hora</th> 
                            <th>TransCod</th> 
                            <th>Prod</th> 
                            <th>Bod</th> 
                            <th>Ori</th> 
                            <th>Des</th> 
                            <th>Doc</th> 
                            <th>Lote</th> 
                            <th>UM</th> 
                            <th>Cant</th>
                            <th>Usuario</th>                                            
                        
                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($allData as $key => $item)
                        <tr>
                            <td> {{ $item->id}} </td>
                            <td> {{ $item->namecuenta }} </td> 
                            <td> {{ $item->created_at }} </td>                               
                            <td> {{ $item->nametipotransaccions }} </td>  
                            <td> {{ $item->nameproductos }} </td>  
                            <td> {{ $item->namebodegas }} </td>  
                            <td>{{ $item->nameubicacionsori }}</td>  
                            <td>{{ $item->nameubicacionsdes }}</td>  
                            <td>{{ $item->doc_id }}</td>  
                            <td> {{ $item->namedoccabs }} </td>  
                            <td> {{ $item->um }} </td>  
                            <td> {{ $item->qty }} </td>  
                            <td> {{ $item->created_by }} </td>  
                            

                            
                           
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