<?php

include('../../Controlador/controlador_tipo_servicio.php');

$controladortiposervicio = new ControladorTipoServicio();

$result = $controladortiposervicio->CantidadTipoServicio();

echo $result;

?>