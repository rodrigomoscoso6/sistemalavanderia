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

    <title>Web Labanderia - Rodrigo - Luis </title>

    <!-- Custom fonts for this template-->
    <link href="../../Plantilla/Presentacion_General/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

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
           
            <div class="text-center pt-4">         
            <img src="../../Plantilla/Presentacion_General/img/logo.png" class="img-fluid" alt="Responsive image">
            </div>
            
            ​

            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../usuarios/plantillaGeneral.php">
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
                <i class="fas fa-address-card"></i>
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
                        <a class="collapse-item" href="../usuarios/plantillaRegistrarUsuario.php">Usuarios</a>
                        <a class="collapse-item" href="../usuarios/plantillaRegistrarRoles.php">Roles</a>         
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
                        <a class="collapse-item" href="reportesporfecha.php">Reportes por Fecha</a>
                        <a class="collapse-item" href="reportetiposervicio.php">Reportes Tipo Usuario</a>
                        <a class="collapse-item" href="reportesusuario.php">Reportes Usuario</a>
                        <a class="collapse-item" href="reportescostos.php">Reportes Costos</a>
                        <div class="collapse-divider"></di>                   
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

                <p id="capturarrol"><?php echo $_SESSION['rol']; ?></p>
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li id="search" class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        

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
                                <!--<a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configuraciones
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Registro total
                                </a>-->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- el relleno Clientes -->
                
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Reportes por Usuario</h6>
                        </div>
                       
                        <div class="card-body">
                            <!-- Button trigger modal -->

                            <div class="row TitulodeListaReportes">
                                <div class="col-xl-12">
                                    <h2>Lista Usuario con cantidad de servicios Realizados</h2>                                
                                </div>
                            </div>

                            <div class="row ">
                               
                                <div class="col-xl-3">
                                    <div class="form-group"> 
                                        <label >Fecha Inicio</label>                                                                  
                                        <input class="form-control" type="date" name="fechainicio" id="fechainicio">                                
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="form-group"> 
                                        <label >Fecha Fin</label>                                                                  
                                        <input class="form-control" type="date" name="fechafin" id="fechafin">                                                              
                                    </div>
                                </div>

                                <div class="col-xl-2 cbuscar">   
                                    <div class="form-group"> 
                                        <label >  </label>
                                        <button type="button" id="buscar" class="btn form-control btn-outline-primary">
                                        <i class="fas fa-search"></i>
                                            Buscar
                                        </button> 
                                    </div>
                                </div>

                                <div class="col-xl-4 generarReportePDF">
                                    <div class="form-group">                                      
                                        <a id="botonreporte" Target="_blank" class="btn btn-outline-danger">
                                        <i class="fas fa-chart-bar"></i>
                                            Generar Reportes en PDF
                                        </a>
                                    </div>
                                </div>

                                
                            </div>

                        
                            <div id="tablausuarios" class="table-responsive">
                                                        
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
                    <a class="btn btn-primary" href="../usuarios/salir.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <script src="../../Plantilla/Js/jquery-3.4.1.min.js"></script>
    <script src="../../Plantilla/Js/sweetalert2.js"></script>
    <script src="../../Js/main.js"></script> 
    <script src="../../Js/reporteusuario.js"></script>
    

    <!-- Bootstrap core JavaScript-->
    <script src="../../Plantilla/Presentacion_General/vendor/jquery/jquery.min.js"></script>
    <script src="../../Plantilla/Presentacion_General/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../Plantilla/Presentacion_General/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../Plantilla/Presentacion_General/js/sb-admin-2.min.js"></script>
    

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../Plantilla/Js/datatable.js"></script>
    <script src="../../Plantilla/Js/dataTables.buttons.min.js"></script>
    <script src="../../Plantilla/Js/jszip.min.js"></script>
    <!--<script src="../../Plantilla/Js/pdfmake.min.js"></script>-->
    <script src="../../Plantilla/Js/vfs_fonts.js"></script>
    <script src="../../Plantilla/Js/buttons.html5.min.js"></script>

</body>

</html>