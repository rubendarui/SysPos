<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Sistema de Invnetario</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="css/demo.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project
   <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/> -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css"/>


</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="orange">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="#" class="simple-text logo-mini">
                    SYS
                </a>
                <a href="#" class="simple-text logo-normal">
                   -POS
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">



                      @foreach ($titulo as $user)
                        <li  id='formulario{{ $user->nombre }}' class="">
        <a  href="#dashvariants{{ $user->id }}" class="" aria-expanded="false" data-toggle="collapse">


             <i class=" now-ui-icons {{ $user->font }}"></i> {{ $user->nombre }}<b class="caret"></b></a>

     <div class="collapse" id="dashvariants{{ $user->id }}" style="">

                                @foreach ($subtitulo as $sub)
                    @if ( $sub->padre== $user->id)


                        <ul class="nav">
                          <li>
                              <a href="{{ $sub->url }}">
                             <span >{{ $sub->nombre }} </span>
                              </a>
                          </li>
                      </ul>


                                @endif
                                @endforeach
                             </div>
                        </li>
                        @endforeach

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#">SYSTEM-POS</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">

                        <ul class="navbar-nav">

                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                  <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block"></span>
                                    </p>  Hola Mombre
                                </a>
                            </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                  <i class="now-ui-icons ui-1_settings-gear-63"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block"></span>
                                    </p>  Configuraciones
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">@yield('titulo')</h5>
                                <p class="category">@yield('detalle')
                                </p>
                            </div>
                            <div class="card-body all-icons">
                           <!-- COntenido -->
 @yield('contenidoVenta')
                            </div>
                            <div class="card-body all-icons">
                           <!-- COntenido -->
 @yield('contenido')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>

                    </nav>
                    <div class="copyright">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, Designed by ADS.
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
 <!-- jQuery Library -->
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>

        <script type="text/javascript" src="js/jquery.twbsPagination.min.js"></script>
  <!-- jQuery
    Library<script type="text/javascript" src="js/jquery.dataTables.min.js"></script> -->

 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.0.0/dt-1.10.16/af-2.2.2/b-1.5.1/cr-1.4.1/fc-3.2.4/kt-2.3.2/sl-1.2.5/datatables.min.js"></script>
        <script type="text/javascript" src="js/dataTables.responsive.min.js"></script>
        <!--Alesrt-->
        <script src="js/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="css/sweetalert2.min.css">
        <!--plugins.js - Some Specific JS codes for Plugin Settings-->
<!--   Core JS Files   -->

<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->

<!-- Chart JS -->
<script src="js/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="js/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="js/now-ui-dashboard.js?v=1.0.1"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="js/demo.js"></script>

@yield('scripts')
</html>
