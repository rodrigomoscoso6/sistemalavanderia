<?php

include('../../Controlador/controlador_servicio_entrada.php');

$idservicioentrada = $_REQUEST['idservicioentrada'];

$controladorservicioentrada = new ControladorServicioEntrada();

$idcliente = $controladorservicioentrada->Idcliente($idservicioentrada);

$result = $controladorservicioentrada->BuscarIdcliente($idcliente);

foreach($result as $card)
{
    $array = array(
        'idcliente' => $card->getId_cliente(),
        'nombre' => $card->getNombre(),
        'apellido' => $card->getApellidos(),
        'dni' => $card->getDni(),
        'telefono' =>$card->getCelular()
    );
}

echo json_encode($array);

?>