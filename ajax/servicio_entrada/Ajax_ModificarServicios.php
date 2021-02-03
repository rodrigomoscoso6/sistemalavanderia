<?php

include('../../Controlador/controlador_servicio_entrada.php');
include('../../Controlador/controlador_servicio_salida.php');
include('../../Controlador/controlador_sanciones_economicas.php');

include('../../Modelo/modelo_servicio_entrada.php');
include('../../Modelo/modelo_servicio_salida.php');
include('../../Modelo/modelo_sanciones_economicas.php');


    $modeloservicioentrada = new ModeloServicioEntrada();

    $importetotal = $_REQUEST['importetotal'] + $_REQUEST['costoretraso'];

    $modeloservicioentrada->setId_servicio_entrega($_REQUEST['idservicioentrada']);
    $modeloservicioentrada->setEstado_prenda($_REQUEST['estadoprenda']);
    $modeloservicioentrada->setFecha_entrada($_REQUEST['fechaentrada']);
    $modeloservicioentrada->setHora_entrada($_REQUEST['horaentrada']);
    $modeloservicioentrada->setImporte_total($importetotal);
    $modeloservicioentrada->setTipo_pago($_REQUEST['tipodepago']);
    $modeloservicioentrada->setComprobante($_REQUEST['comprobante']);
    $modeloservicioentrada->setId_cliente($_REQUEST['idcliente']);
    $modeloservicioentrada->setId_usuario($_REQUEST['idusuario']);

    $controladorservicioentrada = new ControladorServicioEntrada();

    $controladorservicioentrada->ModificarServicioEntrada($modeloservicioentrada);

    if($_REQUEST['sancionesconomica'] == "Sancionado")
    {
        
        $modelosancioneseconomicas = new ModeloSancionesEconomicas();
        $controladorsanciones = new ControladorSancionesEconomicas();
        
        $modelosancioneseconomicas->setId_sanciones_economicas($_REQUEST['idsancioneseconomica']);
        $modelosancioneseconomicas->setFecha_retraso($_REQUEST['f_salida']);
        $modelosancioneseconomicas->setHora_retraso($_REQUEST['h_salida']);
        $modelosancioneseconomicas->setCosto_retraso($_REQUEST['costoretraso']);

        $controladorsanciones->EditarSanciones($modelosancioneseconomicas);

        $modeloserviciosalida = new ModeloServicioSalida();

        $modeloserviciosalida->setId_servicio_salida($_REQUEST['idserviciosalida']);
        $modeloserviciosalida->setFecha_salida($_REQUEST['f_salida']);
        $modeloserviciosalida->setHora_salida($_REQUEST['h_salida']);
        $modeloserviciosalida->setId_servicio_entrega($_REQUEST['idservicioentrada']);
        $modeloserviciosalida->setId_sanciones_economicas($_REQUEST['idsancioneseconomica']);

        $controladorserviciosalida = new ControladorServicioSalida();

        $controladorserviciosalida->ModificarServicioSalida($modeloserviciosalida);

        $result = $controladorservicioentrada->EstadoPrenda($_REQUEST['idservicioentrada']);

        if ($result == "Terminado") 
        {
            echo $result . $_REQUEST['telefono'];
        }
        else
        {
            echo $result;
        }
    }
    else
    {
        $modelosancioneseconomicas = new ModeloSancionesEconomicas();
        $controladorsanciones = new ControladorSancionesEconomicas();
        
        $modelosancioneseconomicas->setId_sanciones_economicas($_REQUEST['idsancioneseconomica']);
        $modelosancioneseconomicas->setFecha_retraso($_REQUEST['f_salida']);
        $modelosancioneseconomicas->setHora_retraso($_REQUEST['h_salida']);
        $modelosancioneseconomicas->setCosto_retraso($_REQUEST['costoretraso']);

        $controladorsanciones->EditarSanciones($modelosancioneseconomicas);

        $modeloserviciosalida = new ModeloServicioSalida();

        $modeloserviciosalida->setId_servicio_salida($_REQUEST['idserviciosalida']);
        $modeloserviciosalida->setFecha_salida($_REQUEST['f_salida']);
        $modeloserviciosalida->setHora_salida($_REQUEST['h_salida']);
        $modeloserviciosalida->setId_servicio_entrega($_REQUEST['idservicioentrada']);
        $modeloserviciosalida->setId_sanciones_economicas($_REQUEST['idsancioneseconomica']);
        
        $controladorserviciosalida = new ControladorServicioSalida();

        $controladorserviciosalida->ModificarServicioSalida($modeloserviciosalida);

        $result = $controladorservicioentrada->EstadoPrenda($_REQUEST['idservicioentrada']);

        if ($result == "Terminado") 
        {
            echo $result . $_REQUEST['telefono'];
        }
        else
        {
            echo $result;
        }
    }

?>