<?php

include('../../Controlador/controlador_servicio_entrada.php');

$controladorservicioentrada = new ControladorServicioEntrada();

$resultado = $controladorservicioentrada->ImporteMes();

echo json_encode($resultado);


?>