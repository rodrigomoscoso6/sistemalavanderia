<?php

session_start();

switch($_REQUEST['accion'])
{
    case 'mas':
    
        $key = $_REQUEST['key'];

        $carrito = $_SESSION['carrito'];
       
        $carrito[$key]['MEDIDA'] = $carrito[$key]['MEDIDA'] + 1;
        $carrito[$key]['TOTAL'] = $carrito[$key]['PRECIO'] * $carrito[$key]['MEDIDA'];                 
        $_SESSION['carrito'] = $carrito;
        $_SESSION['datosdatalleservicio'] = $carrito;

    break;

    case 'menos':

        $key = $_REQUEST['key'];

        $carrito = $_SESSION['carrito'];

        if($carrito[$key]['MEDIDA'] == 1)
        {
            unset($_SESSION['carrito'][$key]);
        }
        else
        {
            $carrito[$key]['MEDIDA'] = $carrito[$key]['MEDIDA'] - 1;
            $carrito[$key]['TOTAL'] = $carrito[$key]['PRECIO'] * $carrito[$key]['MEDIDA'];                 
            $_SESSION['carrito'] = $carrito;
            $_SESSION['datosdatalleservicio'] = $carrito;
        }

    break;
}

?>