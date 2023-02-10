@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">PRODUCTO</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('producto.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> <font style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Nuevo Producto</font> </i></a> <br>  <br>               

                    <h4 class="card-title">Listado de Productos </h4>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th>Cuenta</th> 
                            <th>Código Interno</th> 
                            <th>Código de Barras</th> 
                            <th>Descripción</th> 
                            <th>UM Default</th> 
                            <th>Peso</th> 
                            <th>Volumen</th> 
                            <th>Categoría</th> 
                            <th>Subcategoría</th> 
                            <th>Unidades Caja</th> 
                            <th>Unidades Pallet</th> 
                            <th>Días de Inventario</th> 
                            <th>Estado</th>                             
                            <th>Serial</th>     
                            <th width="20%">Acción</th>
                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($allData as $key => $item)
                        <tr>
                            <td> {{ $item->id}} </td>
                            <td> {{ $item->namecuenta }} </td> 
                            <td> {{ $item->name }} </td>                               
                            <td> {{ $item->barcode }} </td>  
                            <td> {{ $item->description }} </td>  
                            <td> {{ $item->um_default }} </td>  
                            <td> {{ $item->weight }} {{ $item->um_weight }} </td>  
                            <td> {{ $item->volume }} {{ $item->um_volume }} </td>  
                            <td> {{ $item->category }} </td>  
                            <td> {{ $item->subcategory }} </td>  
                            <td> {{ $item->units_box }} </td>  
                            <td> {{ $item->units_pallet }} </td>  
                            <td> {{ $item->inventory_days }} </td> 
                            <td> {{ $item->status }} </td> 
                            <td> {{ $item->serial }} </td> 
                            <td> {{ $item->batch }} </td> 

                            <td>
                                <a href="{{ route('producto.edit',$item->id) }}" class="btn btn-info sm" title="Editar">  <i class="fas fa-edit"></i> </a>
                                <a href="{{ route('producto.delete',$item->id) }}" class="btn btn-danger sm" title="Eliminar" id="delete">  <i class="fas fa-trash-alt"></i> </a>
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