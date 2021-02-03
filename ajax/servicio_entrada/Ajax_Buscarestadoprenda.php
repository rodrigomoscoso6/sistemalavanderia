<?php

include('../../Controlador/controlador_servicio_entrada.php');

$idservicioentrada = $_POST['idservicioentrada'];

$controladorservicioentrada = new ControladorServicioEntrada();

$resultado = $controladorservicioentrada->EstadoPrenda2($idservicioentrada);

echo $resultado;

?>