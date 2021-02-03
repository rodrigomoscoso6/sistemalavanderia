<?php

include('../../Controlador/controlador_tipo_servicio.php');

$idtiposervicio = $_POST['dato'];

$controladortiposervicio = new ControladorTipoServicio();

$resultado = $controladortiposervicio->BuscarporId($idtiposervicio);

foreach($resultado as $card)
{
    $array = array(
        'medida' => $card->getMedida(),
        'precio' => $card->getPrecio()
    );  
}

echo json_encode($array);

?>