<?php

if($_POST['tiposervicio2'] == 0)
{
    echo "Seleccione un Tipo de Servicio";
}
else
{
    include('../../Modelo/modelo_costos.php');
    include('../../Controlador/controlador_costos.php');

    $modelocostos = new ModeloCostos();

    $modelocostos->setId_costos($_POST['idcostos2']);
    $modelocostos->setCosto_maquina_lavadora($_POST['lavadora2']);
    $modelocostos->setCosto_maquina_secadora($_POST['secadora2']);
    $modelocostos->setCosto_maquina_energia($_POST['energia2']);
    $modelocostos->setCosto_maquina_agua($_POST['agua2']);
    $modelocostos->setCosto_maquina_gas($_POST['gas2']);
    $modelocostos->setCosto_maquina_empaque($_POST['empaque2']);
    $modelocostos->setCloro_gramos($_POST['cloroGramos2']);
    $modelocostos->setCloro_costo($_POST['preciocloro2']);
    $modelocostos->setDetergente_gramos($_POST['detergenteGramos2']);
    $modelocostos->setDetergente_costo($_POST['preciodetergente2']);
    $modelocostos->setSuavisante_gramos($_POST['suavisanteGramos2']);
    $modelocostos->setSuavisante_costo($_POST['preciosuavisante2']);
    $modelocostos->setTotal_costo($_POST['totalCosto2']);
    $modelocostos->setInsumos($_POST['insumos2']);
    $modelocostos->setUtilidadxtipo($_POST['utilidad2']);
    $modelocostos->setId_tipo_servicio($_POST['tiposervicio2']);

    $controladorcostos = new ControladorCostos(); 

    $resultado1 = $controladorcostos->EditarCosto($modelocostos);

    $resultado2 = $controladorcostos->PrecioTipoServicio($_POST['precio2'],$_POST['tiposervicio2']);

    if($resultado1 == "ok" && $resultado2 == "ok")
    {
        echo "ok";
    }
    else
    {
        echo "error";
    }
}



?>