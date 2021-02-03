<?php

include('../../Controlador/controlador_tipo_servicio.php');

$controladortiposervicio = new ControladorTipoServicio();

$resultado = $controladortiposervicio->QueTipoServicioSaleMas();

$valores = array_count_values($resultado);

$array = array();

$array1 = array();

foreach($valores as $key => $card)
{
    $array[] = $key;
    $array1[] = $card;
}

$canasta = array(
    'tiposervicio' => $array,
    'cantidad' => $array1
);

echo json_encode($canasta);

?>