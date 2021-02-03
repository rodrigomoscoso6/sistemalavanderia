<?php

session_start();

$idservicioentrada = $_REQUEST['idservientrada'];
$estadoprenda = $_REQUEST['estadoprenda'];
$f_entrada = $_REQUEST['fechaentrada'];
$h_entrada = $_REQUEST['horaentrada'];
$tipo_pago = $_REQUEST['tipodepago'];
$comprobante = $_REQUEST['comprobante'];;
$idcliente = $_REQUEST['idcliente'];

$arrayservicioentrada = array(
  'IDSERVICIOENTRADA' => $idservicioentrada,
  'ESTADOPRENDA' => $estadoprenda,
  'F_ENTRADA' => $f_entrada,
  'H_ENTRADA' => $h_entrada,
  'TIPO_PAGO' => $tipo_pago,
  'COMPROBANTE' => $comprobante,
  'IDCLIENTE' => $idcliente
);

$_SESSION['carritoservicioentrada'][0] = $arrayservicioentrada;

//esto se guarda en la tabla
$idtiposervicio = $_REQUEST['tiposervicio'];
$tiposervicio = $_REQUEST['combo'];
$medida = $_REQUEST['medida'];
$precio = $_REQUEST['precio'];
$total = $_REQUEST['total'];
$unidadmedida = $_REQUEST['kg'];

if(isset($_SESSION['carrito']))
{

    $nombreservicio = array_column($_SESSION['carrito'],"TIPOSERVICIO");

    if (in_array($tiposervicio,$nombreservicio))
    {
      $carrito = $_SESSION['carrito'];
      
        foreach($carrito as $key => $card)
        {           
            if ($card['TIPOSERVICIO'] == $tiposervicio) 
            {
                $carrito[$key]['MEDIDA'] = $carrito[$key]['MEDIDA'] + $medida;
                $carrito[$key]['TOTAL'] = $carrito[$key]['PRECIO'] * $carrito[$key]['MEDIDA'];
                $_SESSION['carrito'] = $carrito;
            }
        }     
    }
    else
    {
      $carrito = $_SESSION['carrito'];
      $cont = $_SESSION['cantidad'] + 1;
                    
      $servicio = array(
          'IDTIPOSERVICIO' => $idtiposervicio,
          'TIPOSERVICIO' => $tiposervicio,
          'MEDIDA' => $medida,
          'PRECIO' => $precio,
          'TOTAL' => $total,
          'KG' => $unidadmedida           
        );
      $_SESSION['carrito'][$cont] = $servicio;
      $_SESSION['cantidad'] = $cont;
    }

  
}
else
{
  $count = 0;

  $servicio = array(
    'IDTIPOSERVICIO' => $idtiposervicio,
    'TIPOSERVICIO' => $tiposervicio,
    'MEDIDA' => $medida,
    'PRECIO' => $precio,
    'TOTAL' => $total,
    'KG' => $unidadmedida           
  );
  $_SESSION['carrito'][$count] = $servicio;
  $_SESSION['cantidad'] = $count;
}

?>