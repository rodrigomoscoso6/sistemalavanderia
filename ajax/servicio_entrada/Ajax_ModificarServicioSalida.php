<?php

include('../../Controlador/controlador_servicio_entrada.php');

$idservicioentrada = $_REQUEST['idservicioentrada'];

$controladorservicioentrada = new ControladorServicioEntrada();

$result = $controladorservicioentrada->DatosServicioSalida($idservicioentrada);

foreach($result as $card)
{
    $array = array(
        'idserviciosalida' => $card->getId_servicio_salida(),
        'f_salida' => $card->getFecha_salida(),
        'h_salida' => $card->getHora_salida(),
        'costoretraso' => $card->getCostoretraso(),
        'idsancioneseconomicas' => $card->getId_sanciones_economicas()
    );
}

echo json_encode($array);


?>