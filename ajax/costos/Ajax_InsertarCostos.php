<?php

if($_POST['tiposervicio'] == 0)
{
    echo "Seleccione un Tipo de Servicio";
}
else
{
    include('../../Modelo/modelo_costos.php');
    include('../../Controlador/controlador_costos.php');

    $modelocostos = new ModeloCostos();

    $modelocostos->setId_costos($_POST['idcostos']);
    $modelocostos->setCosto_maquina_lavadora($_POST['lavadora']);
    $modelocostos->setCosto_maquina_secadora($_POST['secadora']);
    $modelocostos->setCosto_maquina_energia($_POST['energia']);
    $modelocostos->setCosto_maquina_agua($_POST['agua']);
    $modelocostos->setCosto_maquina_gas($_POST['gas']);
    $modelocostos->setCosto_maquina_empaque($_POST['empaque']);
    $modelocostos->setCloro_gramos($_POST['cloroGramos']);
    $modelocostos->setCloro_costo($_POST['preciocloro']);
    $modelocostos->setDetergente_gramos($_POST['detergenteGramos']);
    $modelocostos->setDetergente_costo($_POST['preciodetergente']);
    $modelocostos->setSuavisante_gramos($_POST['suavisanteGramos']);
    $modelocostos->setSuavisante_costo($_POST['preciosuavisante']);
    $modelocostos->setTotal_costo($_POST['totalCosto']);
    $modelocostos->setInsumos($_POST['insumos']);
    $modelocostos->setUtilidadxtipo($_POST['utilidad']);
    $modelocostos->setId_tipo_servicio($_POST['tiposervicio']);

    $controladorcostos = new ControladorCostos();

    $resultado1 = $controladorcostos->InsertarCostos($modelocostos);

    $resultado2 = $controladorcostos->PrecioTipoServicio($_POST['precio'],$_POST['tiposervicio']);

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