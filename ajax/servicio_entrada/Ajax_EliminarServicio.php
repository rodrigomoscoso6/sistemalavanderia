<?php

include('../../Controlador/controlador_servicio_entrada.php');

$controladorservicioentrada = new ControladorServicioEntrada();

$idservicio = $_REQUEST['idservicioentrada'];

$resultado = $controladorservicioentrada->EliminarServicio($idservicio);

echo $resultado;

?>