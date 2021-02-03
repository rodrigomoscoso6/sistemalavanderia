<?php

session_start();

include('../../Modelo/modelo_servicio_entrada.php');
include('../../Modelo/modelo_detalle_servicio.php');
include('../../Modelo/modelo_servicio_salida.php');
include('../../Modelo/modelo_sanciones_economicas.php');
include('../../Controlador/controlador_sanciones_economicas.php');
include('../../Controlador/controlador_servicio_entrada.php');
include('../../Controlador/controlador_servicio_salida.php');

$importetotal = $_REQUEST['importetotal'];
$carrito = $_SESSION['carrito'];
$servicioentrada = $_SESSION['carritoservicioentrada'];
$idservicioentrada = "";

$f_salida = $_REQUEST['fechasalida'];
$h_salida = $_REQUEST['horasalida'];
$codigoservicio = $_REQUEST['idcompleto'];
$nombre_apellido = $_REQUEST['nombreapellido']; 
$dni = $_REQUEST['dni'];
$idsancioneseconomicas = 1;

$array = array();

$modeloservicioentrada = new ModeloServicioEntrada();
$modelodetalleservicioentrada = new ModeloDetalleServicioEntrada();

$controladorservicioentrada = new ControladorServicioEntrada();
$controladorserviciosalida = new ControladorServicioSalida();

//parte del servicio de entrada
foreach($servicioentrada as $key => $card)
{
$idservicioentrada = $card['IDSERVICIOENTRADA'];
$f_entrada = $card['F_ENTRADA'];
$h_entrada = $card['H_ENTRADA'];
$estadoservicio = $card['ESTADOPRENDA'];
$modeloservicioentrada->setId_servicio_entrega($card['IDSERVICIOENTRADA']);
$modeloservicioentrada->setEstado_prenda($card['ESTADOPRENDA']);
$modeloservicioentrada->setFecha_entrada($card['F_ENTRADA']);
$modeloservicioentrada->setHora_entrada($card['H_ENTRADA']);
$modeloservicioentrada->setImporte_total($importetotal);
$modeloservicioentrada->setTipo_pago($card['TIPO_PAGO']);
$modeloservicioentrada->setComprobante($card['COMPROBANTE']);
$modeloservicioentrada->setId_cliente($card['IDCLIENTE']);
$modeloservicioentrada->setId_usuario($_SESSION['idusuario']);

$controladorservicioentrada->RegistrarServicioEntrada($modeloservicioentrada);

}

$datosticket = array(
    'f_entrada' => $f_entrada,
    'h_entrada' => $h_entrada,
    'codigo_servicio' => $codigoservicio,
    'nombre_apellido' => $nombre_apellido,
    'dni' => $dni,
    'importe_total' => $importetotal,
    'estado_servicio' => $estadoservicio,
    'f_salida' => $f_salida,
    'h_salida' => $h_salida
);

$_SESSION['datosticket'][0] = $datosticket;



//parte detalle de servicio de entrada
foreach($carrito as $key => $card)
{

$modelodetalleservicioentrada->setId_tipo_servicio($card['IDTIPOSERVICIO']);
$modelodetalleservicioentrada->setId_servicio_entrega($idservicioentrada);
$modelodetalleservicioentrada->setPrecio($card['PRECIO']);
$modelodetalleservicioentrada->setUnidad($card['MEDIDA']);
$modelodetalleservicioentrada->setTotal($card['TOTAL']);  

$array[] = $card;

$controladorservicioentrada->RegistrarDetalleServicioEntrada($modelodetalleservicioentrada);

}

$_SESSION['llavedetalle'] = $array;

$modelosancioneseconomicas = new ModeloSancionesEconomicas();
$controladorsanciones = new ControladorSancionesEconomicas();
$sum = $controladorsanciones->IdSancionesEconomicas();

$resultado = $sum + 1;
$fecha_retraso = "";
$hora_retraso = "";
$costoretraso = "0";

$modelosancioneseconomicas->setId_sanciones_economicas($resultado);
$modelosancioneseconomicas->setFecha_retraso($fecha_retraso);
$modelosancioneseconomicas->setHora_retraso($hora_retraso);
$modelosancioneseconomicas->setCosto_retraso($costoretraso);

$controladorsanciones->InsertarSanciones($modelosancioneseconomicas);

$modeloserviciosalida = new ModeloServicioSalida();

$modeloserviciosalida->setId_servicio_salida($_REQUEST['idserviciosalida']);
$modeloserviciosalida->setFecha_salida($_REQUEST['fechasalida']);
$modeloserviciosalida->setHora_salida($_REQUEST['horasalida']);
$modeloserviciosalida->setId_servicio_entrega($idservicioentrada);
$modeloserviciosalida->setId_sanciones_economicas($resultado);

$respuesta = $controladorserviciosalida->RegistrarServicioSalida($modeloserviciosalida);

    foreach ($carrito as $key => $row)
    { 
        unset($_SESSION['carrito'][$key]);
    }

    foreach ($servicioentrada as $llave => $fila) 
    { 
        unset($_SESSION['carritoservicioentrada'][$llave]);
    }



?>