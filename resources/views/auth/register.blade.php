<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Register | Admin </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">
    
                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="{{ asset('backend/assets/images/logo-light.png') }}" height="30" class="logo-dark mx-auto" alt="">
                                    <img src="{{ asset('backend/assets/images/logo-light.png') }}" height="30" class="logo-light mx-auto" alt="">
                                </a>
                            </div>
                        </div>
    
                        <h4 class="text-muted text-center font-size-18"><b>Crear Cuenta de Usuario</b></h4>
    
                        <div class="p-3">
 
<form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
            @csrf

    <div class="form-group mb-3 row">
        <div class="col-12">
            <input class="form-control" id="name" type="text" name="name" required="" placeholder="Nombre y Apellido">
        </div>
    </div>

    <div class="form-group mb-3 row">
        <div class="col-12">
            <input class="form-control" id="username" type="text" name="username" required="" placeholder="Nombre de Usuario">
        </div>
    </div>

     <div class="form-group mb-3 row">
        <div class="col-12">
            <input class="form-control" id="email" type="email" name="email" required="" placeholder="Correo Electrónico">
        </div>
    </div>

    <div class="form-group mb-3 row">
        <div class="col-12">
            <input class="form-control" id="password" type="password" name="password" required="" placeholder="Contraseña">
        </div>
    </div>


     <div class="form-group mb-3 row">
        <div class="col-12">
            <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required="" placeholder="Confirmación de Contraseña">
        </div>
    </div>
    <div class="row mb-3">
        
        <div class="col-sm-12">
            <select multiple name="account_id[]" id="account_id" class="form-group form-select" aria-label="Default select example">
                
                @foreach($cuenta as $cta)
                <option value="{{ $cta->id }}">{{ $cta->name }}</option>
               @endforeach
                </select>
        </div>
    </div>
    <!-- end row -->       

    <div class="row mb-3">        
        <div class="col-sm-12">
            <select multiple id="warehouse_id" name="warehouse_id[]" class="form-group form-select" aria-label="Default select example">               
                @foreach($bodega as $bod)
                <option value="{{ $bod->id }}">{{ $bod->namecuenta }} -{{ $bod->namebodega }}</option>
            @endforeach
                </select>
        </div>
    </div>
    <!-- end row --> 

    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Rol</label>
        <div class="col-sm-10">
            <select multiple class="form-control" name="rol[]" required>
                <option selected="" value="">Abrir este menú de selección</option>
                <option value="super">Administrador Total</option>
                <option value="adct">Administrador Cuenta</option>
                <option value="adbo">Administrador Bodega</option>
                <option value="plan">Planificador de Viajes</option>
                <option value="prep">Aux. Preparador</option>                                
                <option value="veri">Aux. Verificador</option>                                
                <option value="ubic">Aux. Alm. Interno</option>                                
                <option value="ingr">Aux. Recepción Carga</option>                                
                <option value="audi">Auditor</option>                                
            </select>
        </div>
    </div>
    <!-- end row -->     
    <div class="form-group mb-3 row">
        <div class="col-12">
            <div class="custom-control custom-checkbox">
                
            </div>
        </div>
    </div>

    <div class="form-group text-center row mt-3 pt-1">
        <div class="col-12">
            <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Registrar</button>
        </div>
    </div>

    <div class="form-group mt-2 mb-0 row">
        <div class="col-12 mt-3 text-center">
            <a href="{{ route('login') }}" class="text-muted">Ya tienes una cuenta?</a>
        </div>
    </div>
</form>
                            <!-- end form -->
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->
        

        <!-- JAVASCRIPT -->
        <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>

        <script src="{{ asset('backend/assets/js/app.js') }}"></script>

    </body>
</html>
