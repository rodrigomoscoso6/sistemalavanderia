<?php

include('../../Controlador/controlador_costos.php');

$idcostos = $_REQUEST['idcostos'];

$controladorcostos = new ControladorCostos();

$resultado = $controladorcostos->EliminarCosto($idcostos);

echo $resultado;


?>