<?php
session_start();

if(!isset($_SESSION) || $_SESSION == null)
{
	header("location: ../../index.php");
    exit;
}

$idservicioentrada = $_REQUEST['id'];

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
                <a class="nav-link" href="plantillaTipoServicio.php">
                <i class="fas fa-address-card"></i>
                    <span>Tipo de Servicio</span></a>
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

                    <p id="capturarrol"><?php echo $_SESSION['rol']; ?></p>
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
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
                
                <form id="modificarservicios2">
                <!-- Para el registro de servicios de entrada -->
                <section class="content">
                    <div class="container-fluid">                                            
                        <div class="card shadow mb-4">
                                <div class="card-header-Registro py-3">
                                    <h6 class="card-title m-0 font-weight-bold text-primary">Modificacion del servicio de entrada</h6>                                
                                    
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fas fa-times"></i></button>
                                    </div>

                                </div>

                            <div class="card-body">
                                <div class="row">

                                        <div class="col-md-6">
                                            <div class="card border-primary mb-3">
                                                <div class="card-header bg-transparent border-primary text-dark text-center">
                                                    RUC:1072257350
                                                </div>
                                                <div id="traeridservicio" class="card-body text-primary text-center">
                                                
                                                </div>
                                                <div class="card-footer bg-transparent border-primary text-dark text-center">
                                                    N° DE TICKETS
                                                </div>
                                            </div>
                                        </div>

                                    <div class="col-md-6">
                                        <div class="row" style="margin-top: 3%;"> 
                                            <input type="hidden" value="<?php echo $idservicioentrada; ?>" name="idservicioentrada" id="idservicioentrada"> 
                                            <input type="hidden" name="idcliente" id="idcliente"> 
                                            <input type="hidden" name="estadoprendaseleccionado2" id="estadoprendaseleccionado2" >
                                            <input type="hidden" name="sancionesconomica" id="sancionesconomica">
                                            <input type="hidden" name="idsancioneseconomica" id="idsancioneseconomica">
                                            <input type="hidden" name="importetotal" id="importetotal"> 
                                            <div class="col-md-6">
                                                <input type="text" disabled class="form-control" name="nombres" id="nombres">
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <input type="text" disabled class="form-control" name="apellidos" id="apellidos">
                                            </div>      
                                        </div>

                                        <div class="row" style="margin-top: 3%;"> 
                                            <div class="col-md-6" style="margin-bottom:3%;">
                                                <input type="text" disabled class="form-control" name="dni" id="dni">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" disabled class="form-control" name="telefono" id="telefono">
                                            </div>                                          
                                        </div>

                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color:red;" id="exampleModalLongTitle">El Cliente tiene un Sancion por no llegar a tiempo.</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                        <div class="modal-body">
                                                                                                                               
                                            <div class="form-row">

                                                <input class="form-control" type="hidden" name="idserviciosalida" id="idserviciosalida">        

                                                <div class="col-md-6">
                                                    <label for="fechaentrega">Fecha Recogo</label>
                                                    <div class="form-row">                                        
                                                        <input class="form-control" type="date" name="fechasalida" id="fechasalida">
                                                    </div>
                                                </div>
        
                                                <div class="col-md-6"> 
                                                    <label for="horaentrega">Hora Recogo</label>
                                                    <input class="form-control" type="time" name="horasalida" id="horasalida">
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label for="fechaentrega">Fecha Actual</label>
                                                    <div class="form-row">                                        
                                                        <input class="form-control" type="date" name="f_salida" id="f_salida">
                                                    </div>
                                                </div>
        
                                                <div class="col-md-6"> 
                                                    <label for="horaentrega">Hora Actual</label>
                                                    <input class="form-control" type="time" name="h_salida" id="h_salida">
                                                </div>

                                                <div class="col-md-6"> 
                                                    <label for="horaentrega">Costo Retraso</label>
                                                    <input class="form-control" type="text" name="costoretraso" id="costoretraso">
                                                </div>

                                                <div class="col-md-12" style="margin-top:5%;color:red;">
                                                <p id="tiemposancion"></p>
                                                </div> 

                                                <div class="col-md-6">
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" style="float:right;" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                </div>                                                                                           

                                                        <div class="modal-footer">
                                                                                
                                                        </div>                                         
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                     

                                </div>   
                                 
                                </div> 
                            </div>
                                <div class="row">
                                <input type="hidden" name="idusuario" id="idusuario">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vendedor">Vendedor</label>
                                            <input class="form-control" type="text" disabled name="nombresusuario" id="nombresusuario">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="fechaentrega">Fecha Entrada</label>
                                        <div class="form-row">                                        
                                             <input class="form-control" type="date" name="fechaentrada" id="fechaentrada">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="horaentrega">Hora Entrada</label>
                                        <input class="form-control" type="time" name="horaentrada" id="horaentrada">
                                    </div>
                                </div>


                                <div class="row">
                                                                 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="EstadoPrenda">Comprobante</label>
                                            <select class="form-control" disabled name="comprobante" id="comprobante">
                                                <option value="Factura">Factura</option>
                                                <option value="Boleta">Boleta</option>
                                                <option value="Otros">Otros</option>                 
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="estadoPrenda">Estado de Prenda</label>
                                            <select class="form-control" name="estadoprenda" id="estadoprenda">
                                                <option value="Pendiente">Pendiente</option>
                                                <option value="Terminado">Terminado</option>
                                                <option value="Entregado">Entregado</option>
                                            </select>
                                        </div>                                       
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="tipodepago">Tipo de Pago</label>
                                            <select class="form-control" disabled name="tipodepago" id="tipodepago">
                                                <option value="Efectivo">Efectivo</option>
                                                <option value="Tarjeta">Tarjeta</option>
                                                <option value="Yape">Yape</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3 regresar">
                                        <div class="form-group">
                                             <a href="plantillaServicioEntrada.php" class="btn btn-outline-danger form-control">
                                                <i class="fas fa-undo-alt" ></i>                                                                      
                                                 Regresar
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">                               
                                            <button type="submit" class="btn btn-outline-primary form-control">
                                            <i class="fas fa-folder-plus" ></i>
                                                Guardar
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-md-3" >
                                        <div class="form-group">                               
                                            <button type="button" id="botonsancion" class="btn btn-outline-danger form-control" data-toggle="modal" data-target="#exampleModalCenter">
                                                Sancion
                                            </button>
                                        </div>
                                    </div>
                                     
                                </div>                                                                                                                                 
                        <div>                                                        
                    </div>
                </section>     
                </form>
                <div class="container-fluid">
                    
                            <div class="card shadow mb-4">
                                            
                                <div class="card-header-Registro py-3">
                                    <h6 class="card-title m-0 font-weight-bold text-primary">Detalle de Servicio</h6>                                
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fas fa-times"></i></button>
                                    </div>
                                </div>

                                <div class="card-body">
                                   
                                        <div id="EditarTabladetalleservicio" class="table-responsive">
                                            <!-- Tabla de Detalle de servicio Nuevo -->
                                        </div>                                   
                                       
                                </div>                          
                            <div>
                        </div>
                
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
    <script src="../../Js/ModificarServicioEntrada.js"></script>
    <!-- AdminLTE App -->
    <script src="../../Plantilla/Presentacion_General/js/demo/dist/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../Plantilla/Presentacion_General/js/demo/dist/demo.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="../../Plantilla/Presentacion_General/vendor/jquery/jquery.min.js"></script>
    <script src="../../Plantilla/Presentacion_General/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../Plantilla/Presentacion_General/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../Plantilla/Presentacion_General/js/sb-admin-2.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>



</body>

</html>