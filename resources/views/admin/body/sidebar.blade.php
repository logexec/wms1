 <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="{{ url('/dashboard') }}" class="waves-effect">
                                    <i class="ri-home-fill"></i> 
                                    <span>Inicio</span>
                                </a>
                            </li>
 
    
        @if (str_contains(Auth::user()->rol, 'super'))                   
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-hotel-fill"></i>
                
                <span>Cuentas</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('cuenta.all') }}">Todas las Cuentas</a></li>                              
            </ul>
        </li>
        @endif

        
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-home-5-fill"></i>
                <span>Bodegas </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('bodega.all') }}">Todas las Bodegas</a></li>                              
            </ul>
        </li>                
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-pushpin-2-fill"></i>
                <span>Ubicaciones</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('ubicacion.all') }}">Todas las Ubicaciones</a></li>                                
               
            </ul>
        </li>                 

        <!-- <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-delete-back-fill"></i>
                <span>Administrar Unidades</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('unit.all') }}">Todas las Unidades</a></li>
               
            </ul>
        </li>-->

        <!-- <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-apps-2-fill"></i>
                <span>Administrar Categorías</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('category.all') }}">Todas las Categorías</a></li>
               
            </ul>
        </li>-->
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-map-pin-2-fill"></i>
                <span>Destinos</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('destino.all') }}">Todos los Destinos</a></li>
               
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-settings-2-fill"></i>
                <span>Conf. Transacciones</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('tipotransaccion.all') }}">Configurar Transacciones</a></li>
               
            </ul>
        </li>                  
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-building-4-fill"></i>
                <span>Clientes</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('solicitante.all') }}">Todos los Clientes</a></li>
               
            </ul>
        </li>            
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-inbox-archive-fill"></i>
                <span>Puntos de Entrega</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('destinatario.all') }}">Todos los Puntos de Entrega</a></li>
               
            </ul>
        </li>        
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-barcode-box-line"></i>
                <span>Productos</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('producto.all') }}">Todos los Productos</a></li>
               
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-truck-fill"></i>
                <span>Vehículos</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('vehiculo.all') }}">Todos los Vehículos</a></li>
               
            </ul>
        </li>    

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-folder-user-fill"></i>
                <span>Conductores</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('transportista.all') }}">Todos los Conductores</a></li>
               
            </ul>
        </li>       
        
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-file-list-fill"></i>
                <span>Documentos</span>
            </a>
            <ul class="sub-menu" aria-expanded="true">
                <li><a href="{{ route('doccab.all') }}">Cabeceras</a></li>
               
            </ul>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('docdet.all') }}">Ítems</a></li>
               
            </ul>
        </li>      
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-route-line"></i>
                <span>Rutas</span>
            </a>
            <ul class="sub-menu" aria-expanded="true">
                <li><a href="{{ route('ruta.all') }}">Todas las Rutas</a></li>
               
            </ul>           
        </li>   
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-calendar-2-fill"></i>
                <span>Planificador</span>
            </a>
            <ul class="sub-menu" aria-expanded="true">
                <li><a href="{{ route('planificador.all') }}">Planificador de Rutas</a></li>
               
            </ul>           
        </li>               
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-codepen-fill"></i>
                <span>Transacciones</span>
            </a>
            <ul class="sub-menu" aria-expanded="true">
                <li><a href="{{ route('transaccion.all') }}">Todas las Transacciones</a></li>
               
            </ul>           
        </li>           
        
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-numbers-fill"></i>
                <span>Stock</span>
            </a>
            <ul class="sub-menu" aria-expanded="true">
                <li><a href="{{ route('saldo.all') }}">Reporte de Stock</a></li>
               
            </ul>           
        </li>          


       <!--   <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-barcode-box-line"></i>
                <span>Administrar Productos</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('product.all') }}">Todos los Productos</a></li>
               
            </ul>
        </li>-->
        <!--<li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-truck-fill"></i>
                <span>Administrar Rutas</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="#">Todas las Rutas</a></li>
                <!-- <li><a href="{{ route('credit.customer') }}">Credit Customers</a></li>

                 <li><a href="{{ route('paid.customer') }}">Paid Customers</a></li>
                  <li><a href="{{ route('customer.wise.report') }}">Customer Wise Report</a></li>-->
               
            <!--</ul>
        </li>-->



          <!--<li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-login-circle-fill"></i>
                <span>Administrar Ingresos</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('purchase.all') }}">Todos los Ingresos</a></li>
                <li><a href="{{ route('purchase.pending') }}">Aprobación de Ingresos</a></li>
                <!--<li><a href="{{ route('daily.purchase.report') }}">Daily Purchase Report</a></li>-->
               
         <!--   </ul>
        </li>-->


          <!--<li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-logout-circle-fill"></i>
                <span>Administrar Egresos</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('invoice.all') }}">Todos los Egresos</a></li>
                <li><a href="{{ route('invoice.pending.list') }}">Aprobación de Egresos</a></li>
                <!--<li><a href="{{ route('print.invoice.list') }}">Print Invoice List</a></li>
                  <li><a href="{{ route('daily.invoice.report') }}">Daily Invoice Report</a></li>-->
               
           <!-- </ul>
        </li>-->

       <!--  <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-arrow-left-right-line"></i>
                <span>Transacciones</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="#">Todas las Transacciones</a></li>
                <!-- <li><a href="{{ route('credit.customer') }}">Credit Customers</a></li>

                 <li><a href="{{ route('paid.customer') }}">Paid Customers</a></li>
                  <li><a href="{{ route('customer.wise.report') }}">Customer Wise Report</a></li>-->
               
           <!--  </ul>
        </li>      -->
        <!-- <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-price-tag-3-fill"></i>
                <span>Etiquetas</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="#">Etq. Productos</a></li>
                <li><a href="#">Etq. Bodega</a></li>
                <!-- <li><a href="{{ route('credit.customer') }}">Credit Customers</a></li>

                 <li><a href="{{ route('paid.customer') }}">Paid Customers</a></li>
                  <li><a href="{{ route('customer.wise.report') }}">Customer Wise Report</a></li>-->
               
           <!--  </ul>
        </li>-->
        <!-- <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-eye-fill"></i>
                <span>Inventarios</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="#">Todos los Inventarios</a></li>
                <!-- <li><a href="{{ route('credit.customer') }}">Credit Customers</a></li>

                 <li><a href="{{ route('paid.customer') }}">Paid Customers</a></li>
                  <li><a href="{{ route('customer.wise.report') }}">Customer Wise Report</a></li>-->
               
            <!-- </ul>
        </li>    -->  




<!-- 
                            <li class="menu-title">Stock</li>

    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-gift-fill"></i>
            <span>Administrar Stock</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('stock.report') }}">Reporte de Stock</a></li>
            <!--<li><a href="{{ route('stock.supplier.wise') }}">Supplier / Product Wise </a></li>-->
            
       <!--  </ul>
    </li>-->
    @if (str_contains(Auth::user()->rol, 'super'))
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-user-fill"></i>
                <span>Administración</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('admin.all') }}">Usuarios</a></li>                
                <!--<li><a href="pages-timeline.html">Timeline</a></li>
                <li><a href="pages-directory.html">Directory</a></li>
                <li><a href="pages-invoice.html">Invoice</a></li>
                <li><a href="pages-404.html">Error 404</a></li>
                <li><a href="pages-500.html">Error 500</a></li>-->
            </ul>
        </li>
    @endif
    
<hr>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-questionnaire-fill"></i>
                                    <span>Asistencia Técnica</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="pages-starter.html">Portal de Asistencia</a></li>
                                    <!--<li><a href="pages-timeline.html">Timeline</a></li>
                                    <li><a href="pages-directory.html">Directory</a></li>
                                    <li><a href="pages-invoice.html">Invoice</a></li>
                                    <li><a href="pages-404.html">Error 404</a></li>
                                    <li><a href="pages-500.html">Error 500</a></li>-->
                                </ul>
                            </li>

                           

                            
                         

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>