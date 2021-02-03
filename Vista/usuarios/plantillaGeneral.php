<?php
session_start();

if(!isset($_SESSION) || $_SESSION == null)
{
	header("location: ../../index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web Lavanderia - Rodrigo - Luis </title>

    <!-- Custom fonts for this template-->
    <link href="../../Plantilla/Presentacion_General/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../Plantilla/Presentacion_General/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../Plantilla/Presentacion_General/css/estilo_personalizado.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion estirar toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->         
            <div class="text-center contendor_foto pt-4">         
            <img src="../../Plantilla/Presentacion_General/img/logo.png" class="img-fluid" alt="Responsive image">
            </div>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="plantillaGeneral.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Pagina Principal</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
               
            </div>
        
            <!-- Nuevo Cliente -->

            <li class="nav-item">
                <a class="nav-link" href="../clientes/plantillaClientes.php">
                <i class="fas fa-address-card"></i>
                    <span>Cliente</span></a>
            </li>

            <!-- Tipo de Servicio -->
            <li class="nav-item">
                <a class="nav-link" href="../servicios/plantillaTipoServicio.php">
                <i class="fas fa-server"></i>
                    <span>Tipo de Servicio</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../costos/costos.php">
                <i class="fab fa-contao"></i>
                    <span>Costos</span></a>
            </li>

            <!-- Divider -->
            <!-- Divider <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <!-- Heading <div class="sidebar-heading">
                Addons
            </div> -->
           
            <!-- Nav Servicio Entrada -->
            <li class="nav-item">
                <a class="nav-link" href="../servicios/plantillaServicioEntrada.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Servicio de Entrada</span></a>
            </li>
            
            <!-- Separador -->
            <hr class="sidebar-divider">     
                  
            <!-- Tenemos Usuarios -->
            <li id="menuusuarios" class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users"></i>                   
                    <span>Usuarios</span>
                </a>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Registre</h6>
                        <a class="collapse-item" href="plantillaRegistrarUsuario.php">Usuarios</a>
                        <a class="collapse-item" href="plantillaRegistrarRoles.php">Roles</a>         
                    </div>
                </div>
            </li>

            <!-- Nav Reportes General -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Reportes</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Tipo de Reportes</h6>
                        <a class="collapse-item" href="../reportes/reportesporfecha.php">Reportes por Fecha</a>
                        <a class="collapse-item" href="../reportes/reportetiposervicio.php">Reportes Tipo Usuario</a>
                        <a class="collapse-item" href="../reportes/reportesusuario.php">Reportes Usuario</a>
                        <a class="collapse-item" href="../reportes/reportescostos.php">Reportes Costos</a>
                        <div class="collapse-divider"></div>                   
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <p id="capturarrol" style="display:none;"><?php echo $_SESSION['rol']; ?></p>
                <p id="rolusuario" >BIENVENIDO: <?php echo $_SESSION['rol']; ?></p>
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>            
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['usuario']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../../Plantilla/Presentacion_General/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- Termianando la Plantilla izquierdo -->

                <!-- Empezar La plantilla Derecha -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Pagina Principal</h1>
                        
                    </div>
                    <!-- Content Row para la Pagina Principal-->
                    <div class="row">
                        
                        <!-- Usuarios -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                               Cuantos Usuarios Tenemos</div>
                                            <div id="cantidadusuario" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>                               
                                        </div>
                                    </div>
                                </div>
                            </div>                          
                        </div>

                        <!-- Clientes -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               Cuantos Clientes Tenemos</div>
                                            <div id="cantidadcliente" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-address-card fa-2x text-gray-300"></i>                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Prendas-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Cuantas Tipos Servicio
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div id="cantidadtiposervicio" class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Cuanto Generamos por Dia</div>
                                            <div id="cantidadimportetotal" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fab fa-stripe-s fa-2x text-gray-300"></i>                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>  
                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Ingresos Mensuales</h6>                                 
                                </div>
                                    <!-- Card Body -->
                                <div class="card-body" >
                                    <div class="chart-area" >
                                            <canvas id="myAreaChart" ></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Graficos Estadisticos</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style=""
                                                src="../../Plantilla/Presentacion_General/img/undraw_Finance_re_gnv2.svg" alt="">
                                    </div>
                                    <p>Trabajar con graficos estadisticos es la mayor ventaja ya que estos 2 graficos darán información clara y rápida para ver como nos va en nuestro negocio.</p>  
                                    <p>Aqui tenemos 2 tipos de graficos estadisticos:</p>
                                    <label>
                                    1- Graficos de Lineas
                                    <br>
                                    2- Graficos de Sectores
                                    </label>                              
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                            <!-- Pie Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Tipo de Servicios mas requeridos</h6>                                       
                                </div>
                                    <!-- Card Body -->
                                <div class="card-body">     
                                    <canvas id="myPieChart"></canvas>                                                                                                      
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Graficos Estadisticos</h6>
                                </div>
                                <div class="card-body">   
                                    <p>Graficos de Líneas:</p>  
                                    <p>Es una representación gráfica de la relación que existe entre dos variables reflejando con claridad los cambios producidos 
                                    Por ejemplo aquí tenemos 2 variables que es el monto y es el mes, esto me ayudar a ver cuantos ingresos se obtuvo en cada mes. </p> 
                                    <p>Graficos de Sectores:</p>
                                    Es una representación circular que permite de manera sencilla y rapida ver la totalidad que se observa, cada porcion llamada 
                                    sectores representa la proporcion de cada tipo de servicios en este caso esta representacion me ayuda a ver los tipos de Servicios mas requeridos.
                                </div>
                            </div>
                        </div>
                    </div>
                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Rodrigo Moscoso - Luis Carranza &copy; Web Lavanderia 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="salir.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <script src="../../Plantilla/Js/jquery-3.4.1.min.js"></script>

    <script src="../../Plantilla/Js/sweetalert2.js"></script>
    <script src="../../Js/main.js"></script>
    <script src="../../Js/graficos.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="../../Plantilla/Presentacion_General/vendor/jquery/jquery.min.js"></script>
    <script src="../../Plantilla/Presentacion_General/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../Plantilla/Presentacion_General/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../Plantilla/Presentacion_General/js/sb-admin-2.min.js"></script>

    <!--ACA TENGO QUE HACER LOS GRAFICOS PERSONALIZADOS PARA QUE NO MARQUE ERROR -->
    <!-- Page level plugins -->
    <script src="../../Plantilla/Presentacion_General/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../Plantilla/Presentacion_General/js/demo/chart-area-demo.js"></script>
    <script src="../../Plantilla/Presentacion_General/js/demo/chart-pie-demo.js"></script>

</body>

</html>